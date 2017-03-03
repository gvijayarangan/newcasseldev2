<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Assignorder;
use App\Comarea;
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
        $workers = User::select(DB::raw("CONCAT(f_name, ' ',l_name) as fullname, id"))->lists('fullname', 'id')->all();
        $toolsdata = Tool::lists('tool_name', 'id')->all();
        $suppliesdata = Supply::lists('sup_name', 'id')->all();

        return view('WorkOrder.workorder', compact('centers', 'issuetypes', 'workers', 'toolsdata', 'suppliesdata'));

    }

    public function view()
    {
        /*        $woDetails = DB::table('orders')-> join('users', 'orders.user_id','=','users.id')
                                ->join('apartments', 'orders.apt_id', '=', 'apartments.id')
                                  ->select('orders.id','users.f_name','orders.order_date_created',
                                     'orders.apt_id','orders.apt_id','orders.ca_id',
                                      'users.f_name', 'orders.issue_type','orders.order_status',
                                     'orders.last_status_modified','orders.last_status_modified_time',
                                     'orders.order_priority', 'orders.order_total_cost','orders.user_id')->get();*/


        $woDetails = Order::all();

        foreach ($woDetails as $wo) {
            $wo -> user_id = User::findOrFail($wo -> user_id)->f_name . " " .User::findOrFail($wo -> user_id)->l_name;
            //  $wo -> resident_id = Resident::findOrFail($wo -> resident_id)->res_fname;
        }

        // error_log("WO details is " .$woDetails);
        /*
                                        <td>{{ $order->id}}</td>
                                        <td>{{ $order->user_id}}</td>
                                        <td>{{ $order->order_date_created}}</td>
                                        <td>{{ $order->apt_id}}</td>
                                        <td>{{ $order->apt_id}}</td>
                                        <td>{{ $order->ca_id}}</td>
                                        <td>{{ $order->resident_id}}</td>
                                        <td>{{ $order->issue_type}}</td>
                                        <td>{{ $order->order_status}}</td>
                                        <td>{{ $order->last_status_modified}}</td>
                                        <td>{{ $order->last_status_modified_time}}</td>
                                        <td>{{ $order->order_priority}}</td>
                                        <td>{{ $order->order_total_cost}}</td>
                                        <td>{{ $order->user_id}}</td>
 */
        return view('WorkOrder.index',compact('woDetails'));

    }

    public function getAptDetails(Request $request) {
        $input = $request -> input('option');
        $apartment_data = Apartment::
        select(DB::raw("apt_number, id"))->where('cntr_id', '=' , $input )
            ->lists('apt_number', 'id')->all();

        //error_log("Apartment data with center id " . $input . " is - " . $apartment_data);
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

        $apartment_floor_data = Apartment::
        select(DB::raw("apt_floornumber"))->where('id', '=' , $input )
            ->lists('apt_floornumber')->all();

        return $resident_data;
    }

    public function getIssueDesc(Request $request) {
        $input = $request -> input('option');

        $issue_description = Issuetype::select(DB::raw("issue_description"))->where('id', '=' , $input)
            ->lists('issue_description');
        return $issue_description;
    }

    public function getUnitPrice(Request $request) {
        $input = $request -> input('option');

        $sup_unitprice = Supply::select(DB::raw("sup_unitprice"))->where('id', '=' , $input)
            ->lists('sup_unitprice');
        return $sup_unitprice;
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
        $order -> apt_id = $request -> apt_id;
        $order -> ca_id = $request -> ca_id;
        $order -> order_description = $request -> order_description;
        $order -> order_priority = $request -> order_priority;
        $order -> order_status = $request -> order_status;
        $order -> issue_type = $request -> issuetype;
        $order -> order_total_cost = $request -> order_total_cost;
        $order -> resident_comment = $request -> resident_comments;
        $order -> last_status_modified = Auth::user()->getFullName();

        /*        $now = new DateTime();
                $now->format('Y-m-d H:i:s');

                $order -> order_date_created = $now->getTimestamp();*/
        $order ->save();

        //Save all Assign orders
        $assign = new Assignorder();
        $assign -> user_id = $request -> assign_user_id;
        $assign -> order_id = $order->getOrderId();
        $assign ->save();

        //Save all Tool multiselect orders
        $tools_from_post = $_POST['toolsused_id'];
        foreach ($tools_from_post as $sel_option) {
            //error_log("Multi select data " . $sel_option);
            $toolOrder = new Toolorder();
            $toolOrder -> tool_id = $sel_option;
            $toolOrder -> order_id = $order->getOrderId();
            $toolOrder -> save();
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
        for ($i=0; $i<count($sd_f_a); $i++) {
            $so = new Supplyorder();
            $supplyName = explode('=',$sd_f_a[$i]);
            //Fetch supply id using supplyname
            $array_supply_id = DB::table('supplies')->where('sup_name',$supplyName[1])->pluck('id');
            foreach ($array_supply_id as $key => $value) {
                if ($key == 'id') {
                    $so -> sup_id = $value;
                }
                //   error_log($key ." --- " .$value );
            }
            $unit = explode('=',$sd_f_a[$i+1]);
            $so -> supord_units = $unit[1];

            $so -> order_id = $order -> getOrderId();

            $total = explode('=',$sd_f_a[$i+3]);
            $so -> supord_total = $total[1];

            $so ->save();
            $i=$i+4;
        }
     /* $woDetails = Order::all();
      return view('WorkOrder.index',compact('woDetails'));*/

        return redirect('workorderview');
    }
}