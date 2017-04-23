<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Supply;
use App\Supplyorder;
use DB;

class SupplyController extends Controller
{

    public function index()
    {
        $createsupply = Supply::all();
        //dd($createsupply);
//        foreach ($createapts as $apts) {//dd(Center::findOrFail(7)->cntr_name);
//            $apts->centerName = Center::findOrFail($apts->cntr_id)->cntr_name;
//
        return view('CreateSupply.index',compact('createsupply'));
    }

//    public function search(Request $request)
//    {
//
//        $query = trim($request->get('q'));
//        #dd(!$query);
//        $createsupply = $query
//            //? \App\Apartment::where('apt_number', 'LIKE', "%$query%")->get()
//            ? DB::table('supplies')
//                ->where('sup_name', '=', $query)->get()
//
//            : \App\Supply::all();
//        return view('CreateSupply.index',compact('createsupply'));
//
//    }

    public function show($id)
    {
        $supply_post = Supply::find($id);
        //dd($supply_post);
        return view('CreateSupply.show', compact('supply_post'));
    }

    public function create()
    {
        //dd();
        //$suppl = Center::lists('cntr_name', 'id');
        return view('CreateSupply.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {//dd($request);
        $this->validate($request, [
            //'id' => 'required|integer',
            'sup_name' => 'required|alpha|Max:30',

            'sup_unitprice' => 'required|numeric|min:0',

            'sup_comment' => 'string|Max:255',
        ]);
        //dd($request);
        $supplydata = new Supply();
        $supplydata->sup_name = $request->sup_name;
        $supplydata->sup_unitprice = $request->sup_unitprice;
       $supplydata->sup_comment = $request->sup_comment;
        $supplydata->save();
       // dd($supplydata);
        return redirect('Supply');
    }

    /**
     * This func
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        //$supplyedits = Center::lists('cntr_name', 'id');
        //$createapts = Apartment::find($id);
        $createsupply = Supply::find($id);
        //dd($createsupply);
        return view('CreateSupply.edit',compact('createsupply'));
        //return view('CreateSupply.edit');
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

            'sup_name' => 'required|alpha|Max:30',
            'sup_unitprice' => 'required|numeric|min:0',
       /*     'sup_unitprice'  => [
        'required',
        'regex:/^\d{1,2}(\.\d{1,2})?$/',
        'numeric',
        'min:1',
        'max:50'
    ],*/
            'sup_comment' => 'string|Max:255',
        ]);
        $CreateSupply = Supply::find($id);
        $CreateSupply->sup_name = $request->sup_name;
        $CreateSupply->sup_unitprice = $request->sup_unitprice;
        $CreateSupply->sup_comment = $request->sup_comment;
        $CreateSupply->save();
        return redirect('Supply');
    }

    /**
     *
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Supply::find($id)->delete();
        return redirect('Supply');
    }
}