<?php
namespace App\Http\Controllers;
use App\Center;
use App\Comarea;
use Illuminate\Http\Request;
//use App\AppServiceProvider;
//use App\Illuminate\Support\Facades\Validator;

// just a comment

class CommonareaController extends Controller
{
    public function index()
    {
        $createcomarea = Comarea::all();
        foreach ($createcomarea as $ca) {
            $ca -> cntr_id = Center::findOrFail($ca -> cntr_id)->cntr_name;
        }

        return view('CreateComarea.index',compact('createcomarea'));
    }
    public function show($id)
    {
        $post = Comarea::find($id);
        return view('CreateComarea.show', compact('post'));
    }

    public function create()
    {
        $centers = Center::lists('cntr_name', 'id')->all();

        return view('CreateComarea.create', compact('centers'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'ca_name' => 'required|string|Max:50',
            'ca_comments' => 'required|string:Max:255',

        ]);
        $comareas = new Comarea();
        $comareas->ca_name = $request -> ca_name;
        $comareas->ca_comments = $request -> ca_comments;
        $comareas->cntr_id = $request -> cntr_id;
        $comareas -> save();


        return redirect('commonarea');
    }


    public function edit($id)
    {
        $centers = Center::lists('cntr_name', 'id')->all();
        $comareas=Comarea::find($id);

        return view('CreateComarea.edit',compact('comareas','centers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this -> validate($request, [
            'ca_name' => 'required|string|Max:50',
        ]);


        $comareas = Comarea::find($id);
        $comareas->ca_name = $request -> ca_name;
        $comareas->ca_comments = $request -> ca_comments;
        $comareas->cntr_id = $request -> cntr_id;
        $comareas -> save();
        return redirect('commonarea');
    }


    public function destroy($id)
    {
        Comarea::find($id)->delete();
        return redirect('commonarea');
    }

}