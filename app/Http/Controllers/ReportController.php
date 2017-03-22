<?php

namespace App\Http\Controllers;

use App\Comarea;
use App\Order;
use App\Report;
use App\role;
use App\user;
use App\center;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ReportController extends Controller
{


    public function index()
    {
      $report = Report::all();

        $center = DB::table('get_order_details')->groupBy('center_name')-> lists('center_name','wo_id');
        $apartmentNumber = DB::table('get_order_details')->groupBy('apartment_number')-> lists('apartment_number','wo_id');
        $commonArea = DB::table('get_order_details')->groupBy('common_area_name')-> lists('common_area_name','wo_id');
        $createdDate = DB::table('get_order_details')->groupBy('created_date_time')-> lists('created_date_time','wo_id');
        $status = DB::table('get_order_details')->groupBy('status')-> lists('status','wo_id');
        $priority = DB::table('get_order_details')->groupBy('priority')-> lists('priority','wo_id');
        $assign = DB::table('get_order_details')->groupBy('assign_to')-> lists('assign_to','wo_id');
        $reportDatas=Report::all();


        $paymentsArray = [];
        foreach ($reportDatas as $payment) {
            $paymentsArray[] = $payment->toArray();
        }
      return view('Report.index', compact('apartmentNumber','center','commonArea','createdDate','status','priority','assign','reportDatas','report','paymentsArray'));
    }

    public function show()
    {
    return redirect('report');
    }

//public function show($id)
//{
//    $post = Report::find($id);
//
//    error_log($post);
//    $post->center_name = Report::findOrFail($post->center_name)->center_name;
//    if ($post->apartment_number == 0) {
//        $post->apartment_number = 'N/A';
//    } else {
//        $post->apartment_number = Report::findOrFail($post->apartment_number)-> apartment_number;
//    }
//    if ($post->common_area_name == 0) {
//        $post->common_area_name = 'N/A';
//    } else {
//        $post->common_area_name = Report::findOrFail($post->common_area_name)->common_area_name;
//    }
//    error_log($post);
//    return redirect('report', compact('post'));
//}


//    public function getAptDetails(Request $request) {
//        $input = $request -> input('option');
//        $apartment_data = Report::
//        select(DB::raw("apartment_number, id"))->where('center_name', '=' , $input )
//            ->lists('apartment_number', 'id')->all();
//
//        return $apartment_data;
//    }
//    public function getComAreaDetails(Request $request) {
//        $input = $request -> input('option');
//        $apartment_data = Report::
//        select(DB::raw("common_area_name, id"))->where('center_name', '=' , $input )
//            ->lists('common_area_name', 'id')->all();
//
//        //error_log("Apartment data with center id " . $input . " is - " . $apartment_data);
//        return $apartment_data;
//    }


       public function store(Request $request)
    {
        $report = new Report();
        $report1 = $request->input();
        $commonAreaName='';
        $centerReport ='';
        $aptNumber='';
        $createdDateTime ='';
        $createdDateTimeTo ='';
        $statusReport ='';
        $priorityReport = '';
        $assignReport ='';

        $report->id1 = trim($report1['apartment_number']);
        if(!$report->id1==0) {
            $aptNumber = Report::find($report->id1)->apartment_number;
        }
        $report->center_name = trim($report1['center_name']);
        if(!$report->center_name==0) {
            $centerReport = Report::find($report->center_name)->center_name;
        }
        $report->common_area_name = trim($report1['common_area_name']);
        if(!$report->common_area_name==0) {
           $commonAreaName = Report::find($report->common_area_name)->common_area_name;
        }
        $report->created_date_time = trim($report1['createdDateTime']);
        $createdDateTime = trim($report1['createdDateTime']);

        $report->created_date_time = trim($report1['createdDateTimeTo']);
        $createdDateTimeTo = trim($report1['createdDateTimeTo']);

        $report->status = trim($report1['status']);
        if(!$report->status==0) {
            $statusReport = Report::find($report->status)->status;
        }
        $report->priority = trim($report1['priority']);
        if(!$report->priority==0) {
            $priorityReport = Report::find($report->priority)->priority;
        }
        $report->assign_to = trim($report1['assign_to']);
        if(!$report->assign_to==0) {
            $assignReport = Report::find($report->assign_to)->assign_to;
        }


        $center = DB::table('get_order_details')->groupBy('center_name')-> lists('center_name','wo_id');
        $apartmentNumber = DB::table('get_order_details')->groupBy('apartment_number')-> lists('apartment_number','wo_id');
        $commonArea = DB::table('get_order_details')->groupBy('common_area_name')-> lists('common_area_name','wo_id');
        $createdDate = DB::table('get_order_details')->groupBy('created_date_time')-> lists('created_date_time','wo_id');
        $status = DB::table('get_order_details')->groupBy('status')-> lists('status','wo_id');
        $priority = DB::table('get_order_details')->groupBy('priority')-> lists('priority','wo_id');
        $assign = DB::table('get_order_details')->groupBy('assign_to')-> lists('assign_to','wo_id');

        if($aptNumber==''&&$commonAreaName=='' && $centerReport=='' && $createdDateTime==''&&$statusReport==''&&$priorityReport=='' && $assignReport==='')
        {
            $reportDatas=DB::table('get_order_details')->get();
        }

          else {
            $reportDatas = DB::table('get_order_details')->where('apartment_number', '=', $aptNumber)
                        ->orwhere('center_name', 'like', $centerReport)
                        ->orwhere('common_area_name', 'like', $commonAreaName)
                        ->orwhereBetween('created_date_time', [$createdDateTime, $createdDateTimeTo])
                        ->orwhere('status', 'like', $statusReport)
                        ->orwhere('priority', 'like', $priorityReport)
                        ->orwhere('assign_to', 'like', $assignReport)
                        ->get();
            }

//        else {
//            $reportDatas = DB::table('get_order_details')
//                        ->where('center_name', 'like', $centerReport)
//                        ->where('apartment_number', '=', $aptNumber)
////                        ->where('common_area_name', 'like', $commonAreaName)
////                        ->whereBetween('created_date_time', [$createdDateTime, $createdDateTimeTo])
////                        ->where('status', 'like', $statusReport)
////                        ->where('priority', 'like', $priorityReport)
////                        ->where('assign_to', 'like', $assignReport)
//                        ->get();
//            }

            $paymentsArray = [];

        foreach ($reportDatas as $payment)
        {
            $paymentsArray[] = (array)$payment;
        }
        return view('Report.index', compact('apartmentNumber','commonArea','center','createdDate','status','priority','assign','reportDatas','report','paymentsArray'));


    }

}




