<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;

use App\Report;

use DB;

use Excel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DemoController extends Controller

{

    public function importExport()

    {

        return view('importExport');

    }

    public function downloadExcel($type,$results)

    {
        $data= unserialize(urldecode($results));
       /* $data = $results;*/

        return Excel::create('SAMPLE_DOWNLOAD', function($excel) use ($data) {

            $excel->sheet('mySheet', function($sheet) use ($data)

            {

                $sheet->fromArray($data);

            });

        })->download($type);

    }

//    public function importExcel()
//
//    {
//
//        if(Input::hasFile('import_file')){
//
//            $path = Input::file('import_file')->getRealPath();
//
//            $data = Excel::load($path, function($reader) {
//
//            })->get();
//
//            if(!empty($data) && $data->count()){
//
//                foreach ($data as $key => $value) {
//
////                    $insert[] = ['Res Pccid' => $value->res_pccid, 'F name' => $value->res_fname,
////                        'Res Mname' => $value->res_mname, 'L name' => $value->res_lname,
////                        'Res Gender' => $value->res_gender, 'Homephone' => $value->res_homephone,
////                        'Res Cellphone' => $value->res_cellphone, 'Email' => $value->res_email,
////
////                    ];
//
//                    $insert[] = ['Apt ID' => $value->id, 'Apt Floor Number' => $value->apt_floornumber,
//                        'Apt Number' => $value->apt_number, 'Apt Comments' => $value->apt_comments,
//                        'Center Name' => $value->cntr_id,
//                    ];
//
//                }
//
//                if(!empty($insert)){
//
//                    DB::view('report_view')->insert($insert);
//
//                    dd('Insert Record successfully.');
//
//                }
//
//            }
//
//        }
//
//        return back();
//
//    }

}
