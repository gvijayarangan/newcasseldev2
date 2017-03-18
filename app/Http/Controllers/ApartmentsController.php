<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Apartment;
use App\Center;
use App\Resident;
use App\Aptresi;
use DB;

//adding comment for demo1
class ApartmentsController extends Controller
{

    public function index()
    {
        $createapts = Apartment::all();
        #dd($createapts);
        foreach ($createapts as $apts) {
            $apts->centerName = Center::findOrFail($apts->cntr_id)->cntr_name;
        }
        return view('CreateApt.index',compact('createapts'));
//          return view::make('CreateApt.index',compact('createapts'),);
    }

    public function show($id)
    {
        $post = Apartment::find($id);
        $post->cntr_id = DB::table('centers')->where('id', $post->cntr_id)->value('cntr_name');
        return view('CreateApt.show', compact('post'));
    }

    public function create()
    {
        $centers = Center::lists('cntr_name', 'id');
        return view('CreateApt.create', compact('centers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {//dd($request);
        $this->validate($request, [
            'apt_floornumber' => 'required|string|digits_between:1,3 ',
            'apt_number' => 'required|string|digits_between:1,4',
        ]);
        $apartment = new Apartment();
        $apartment->apt_floornumber = $request->apt_floornumber;
        $apartment->apt_number = $request->apt_number;
        $apartment->apt_comments = $request->apt_comments;
        $apartment->cntr_id = $request->cntr_name;

        $apartment->save();

        return redirect('apartment');
    }

    /**
     * This func
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $centers = Center::lists('cntr_name', 'id');
        $createapts = Apartment::find($id);
        return view('CreateApt.edit',compact('centers', 'createapts'));
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
            'apt_floornumber' => 'required|string|digits_between:1,3 ',
            'apt_number' => 'required|string|digits:3',
        ]);

        $CreateApt = Apartment::find($id);
        $CreateApt->apt_floornumber = $request->apt_floornumber;
        $CreateApt->apt_number = $request->apt_number;
        $CreateApt->apt_comments = $request->apt_comments;
        $CreateApt->cntr_id = $request->cntr_id; //commented to avoid FK from Center table
        $CreateApt->save();
        return redirect('apartment');
    }

    /**
     *
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            /*DB::connection()->pdo->beginTransaction();*/

            //Delete all comarea for Center
            $aptresi = Aptresi::where('apt_id', '=', $id)->delete();
            $resident = Resident::where('res_apt_id', '=', $id)->delete();
            $apartment = Apartment::where('id', '=', $id)->delete();

        }catch(Exception $e) {
            /*DB::connection()->pdo->rollBack();*/
            Log::exception($e);
        }
        return redirect('apartment');
    }

    public function search(Request $request)
    {

        $query = trim($request->get('q'));
        #dd(!$query);
        $createapts = $query
                //? \App\Apartment::where('apt_number', 'LIKE', "%$query%")->get()
                ? DB::table('apartments')
                  ->where('apt_number', '=', $query)->get()

                : \App\Apartment::all();
        foreach ($createapts as $apts) {
            $apts->centerName = Center::findOrFail($apts->cntr_id)->cntr_name;
        }
        return view('CreateApt.index',compact('createapts'));
        //dd($apartments);

    }
}
