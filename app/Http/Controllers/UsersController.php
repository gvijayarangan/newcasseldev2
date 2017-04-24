<?php

/**
 * Users Controller
 *
 * @category   Users
 * @package    Basic-Controllers
 * @author     Sachin Pawaskar<spawaskar@unomaha.edu>
 * @copyright  2016-2017
 * @license    The MIT License (MIT)
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use App\Role;
use App\Rescontact;
use Auth;
use Session;
use Input;
use DB;
use Log;
use Mail;


class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');

        $this->user = Auth::user();
        $this->users = User::all();
        $this->list_role = Role::lists('display_name', 'id');
        $this->heading = "Users";

        $this->viewData = ['user' => $this->user, 'users' => $this->users, 'list_role' => $this->list_role, 'heading' => $this->heading];
    }

    public function index()
    {
        Log::info('UsersController.index: ');
        $users = User::all();
        $this->viewData['users'] = $users;

        return view('users.index', $this->viewData);
    }

    public function show(User $users)
    {
        $object = $users;
        Log::info('UsersController.show: ' . $object->id . '|' . $object->name);
        $this->viewData['user'] = $object;
        $this->viewData['heading'] = "View User: " . $object->name;

        return view('users.show', $this->viewData);
    }

 /*   public function create()
    {
        Log::info('UsersController.create: ');
        $this->viewData['heading'] = "New User";

        return view('users.create', $this->viewData);
    }*/
    public function create()
    {
        Log::info('UsersController.create: ');
        $this->viewData['heading'] = "New User";
        $res_con = Rescontact::select(DB::raw("CONCAT(con_fname, ' ',con_lname) as con_fname, id"))
            ->lists('con_fname', 'id');
        return view('users.create', $this->viewData, compact('res_con'));
    }

    public function store(UserRequest $request)
    {
        Log::info('UsersController.store - Start: ');
        $input = $request->all();
        $this->validate($request, [
            'rolelist' => 'required',
            'f_name' => 'required|max:255',
            'l_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            //'cell' => 'digits:10|min:0',
            'res_con_id' => 'unique:users',
        ]);
        $this->populateCreateFields($input);
        $input['password'] = "";
        $input['active'] = $request['active'] == '' ? false : true;
        $input['rec_email'] = $request['rec_email'] == '' ? false : true;
        $input['res_con_id'] = $request['res_con_id'];
        $object = User::create($input);
        $this->syncRoles($object, $request->input('rolelist'));
        Session::flash('flash_message', 'User successfully added');
        Log::info('UsersController.store - End: ' . $object->id . '|' . $object->name);

        session_start();
        $_SESSION['user_id'] = $object->id;
        $_SESSION['user_email'] = $request['email'];

        error_log('store - Value of User ID for creating password for the first time - ' . $object->id);

        $data = array(
            'name' => $request['email'],
        );

        $noti_status = DB::table('notifications')->where('noti_type', 'New Account Setup')->value('noti_status');
        if ($noti_status == 'Active') {
            Mail::send('emails.emailpassword', $data, function ($message) {
                $message->from('newcassel@domain.com', 'New Cassel Work Order System');
                $message->to($_SESSION['user_email'])
                    ->subject($noti_email_title = DB::table('notifications')->where('noti_type', 'New Account Setup')->value('noti_email_title'));
            });
        }

        return redirect()->back();
    }

/*    public function edit(User $users)
    {
        $object = $users;
        Log::info('UsersController.edit: ' . $object->id . '|' . $object->name);
        $this->viewData['user'] = $object;
        $this->viewData['heading'] = "Edit User: " . $object->name;

        return view('users.edit', $this->viewData);
    }*/

    public function edit(User $users)
    {
        $object = $users;
        Log::info('UsersController.edit: ' . $object->id . '|' . $object->name);
        $this->viewData['user'] = $object;
        $this->viewData['heading'] = "Edit User: " . $object->name;
        $res_con = Rescontact::select(DB::raw("CONCAT(con_fname, ' ',con_lname) as con_fname, id"))
            ->lists('con_fname', 'id');
        return view('users.edit', $this->viewData,compact('res_con'));
    }

    public function update(User $users, UserRequest $request)
    {
        $object = $users;
        Log::info('UsersController.update - Start: ' . $object->id . '|' . $object->name);
        $this->validate($request, [
            'f_name' => 'required|max:255',
            'l_name' => 'required|max:255',
            //'cell' => 'digits:10|min:0',
            //'res_con_id' => 'unique:users',
        ]);
        $this->populateUpdateFields($request);
        //$request['active'] = $request['active'] == '' ? true : false;

        $object->update($request->all());
        //$this->syncRoles($object, $request->input('rolelist'));
        Session::flash('flash_message', 'User successfully updated!');
        Log::info('UsersController.update - End: ' . $object->id . '|' . $object->name);
        return redirect('users');
    }

    /**
     * Destroy the given user.
     *
     * @param  Request $request
     * @param  User $user
     * @return Response
     */
    public function destroy(Request $request, User $users)
    {
        $object = $users;
        Log::info('UsersController.destroy: Start: ' . $object->id . '|' . $object->name);
        if ($this->authorize('destroy', $object)) {
            Log::info('Authorization successful');
            $object->delete();
        }
        Log::info('UsersController.destroy: End: ');
        return redirect('/users');
    }

    /**
     * Sync up the list of roles for the given user record.
     *
     * @param  User $user
     * @param  array $roles (id)
     */
    private function syncRoles(User $user, array $roles)
    {
        Log::info('UsersController.syncRoles: Start: ' . $user->name);
        // ToDo: At somepoint need to update the timestamps and created_by/updated_by fields on the pivot table
        $user->roles()->sync($roles);
//        $user->roles()->sync([$roles => ['created_by' => Auth::user()->name, 'updated_by' => Auth::user()->name]]);
    }

    public function getContactDetails(Request $request) {
        $input = $request -> input('option');
        $contact_data = Rescontact::
        select(DB::raw("con_fname, con_mname, con_lname,con_cellphone,con_email"))->where('id', '=' , $input )->get();

        return $contact_data;
    }


}
