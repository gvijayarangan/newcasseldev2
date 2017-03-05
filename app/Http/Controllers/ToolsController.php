<?php

namespace App\Http\Controllers;

use App\Tool;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ToolsController extends Controller
{
    public function index()
    {
        $createtool = Tool::all();
        return view('CreateTool.index',compact('createtool'));
    }

    public function show($id)
    {
        $post=Tool::find($id);
        return view('CreateTool.show',compact('post'));
    }


    public function create()
    {
        return view('CreateTool.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'tool_name' => 'required|alpha',
            'tool_comment' => 'string',
        ]);
        $tool = new Tool();
        $tool->tool_name = $request -> tool_name;
        $tool->tool_comment = $request -> tool_comment;
        $tool -> save();

        return redirect('tool');
    }

    public function edit($id)
    {
        $tool=Tool::find($id);
        return view('CreateTool.edit',compact('tool'));
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
            'tool_name' => 'required|alpha',
            'tool_comment' => 'string'
        ]);


        $tool = Tool::find($id);
        $tool->tool_name = $request -> tool_name;
        $tool->tool_comment = $request -> tool_comment;
        $tool->save();
        return redirect('tool');
    }

    public function destroy($id)
    {
        Tool::find($id)->delete();
        return redirect('tool');
    }
}
