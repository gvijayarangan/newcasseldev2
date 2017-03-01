<?php
namespace App\Http\Controllers;
use App\Apartment;
use Illuminate\Http\Request;
use App\Resident;
use App\Center;

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
        $post = Resident::find($id);
        return view('CreateRes.show', compact('post'));
    }

    public function create()
    {
        $apartments = Apartment::lists('apt_number', 'id');

        return view('CreateRes.create', compact('apartments'));
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
            'res_pccid' => 'required|numeric|digits:4',
            'res_fname' => 'required|string',
            'res_lname' => 'required|string',
            'res_gender' => 'required|string',
            'res_status' => 'required',
            'res_cellphone' => 'phone|size:11',
            'res_phone' => 'phone|size:11',
            'res_email' => 'email|max:255'
        ]);
        $resident = new Resident();
        $resident->res_pccid = $request -> res_pccid;
        $resident->res_fname = $request -> res_fname;
        $resident->res_mname = $request -> res_mname;
        $resident->res_lname = $request -> res_lname;
        $resident->res_gender = $request -> res_gender;
        $resident->res_Homephone = $request -> res_phone;
        $resident->res_cellphone = $request -> res_cellphone;
        $resident->res_email = $request -> res_email;
        $resident->res_pccid = $request -> res_pccid;
        $resident->res_status = $request -> res_status;
        $resident->res_comment = $request -> res_comment;
    

        //Storing value using select element
        error_log('Value of apartment number - ' . $request -> apt_number);

        $resident->res_apt_id = $request -> apt_number;

        //Fetch center id using apartment id
        $center_id = Apartment::findOrFail($resident->res_apt_id)->cntr_id;
        error_log('Value of center ID for apartment - ' . $resident->res_apt_id . ' is -  ' . $center_id);


        $resident->res_cntr_id = $center_id;
        $resident -> save();
        return redirect('resident');
    }
   

    public function edit($id)
    {
        $resident=Resident::find($id);
        $apartments = Apartment::lists('apt_number', 'id');
        //dd($resident);
        return view('CreateRes.edit',compact('resident','apartments'));
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
            'res_pccid' => 'required|integer',
            'res_fname' => 'required|string',
            'res_lname' => 'required|string',
            'res_status' => 'required',
        ]);

        $resident = Resident::find($id);
        $resident->res_pccid = $request->res_pccid ;
        $resident->res_fname = $request->res_fname;
        $resident->res_mname = $request->res_mname;
        $resident->res_lname = $request->res_lname;
        $resident->res_gender = $request->res_gender;
        $resident->res_Homephone = $request->res_Homephone;
        $resident->res_cellphone = $request->res_cellphone;
        $resident->res_email = $request->res_email;
        $resident->res_status = $request->res_status;
        $resident->res_comment = $request->res_comment;

        $resident->res_apt_id = $request -> res_apt_id;

        //Fetch center id using apartment id
        $center_id = Apartment::findOrFail($resident->res_apt_id)->cntr_id;
        error_log('Value of center ID for apartment - ' . $resident->res_apt_id . ' is -  ' . $center_id);


        $resident->res_cntr_id = $center_id;
        $resident->save();
        return redirect('resident');
    }


    public function destroy($id)
    {
        Resident::find($id)->delete();
        return redirect('resident');
    }

}