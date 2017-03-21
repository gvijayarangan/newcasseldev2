<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Assignorder;
use App\Comarea;
use App\Comment;
use App\Issuetype;
use App\Order;
use App\Resident;
use App\Supply;
use App\Supplyorder;
use App\Tool;
use App\Toolorder;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use App\Role;
use App\Center;
use Auth;
use Session;
use Input;
use DB;
use Log;
use Mail;
use Response;
use DateTime;


class WorkOrderController extends Controller
{
    public function index()
    {
        $centers = Center::lists('cntr_name', 'id')->all();
        $issuetypes = Issuetype::lists('issue_typename', 'id')->all();
        $workers = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->where('role_id','=','2')
            ->select(DB::raw("CONCAT(f_name, ' ',l_name) as fullname, id"))
            ->lists('fullname', 'id');

        $toolsdata = Tool::lists('tool_name', 'id')->all();
        $suppliesdata = Supply::lists('sup_name', 'id')->all();

        $user = Auth::user();
        if ($user->hasRole('admin') || $user->hasRole('engineer')) {
            return view('WorkOrder.workorder', compact('centers', 'issuetypes', 'workers', 'toolsdata', 'suppliesdata'));
        }  else if ($user->hasRole('contact')) {
            return view('WorkOrder.workorderContact', compact('centers', 'issuetypes', 'workers', 'toolsdata', 'suppliesdata'));
        }
    }

    public function edit($wo_id)
    {
        error_log('WorkOrderController.edit: ' .$wo_id);
        $centers = Center::lists('cntr_name', 'id')->all();
        $issuetypes = Issuetype::lists('issue_typename', 'id')->all();
        $workers = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->where('role_id','=','2')
            ->select(DB::raw("CONCAT(f_name, ' ',l_name) as fullname, id"))
            ->lists('fullname', 'id');
        $wo_edit_data = Order::find($wo_id);
        $apartments = Apartment::select(DB::raw("apt_number, id"))->where('cntr_id', '=' , $wo_edit_data->cntr_id )->lists('apt_number', 'id')->all();
        $residents = Resident::
        select(DB::raw("CONCAT(res_fname, ' ',res_lname) as res_fname, id"))->where('res_apt_id', '=' , $wo_edit_data->apt_id )
            ->lists('res_fname', 'id')->all();
        $issue_description = Issuetype::select(DB::raw("issue_description"))->where('id', '=' , $wo_edit_data->issue_type)->value('issue_description');

        $toolsdata = Tool::lists('tool_name', 'id')->all();
        $toolsdataExisting = Toolorder::select(DB::raw('tool_id'))->where('order_id','=',$wo_id)->lists('tool_id')->all();
        $suppliesdata = Supply::lists('sup_name', 'id')->all();
        $assignto = Assignorder::select(DB::raw("user_id"))->where('order_id','=',$wo_id)->value("user_id");

        //Get the supplies data for table
        $supplyDataTable = DB::table('supplyorders')->join('supplies', 'supplyorders.sup_id', '=', 'supplies.id')
            ->where('order_id','=',$wo_id)
            ->select('supplies.sup_name','supplyorders.supord_units','supplies.sup_unitprice','supplyorders.supord_total')->get();

     //   print_r($supplyDataTable);
     //   error_log('WorkOrderController.Data : ' .$wo_edit_data);

        return view('WorkOrder.edit',
            compact('wo_edit_data','centers','apartments', 'residents', 'issuetypes', 'issue_description','assignto','workers', 'toolsdata',
                'suppliesdata','toolsdataExisting','supplyDataTable'));
    }


    public function view()
    {
        // Navigate to different views based on user role
        $user = Auth::user();
        $woDetails = DB::table('get_order_details')->get();
        if ($user->hasRole('admin') || $user->hasRole('engineer')) {
            return view('WorkOrder.index',compact('woDetails'));
        } else if ($user->hasRole('contact')) {
            return view('WorkOrder.indexContact',compact('woDetails'));
        }

    }

    public function getAptDetails(Request $request) {
        $input = $request -> input('option');
        $apartment_data = Apartment::
        select(DB::raw("apt_number, id"))->where('cntr_id', '=' , $input )
            ->lists('apt_number', 'id')->all();

        return $apartment_data;
    }

    public function getComAreaDetails(Request $request) {
        $input = $request -> input('option');
        $apartment_data = Comarea::
        select(DB::raw("ca_name, id"))->where('cntr_id', '=' , $input )
            ->lists('ca_name', 'id')->all();

        //error_log("Apartment data with center id " . $input . " is - " . $apartment_data);
        return $apartment_data;
    }

    public function getResidentName(Request $request) {
        $input = $request -> input('option');

        $resident_data = Resident::

        select(DB::raw("CONCAT(res_fname, ' ',res_lname) as res_fname, id"))->where('res_apt_id', '=' , $input )
            ->lists('res_fname', 'id')->all();

        return $resident_data;
    }

    public function getIssueDesc(Request $request) {
        $input = $request -> input('option');

        $issue_description = Issuetype::select(DB::raw("issue_description"))->where('id', '=' , $input)
            ->lists('issue_description');
        return $issue_description;
    }

    public function getresidentComments(Request $request) {
        $input = $request -> input('option');

        $res_comment = Resident::select(DB::raw("res_comment"))->where('id', '=' , $input)
            ->lists('res_comment');
        return $res_comment;
    }

    public function getUnitPrice(Request $request) {
        $input = $request -> input('option');

        $sup_unitprice = Supply::select(DB::raw("sup_unitprice"))->where('id', '=' , $input)
            ->lists('sup_unitprice');
        return $sup_unitprice;
    }

    public function getComments(Request $request) {
        error_log("Get comments request - " .$request);
        //Get comments for particular workorder
        $comments = Comment::select('id', 'created_at', 'text', 'created_by')->where('order_id','=', $request -> wo_id)->get();

        error_log("Comments before :   " .$comments);

        foreach ($comments as $comment) {
            $comment -> created_by = User::findOrFail($comment -> created_by)->f_name . " " . User::findOrFail($comment -> created_by)->l_name;
        }

        error_log("Comments :   " .$comments);

        return $comments;
    }

    public function addComment(Request $request) {

 
        $comment = new Comment();
        $comment -> user_id = Auth::user()->getUserId();
        $comment -> text = $request -> text;
        $comment -> created_by = Auth::user()->getUserId();
        $comment -> order_id = $request -> wo_id;
        $comment -> save();

        $comment -> created_by = User::findOrFail($comment -> created_by)->f_name . " " . User::findOrFail($comment -> created_by)->l_name;

        return $comment;
    }

    public function show($id)
    {
        $post = Order::find($id);

        error_log($post);
        $post->cntr_id = Center::findOrFail($post->cntr_id)->cntr_name;
        if ($post->apt_id == 0) {
            $post->apt_id = 'N/A';
        } else {
            $post->apt_id = Apartment::findOrFail($post->apt_id)->apt_number;
        }
        $post->issue_type = Issuetype::findOrFail($post->issue_type)->issue_typename;
        if ($post->resident_id == 0) {
            $post->resident_id = 'N/A';
        } else {
            $post->resident_id = Resident::findOrFail($post->resident_id)->res_fname . " " . Resident::findOrFail($post->resident_id)->res_lname;
        }
        if ($post->ca_id == 0) {
            $post->ca_id = 'N/A';
        } else {
            $post->ca_id = Comarea::findOrFail($post->ca_id)->ca_name;

        }

        error_log($post);
        return view('WorkOrder.show', compact('post'));
    }

    public function storeData(Request $request)
    {
        // Validation depends on type of the user

        /*       //Admin validation
               $this -> validate($request, [
                   'requester' => 'required|string',
                   'cntr_name' => 'required|string',
                   'apartment_name' => 'required|string',
                   'residentname' => 'required|string',
                   'resident_comments' => 'required|string',
                   'status' => 'required|string',

               ]);*/


        error_log("Request is " . $request);

        //Save all orders
        $order = new Order();
        $order -> user_id = Auth::user()->getUserId();

        //Common area selected, omit apartment and resident information
        if($request -> ca_id != 0) {
            $order -> apt_id = 0;
            $order -> resident_id = 0;
            $order -> ca_id = $request -> ca_id;
        } else {
            $order -> apt_id = $request -> apt_id;
            $order -> resident_id = $request -> residentname;
            $order -> ca_id = 0;
        }

        $order -> cntr_id = $request -> cntr_name;
        $order -> order_description = $request -> order_description;
        $order -> order_priority = $request -> order_priority;
        $order -> order_status = $request -> order_status;
        $order -> issue_type = $request -> issuetype;
        $order -> order_total_cost = $request -> order_total_cost;
        $order -> resident_comment = $request -> resident_comments;
        $order -> requestor_name = $request -> requestor_name;
        $order -> last_status_modified = Auth::user()->getFullName();
        $order -> order_date_created =  (new \DateTime())->format('Y-m-d H:i:s');
        $order ->save();

        $user = Auth::user();
        if ($user->hasRole('admin') || $user->hasRole('engineer')) {

            //Save all Assign orders
            $assign = new Assignorder();
            $assign->user_id = $request->assign_user_id;
            $assign->order_id = $order->getOrderId();
            $assign->save();

            //Save all Tool multiselect orders
            $tools_from_post = $_POST['toolsused_id'];
            foreach ($tools_from_post as $sel_option) {
                //error_log("Multi select data " . $sel_option);
                $toolOrder = new Toolorder();
                $toolOrder->tool_id = $sel_option;
                $toolOrder->order_id = $order->getOrderId();
                $toolOrder->save();
            }

            //Save all Supply information
            $supplyData_from_post = urldecode($_POST['supplyData']);
            //error_log("Encoded data - " .$supplyData_from_post);
            $sd_f_a = explode('&', $supplyData_from_post);
            //Remove unwanted key from post
            foreach (array_keys($sd_f_a, 'remove-row=', true) as $key) {
                unset($sd_f_a[$key]);
            }

            //Parse array and save data, skip 4 elements as they repeat at index 4
            for ($i = 0; $i < count($sd_f_a); $i++) {
                $so = new Supplyorder();
                $supplyName = explode('=', $sd_f_a[$i]);
                //Fetch supply id using supplyname
                $array_supply_id = DB::table('supplies')->where('sup_name', $supplyName[1])->pluck('id');
                foreach ($array_supply_id as $key => $value) {
                    if ($key == 'id') {
                        $so->sup_id = $value;
                    }
                    //   error_log($key ." --- " .$value );
                }
                $unit = explode('=', $sd_f_a[$i + 1]);
                $so->supord_units = $unit[1];

                $so->order_id = $order->getOrderId();

                $total = explode('=', $sd_f_a[$i + 3]);
                $so->supord_total = $total[1];

                $so->save();
                $i = $i + 4;
            }
        }
        return redirect('workorderview');
    }


    public function updateData(Request $request)
    {
        // Validation depends on type of the user

        /*       //Admin validation
               $this -> validate($request, [
                   'requester' => 'required|string',
                   'cntr_name' => 'required|string',
                   'apartment_name' => 'required|string',
                   'residentname' => 'required|string',
                   'resident_comments' => 'required|string',
                   'status' => 'required|string',

               ]);*/
        //Save all orders

        error_log("Request for update data " . $request);

        $order = Order::find($request -> wo_id);
        $order -> user_id = Auth::user()->getUserId();


        //Common area selected, omit apartment and resident information
        if($request -> ca_id != 0) {
            $order -> apt_id = 0;
            $order -> resident_id = 0;
            $order -> ca_id = $request -> ca_id;
        } else {
            $order -> apt_id = $request -> apt_id;
            $order -> resident_id = $request -> residentname;
            $order -> ca_id = 0;
        }
        $order -> cntr_id = $request -> cntr_name;
        $order -> order_description = $request -> order_description;
        $order -> order_priority = $request -> order_priority;
        $order -> order_status = $request -> order_status;
        $order -> issue_type = $request -> issuetype;
        $order -> order_total_cost = $request -> order_total_cost;
        $order -> resident_comment = $request -> resident_comments;
        $order -> requestor_name = $request -> requestor_name;
        $order -> last_status_modified = Auth::user()->getFullName();
        $order -> order_date_created =  (new \DateTime())->format('Y-m-d H:i:s');
        $order ->save();

        $user = Auth::user();
        if ($user->hasRole('admin') || $user->hasRole('engineer')) {

            //Check for updating an already assigned user
            if ($request->assign_user_id != 0) {
                //Check if order is already assigned, then just update
                $assignUserCheck = Assignorder::where('order_id', '=', $request->wo_id)->first();
                if($assignUserCheck != null) {
                    Assignorder::where('order_id', '=', $request->wo_id)->update(['user_id' => $request->assign_user_id]);
                } else {
                    $assign = new Assignorder();
                    $assign->user_id = $request->assign_user_id;
                    $assign->order_id = $request->wo_id;
                    $assign->save();
                }

            } else {
                //Delete the assign order relationship
                Assignorder::where('order_id', '=', $request->wo_id)->delete();
            }

            //Check if tools is already saved and perform save
            if (isset($_POST['toolsused_id'])) {
                $tools_from_post = $_POST['toolsused_id'];
                Toolorder::where('order_id', '=', $request -> wo_id)->delete();

                foreach ($tools_from_post as $sel_option) {
                    //error_log("Multi select data " . $sel_option);
                    $toolOrder = new Toolorder();
                    $toolOrder->tool_id = $sel_option;
                    $toolOrder->order_id = $order->getOrderId();
                    $toolOrder->save();
                }
            } else {
                Toolorder::where('order_id', '=', $request -> wo_id)->delete();
            }

            //If all supplydata is deleted, totalcost will be 0, remove all from database
            if(($_POST['supplyData'] == null) && ($order -> order_total_cost == 0)) {
                Supplyorder::where('order_id', '=', $request->wo_id)->delete();
            }
            //Check if supplydata has been updated
            $supplyData_from_post = urldecode($_POST['supplyData']);
            if($_POST['supplyData'] != null) {
                error_log("inside loop supplydata update");

                //Remove the existing supplyorder information from database
                Supplyorder::where('order_id', '=', $request->wo_id)->delete();

                //Save all Supply information
                //error_log("Encoded data - " .$supplyData_from_post);
                $sd_f_a = explode('&', $supplyData_from_post);
                //Remove unwanted key from post
                foreach (array_keys($sd_f_a, 'remove-row=', true) as $key) {
                    unset($sd_f_a[$key]);
                }

                //Parse array and save data, skip 4 elements as they repeat at index 4
                for ($i = 0; $i < count($sd_f_a); $i++) {
                    $so = new Supplyorder();
                    $supplyName = explode('=', $sd_f_a[$i]);
                    //Fetch supply id using supplyname
                    $array_supply_id = DB::table('supplies')->where('sup_name', $supplyName[1])->pluck('id');
                    foreach ($array_supply_id as $key => $value) {
                        if ($key == 'id') {
                            $so->sup_id = $value;
                        }
                        //   error_log($key ." --- " .$value );
                    }
                    $unit = explode('=', $sd_f_a[$i + 1]);
                    $so->supord_units = $unit[1];

                    $so->order_id = $order->getOrderId();

                    $total = explode('=', $sd_f_a[$i + 3]);
                    $so->supord_total = $total[1];

                    $so->save();
                    $i = $i + 4;
                }
            }

        }
        return redirect('workorderview');
    }

}