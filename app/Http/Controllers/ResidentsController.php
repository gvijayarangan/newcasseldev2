<?php
namespace App\Http\Controllers;
use App\Apartment;
use Illuminate\Http\Request;
use App\Resident;
use App\Center;
use App\Rescontact;
use App\Conresi;
use DB;

//use App\AppServiceProvider;
//use App\Illuminate\Support\Facades\Validator;

// just a comment

class ResidentsController extends Controller
{
    public function index()
    {
        $createres = Resident::all();

        foreach ($createres as $res) {
            $res->res_apt_id = Apartment::findOrFail($res->res_apt_id)->apt_number;
            $res->res_cntr_id = Center::findOrFail($res->res_cntr_id)->cntr_name;
        }
        return view('CreateRes.index',compact('createres'));
    }

    public function show($id)
    {
        error_log("ID value for resident " .$id);

        $aprtment_name = DB::table('apartments')
                        ->join('residents','apartments.id','=','residents.res_apt_id')
                        ->where('residents.id', '=', $id)
                        ->value('apt_number');
        $cntr_name = DB::table('centers')
                    ->join('residents','centers.id','=','residents.res_cntr_id')
                    ->where('residents.id', '=', $id)
                    ->value('cntr_name');

        $centers = Center::lists('cntr_name', 'id')->all();
        $post = Resident::find($id);

        return view('CreateRes.show', compact('post','centers','aprtment_name','cntr_name'));
    }

    public function create()
    {
        $centers = Center::lists('cntr_name', 'id')->all();
        return view('CreateRes.create', compact('centers'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     * 
     *
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'res_pccid' => 'required|integer|digits:4|unique:residents',
            'res_fname' => 'required|string|Max:50',
            'res_lname' => 'required|string|Max:50',
            'res_gender' => 'required',
            'res_status' => 'required',
            'res_cellphone' =>'string|digits:10',
            'res_homephone' =>'string|digits:10',
            'res_email' => 'email|max:255',
            'cntr_name' => 'required|not_in:0',
            'apt_number' => 'required|not_in:0',
        ]);
        $resident = new Resident();
        $resident->res_pccid = $request -> res_pccid;
        $resident->res_fname = $request -> res_fname;
        $resident->res_mname = $request -> res_mname;
        $resident->res_lname = $request -> res_lname;
        $resident->res_gender = $request -> res_gender;
        $resident->res_homephone = $request -> res_homephone;
        $resident->res_cellphone = $request -> res_cellphone;
        $resident->res_email = $request -> res_email;
       // $resident->res_pccid = $request -> res_pccid;
        $resident->res_status = $request -> res_status;
        $resident->res_comment = $request -> res_comment;
    

        //Storing value using select element
        error_log('Value of apartment number - ' . $request -> apt_number);

        $resident->res_apt_id = $request -> apt_number;

        //Fetch center id using apartment id
       /* $center_id = Apartment::findOrFail($resident->res_apt_id)->cntr_id;
        error_log('Value of center ID for apartment - ' . $resident->res_apt_id . ' is -  ' . $center_id);*/

//
//        $resident->res_cntr_id = $center_id;
        $resident->res_cntr_id = $request -> cntr_name;
        $resident -> save();
        return redirect('resident');
    }
   

    public function edit($id)
    {
        error_log("Id passed edit - " . $id);

        $resident=Resident::find($id);
        $centers = Center::lists('cntr_name', 'id')->all();
        $apartments_id = DB::table('residents')->where('id', $id )->value('res_apt_id');
        $centers_id = DB::table('apartments')->where('id', $apartments_id)->value('cntr_id');
        $apartments = Apartment::select(DB::raw("apt_number, id"))->where('cntr_id', '=' , $centers_id )
            ->lists('apt_number', 'id')->all();

        //print_r("apartment number - " .$apartments);
        //print_r("center number - " .$centers);
        return view('CreateRes.edit',compact('resident','centers','apartments_id','centers_id','apartments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
                $this -> validate ($request, [
            'res_pccid' => 'required|integer|digits:4',
            'res_fname' => 'required|string|Max:50',
            'res_lname' => 'required|string|Max:50',
            'res_gender' => 'required',
            'res_status' => 'required',
            'res_cellphone' =>'string|digits:10',
            'res_homephone' =>'string|digits:10',
            'res_email' => 'email|max:255',
        ]);

        $resident = Resident::find($id);
        $resident->res_pccid = $request->res_pccid ;
        $resident->res_fname = $request->res_fname;
        $resident->res_mname = $request->res_mname;
        $resident->res_lname = $request->res_lname;
        $resident->res_gender = $request->res_gender;
        $resident->res_homephone = $request->res_homephone;
        $resident->res_cellphone = $request->res_cellphone;
        $resident->res_email = $request->res_email;
        $resident->res_status = $request->res_status;
        $resident->res_comment = $request->res_comment;

        $resident->res_apt_id = $request -> apt_number;


//
//        $resident->res_cntr_id = $center_id;
        $resident->res_cntr_id = $request -> cntr_name;
        $resident->save();
        return redirect('resident');
    }


    public function destroy($id)
    {
        try {
            /*DB::connection()->pdo->beginTransaction();*/

            //Delete all comarea for Center
            $conresi = Conresi::where('res_id', '=', $id)->delete();
            $rescontact = Rescontact::where('con_res_id', '=', $id)->delete();
            $resident = Resident::where('id', '=', $id)->delete();

        }catch(Exception $e) {
            /*DB::connection()->pdo->rollBack();*/
            Log::exception($e);
        }
        return redirect('resident');
    }

    public function getAptDet(Request $request) {
        $input = $request -> input('option');
        $apartment_data = Apartment::
        select(DB::raw("apt_number, id"))->where('cntr_id', '=' , $input )
            ->lists('apt_number', 'id')->all();

        return $apartment_data;
    }

}