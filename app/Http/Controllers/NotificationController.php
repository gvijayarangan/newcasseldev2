<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Notification;

class NotificationController extends Controller
{
    //
    public function index(Request $request)
    {
        //
        /*$notifications=Notification::all();
        return view('notifications.index',compact('notifications'));*/
        $notifications = Notification::orderBy('id','ASC')->paginate(5);
        return view('notifications.index',compact('notifications'));
            /*->with('i', ($request->input('page', 1) - 1) * 5);*/
    }

    public function show($id)
    {
        $notification = Notification::find($id);
        return view('notifications.show',compact('notification'));
    }


    public function create()
    {
        return view('notifications.create');
    }

    /**
     * Store a newly created resource in storage.
     *  public function store(Request $request)
     *
     * @return Response
     */
    public function store(Request $request)
    {
        /*$notification= new Notification($request->all());*/
        /*$notification->save();*/
        /*return redirect('notifications');*/
        $this->validate($request, [
            'noti_type' => 'required|unique:notifications',
            'noti_email_title' => 'required',
            'noti_alert_content' => 'required',
            'noti_status' => 'required',
        ]);

        Notification::create($request->all());
        return redirect()->route('notifications.index')
            ->with('success','Notification created successfully');
    }

    public function edit($id)
    {
        $notification=Notification::find($id);
        return view('notifications.edit',compact('notification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        /*$notification= new Notification($request->all());
        $notification=Notification::find($id);
        $notification->update($request->all());
        return redirect('notifications');*/

        $this->validate($request, [
            'noti_type' => 'required|unique:notifications',
            'noti_email_title' => 'required',
            'noti_alert_content' => 'required',
            'noti_status' => 'required',
        ]);

        Notification::find($id)->update($request->all());
        return redirect()->route('notifications.index')
            ->with('success','Email notification updated successfully');
    }

    public function destroy($id)
    {
       /* Notification::find($id)->delete();
        return redirect('notifications');*/
        Notification::find($id)->delete();
        return redirect()->route('notifications.index')
            ->with('success','Email notification deleted successfully');
    }
}
