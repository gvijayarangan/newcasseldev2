<?php

namespace App\Http\Controllers;

session_start();

use App\Apartment;
use App\Assignorder;
use App\Comarea;
use App\Order;
use App\Report;
use App\role;
use App\user;
use App\center;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{


    public function index()
    {
        $center = Center::lists('cntr_name', 'id')->all();
        $workers = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->where('role_id','=','2')
            ->select(DB::raw("CONCAT(f_name, ' ',l_name) as fullname, id"))
            ->lists('fullname', 'id');
        $reportDatas = DB::table('get_wo_report_details')->get();
        $_SESSION['downloadExcel'] = $reportDatas;
        $report_array = [];
        $report_array[] = ['user_id','id','resident_id','apt_id','cntr_id','ca_id','order_description','order_date_created',
            'order_priority','order_status','order_total_cost','created_at','updated_at','updated_by','resident_comment','issue_type',
            'requestor_name','deleted_at'];
        /*
                // Convert each member of the returned collection into an array,
                // and append it to the payments array.
                foreach ($reportDatas as $report) {
                    $report_array[] = $report->toArray();
                }
               // Generate and return the spreadsheet
                Excel::create('reports', function($excel) use ($report_array) {

                    // Set the spreadsheet title, creator, and description
                    $excel->setTitle('Report');
                    $excel->setCreator('Laravel')->setCompany('New Cassel');
                    $excel->setDescription('Reports of work orders');

                    // Build the spreadsheet, passing in the payments array
                    $excel->sheet('sheet1', function($sheet) use ($report_array) {
                        $sheet->fromArray($report_array, null, 'A1', false, false);
                    });

                })->download('xlsx');*/

        return view('Report.index', compact('center','reportDatas','workers'));
    }

 public function excel() {


        $reportDatas = (array) $_SESSION['downloadExcel'];

        $report_array = [];

        foreach ($reportDatas as $report) {
            $report_array[] = (array) $report;
        }

        Excel::create('reports', function($excel) use ($report_array) {

            // Set the spreadsheet title, creator, and description
            $excel->setTitle('Report');
            $excel->setCreator('Laravel')->setCompany('New Cassel');
            $excel->setDescription('Reports of work orders');

            // Build the spreadsheet, passing in the payments array
            $excel->sheet('sheet1', function($sheet) use ($report_array) {
                $sheet->fromArray($report_array);
            });

        })->download('xlsx');
    }

    public function show()
    {
    return redirect('report');
    }

    public function getAptDetailsRes(Request $request) {
       $input = $request -> input('option');
       $apartment_data = Report::
        select(DB::raw("apartment_number, id"))->where('center_name', '=' , $input )
            ->lists('apartment_number', 'id')->all();

        return $apartment_data;
    }

       public function store(Request $request)
    {

        $center = Center::lists('cntr_name', 'id')->all();
        $workers = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->where('role_id','=','2')
            ->select(DB::raw("CONCAT(f_name, ' ',l_name) as fullname, id"))
            ->lists('fullname', 'id');

        error_log("request is " .$request);
        $query = DB::table('get_wo_report_details');
        if ($request->center_name != 0) {
            $center_name = DB::table('centers')->where('id','=',$request->center_name)->pluck('cntr_name');
            $query->where('center_name','=',$center_name);
        }
        if ($request->apartment_number != 0) {
            $apartment_number = DB::table('apartments')->where('id','=',$request->apartment_number)->pluck('apt_number');
            $query->where('apartment_number','=',$apartment_number);
        }
        if ($request->common_area_name != 0) {
            $common_area_name = DB::table('comareas')->where('id','=',$request->common_area_name)->pluck('ca_name');
            $query->where('common_area_name','=',$common_area_name);
        }
        if ($request->createdDateTimeFrom != null && $request->createdDateTimeTo != null) {
            $query->whereDate('created_date_time','<=', $request->createdDateTimeTo);
            $query->whereDate('created_date_time','>=', $request->createdDateTimeFrom);
        }
        if ($request->assign_user_id != 0) {
            $assign_user_name = DB::table('users')->where('id','=',$request->assign_user_id)
                ->select(DB::raw("CONCAT(f_name, ' ',l_name) AS name"))->pluck('name');
            $query->where('assign_to','=',$assign_user_name);
        }
        if ($request->order_status != 'Please Select') {
            $query->where('status','=',$request->order_status);
        }
        if ($request->order_priority != 'Please Select') {
             $query->where('priority','=',$request->order_priority);
        }

        //error_log("Query generated - " .$query);
        $reportDatas = $query->get();

        $_SESSION['downloadExcel'] = $reportDatas;

        return view('Report.index', compact('center','reportDatas','workers'));
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
        return $apartment_data;
    }

}




