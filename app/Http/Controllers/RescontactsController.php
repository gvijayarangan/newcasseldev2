<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Rescontact;
use App\Conresi;
use App\Resident;
use App\User;
use Illuminate\Support\Facades\DB;


class RescontactsController extends Controller
{

     public function index()
    {
         $createrescons = DB::table('rescontacts')->join('conresis','rescontacts.id','=','conresis.con_id')
                         ->join('residents','conresis.res_id','=','residents.id')
                         ->groupBy('con_fname')->groupBy('con_lname')
                         ->select('rescontacts.id','con_fname','con_mname','con_lname','con_relationship','con_cellphone','con_email','con_gender')
                         ->selectRaw('GROUP_CONCAT(res_id) as con_res_id')->get();
         //'res_fname','res_lname'
          foreach ($createrescons as $rescons) {
                $con_res_id_array = explode(',',$rescons->con_res_id);
                if($con_res_id_array != false) {
                    $concatenated_con_res_id = '';
                    $pointer=0;
                    foreach ($con_res_id_array as $con_res_id_element) {
                        $rescons->con_res_id = Resident::findOrFail($con_res_id_element)->res_fname . " " .
                            Resident::findOrFail($con_res_id_element)->res_lname . " PCCID: " .
                            Resident::findOrFail($con_res_id_element)->res_pccid;
                        if($pointer !=0) {
                            $concatenated_con_res_id .= ', ' .$rescons->con_res_id;
                        } else {
                            $concatenated_con_res_id .= $rescons->con_res_id;
                        }
                        $pointer++;
                    }
                    $rescons->con_res_id = $concatenated_con_res_id;
                } else {
                        $rescons->con_res_id = Resident::findOrFail($rescons->con_res_id)->res_fname . " " .
                            Resident::findOrFail($rescons->con_res_id)->res_lname . " PCCID: " .
                            Resident::findOrFail($rescons->con_res_id)->res_pccid;
                }
          }
        return view('CreateRescon.index',compact('createrescons'));
    }

//    public function search(Request $request)
//    {
//
//        $query = trim($request->get('q'));
//        #dd(!$query);
//        $createrescons = $query
//            //? \App\Apartment::where('apt_number', 'LIKE', "%$query%")->get()
//            ? DB::table('rescontacts')
//                ->where('con_fname', '=', $query)->get()
//            : \App\Rescontact::all();
//        foreach ($createrescons as $rescons) {
//
//            $rescons->con_res_id = Resident::findOrFail($rescons->con_res_id)->res_fname . " " .
//                Resident::findOrFail($rescons->con_res_id)->res_lname;
//        }
//        return view('CreateRescon.index',compact('createrescons'));
//
//    }

    public function show($id)
    {
        $post = Rescontact::find($id);
       /* $resident_name = Resident::findOrFail($post->con_res_id)->res_fname . " " .
            Resident::findOrFail($post->con_res_id)->res_lname;*/
        $resident_name = DB::table('rescontacts')->join('conresis','rescontacts.id','=','conresis.con_id')
            ->join('residents','conresis.res_id','=','residents.id')
            ->groupBy('con_fname')->groupBy('con_lname')
            ->where('con_id','=',$id)
            ->selectRaw('GROUP_CONCAT(res_id) as con_res_id')->get();

        $con_res_id_array = explode(',',$resident_name[0]->con_res_id);
            if($con_res_id_array != false) {
                $concatenated_con_res_id = '';
                $resident_name_temp = '';
                $pointer=0;
                foreach ($con_res_id_array as $con_res_id_element) {
                    $resident_name_temp = Resident::findOrFail($con_res_id_element)->res_fname . " " .
                        Resident::findOrFail($con_res_id_element)->res_lname . " PCCID: " .
                        Resident::findOrFail($con_res_id_element)->res_pccid;
                    if($pointer !=0) {
                        $concatenated_con_res_id .= ', ' .$resident_name_temp;
                    } else {
                        $concatenated_con_res_id .= $resident_name_temp;
                    }
                    $pointer++;
                }
            } else {
                $concatenated_con_res_id = Resident::findOrFail($id)->res_fname . " " .
                    Resident::findOrFail($id)->res_lname . " PCCID: " .
                    Resident::findOrFail($id)->res_pccid;
            }
         return view('CreateRescon.show', compact('post', 'concatenated_con_res_id'));
    }

    public function create()
    {

        $residents = Resident::select(DB::raw("CONCAT(res_fname, ' ',res_lname,' ','PCCID:',res_pccid) as res_fname, id"))->lists('res_fname', 'id');

         return view('CreateRescon.create', compact('residents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {//dd($request);
        error_log($request);
        $this->validate($request, [
            'con_fname' => 'required|string|Max:50',
            'con_lname' => 'required|string|Max:50',
            'con_relationship' => 'required|string|Max:50',
            //'con_cellphone' => 'numeric|digits:10|min:0',
            'con_email' => 'email|max:255',
            'con_gender' => 'required|string',
            'res_fullname' => 'required',
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
        $rescontact -> save();

        $rescontact_from_post = $_POST['res_fullname'];
         foreach ($rescontact_from_post as $sel_option) {
            //error_log("Multi select data " . $sel_option);
             $conresi = new Conresi();
             $conresi->con_id = $rescontact->getResId();
             $conresi->res_id = $sel_option;
             $conresi->save();
        }

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
        $residentscon = Resident::select(DB::raw("CONCAT(res_fname, ' ',res_lname,' ','PCCID:',res_pccid) as res_fullname, id"))
                        ->lists('res_fullname', 'id');
        $residentscon_existing = Conresi::select(DB::raw('res_id'))->where('con_id','=',$id)->lists('res_id')->all();

        $createrescontacts = Rescontact::find($id);
        return view('CreateRescon.edit',compact('residentscon', 'createrescontacts','residentscon_existing'));
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
            //'con_cellphone' => 'numeric|digits:10|min:0',
            'con_email' => 'email|max:255',
            'con_gender' => 'required|string',
            'con_res_id' => 'required',
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
        $CreateRescon->save();

        if (isset($_POST['con_res_id'])) {
            $rescontact_from_post = $_POST['con_res_id'];
            Conresi::where('con_id', '=', $id)->delete();

            foreach ($rescontact_from_post as $sel_option) {
                $conresi = new Conresi();
                $conresi->con_id = $CreateRescon->getResId();
                $conresi->res_id = $sel_option;
                $conresi->save();
            }
        } else {
            Conresi::where('con_id', '=', $id)->delete();
        }

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
        //Rescontact::find($id)->delete();
        try {
            /*DB::connection()->pdo->beginTransaction();*/

            //Delete all comarea for Center
            $users = User::where('res_con_id', '=', $id)->delete();
            //$rescontact = Rescontact::where('con_res_id', '=', $id)->delete();
            $rescontact = Rescontact::where('id', '=', $id)->delete();

        }catch(Exception $e) {
            /*DB::connection()->pdo->rollBack();*/
            Log::exception($e);
        }
        return redirect('rescontact');
    }
}