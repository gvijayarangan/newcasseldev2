<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Rescontact;
use App\Conresi;
use App\Resident;
use Illuminate\Support\Facades\DB;


class RescontactsController extends Controller
{

     public function index()
    {
        $createrescons = Rescontact::all();
        foreach ($createrescons as $rescons) {

            $rescons->con_res_id = Resident::findOrFail($rescons->con_res_id)->res_fname . " " .
                Resident::findOrFail($rescons->con_res_id)->res_lname;
          }
        return view('CreateRescon.index',compact('createrescons'));
    }

    public function show($id)
    {
        $post = Rescontact::find($id);
        $resident_name = Resident::findOrFail($post->con_res_id)->res_fname . " " .
            Resident::findOrFail($post->con_res_id)->res_lname;
         return view('CreateRescon.show', compact('post', 'resident_name'));
    }

    public function create()
    {

        $residents = Resident::select(DB::raw("CONCAT(res_fname, ' ',res_lname) as res_fname, id"))->lists('res_fname', 'id');

         return view('CreateRescon.create', compact('residents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {//dd($request);
        $this->validate($request, [
            'con_fname' => 'required|string|Max:50',
            'con_lname' => 'required|string|Max:50',
            'con_relationship' => 'required|string|Max:50',
            'con_cellphone' => 'required|string|digits:10',
            'con_email' => 'required|email|max:255',
            'con_gender' => 'required|string',
        ]);
        $rescontact = new Rescontact();
 
        $rescontact->con_fname = $request->con_fname;
        $rescontact->con_mname = $request->con_mname;
        $rescontact->con_lname = $request->con_lname;
        $rescontact->con_relationship = $request->con_relationship;
        $rescontact->con_cellphone = $request->con_cellphone;
        $rescontact->con_email = $request->con_email;
        $rescontact->con_comment = $request->con_comment;
        $rescontact->con_gender = $request->con_gender;
        $rescontact->con_res_id = $request->res_fullname;
      
        $rescontact->save();

        return redirect('rescontact');
    }

    /**
     * This func
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $residentscon = Resident::select(DB::raw("CONCAT(res_fname, ' ',res_lname) as res_fname, id"))->lists('res_fname', 'id');

         $createrescontacts = Rescontact::find($id);
        return view('CreateRescon.edit',compact('residentscon', 'createrescontacts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'con_fname' => 'required|string|Max:50',
            'con_lname' => 'required|string|Max:50',
            'con_relationship' => 'required|string|Max:50',
            'con_cellphone' => 'required|string|digits:10',
            'con_email' => 'required|email|max:255',
            'con_gender' => 'required|string',
        ]);
        $CreateRescon = Rescontact::find($id);
        $CreateRescon->con_fname = $request->con_fname;
        $CreateRescon->con_mname = $request->con_mname;
        $CreateRescon->con_lname = $request->con_lname;
        $CreateRescon->con_relationship = $request->con_relationship;
        $CreateRescon->con_cellphone = $request->con_cellphone;
        $CreateRescon->con_email = $request->con_email;
        $CreateRescon->con_comment = $request->con_comment;
        $CreateRescon->con_gender = $request->con_gender;
        $CreateRescon->con_res_id = $request->con_res_id;
        $CreateRescon->save();

        return redirect('rescontact');
    }

    /**
     *
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Rescontact::find($id)->delete();
        return redirect('rescontact');
    }
}