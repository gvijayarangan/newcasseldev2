<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Session;

use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    protected $redirectPath = '/home';
    protected $loginPath = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => ['logout', 'updatePassword', 'showUpdatePassword']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'f_name' => 'required|max:255',
            'l_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password'   => array(
                'required',
                'min:6',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/',
                'confirmed'),
            'cell' => 'required|min:10|max:10',
            'role' => 'required',
        ]);
    }
    protected $maxLoginAttempts = 5; // Amount of bad attempts user can make
    protected $lockoutTime = 300; // Time for which user is going to be blocked in seconds

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'f_name' => $data['name'],
            'l_name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'cell' => $data['cell'],
        ]);
    }

    public function showUpdatePassword()
    {

        return view('auth.passwords.change');

    }

    public function checkSession()
    {
        return Response::json(['guest' => Auth::guest()]);
        $this->middleware('guest', ['except' => ['logout', 'checkSession']]);
    }
    // Todo: should probably implemeent a trait ChangePassword
    /**
     * Updates the password for the current user.
     *
     * @param  void
     * @return void
     */
    public function updatePassword()
    {
        if (Auth::check())
        {
            Session::forget('flash_message');
            Session::forget('error_message');

            $user = Auth::user();
            $rules = array(
                'old_password' => 'required',
                'password' => array(
                    'required',
                    'different:old_password',
                    'min:8',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/',
                    'confirmed'),

                'password_confirmation' => array(
                    'required',
                    'min:8',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'),
            );

            $passwordOInput = Input::get('old_password');
            $passwordNewInput = bcrypt(Input::get('password'));

            error_log('updatePassword - Value of old password - ' . $user->password);
            error_log('updatePassword - Value of new password - ' . $passwordOInput);

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                // return view('auth.passwords.change')->withErrors($validator);
                error_log('updatePassword - Inside fails ');

                return redirect()->back()->withErrors($validator->errors());

            } elseif (Hash::check($passwordOInput, $user->password)) {
                error_log('updatePassword - Inside Hash::check ');
                $user->password = $passwordNewInput;
                $user->save();
                Session::flash('flash_message', 'Password has been changed successfully');

                return view('auth.passwords.change');
            } else {
                error_log('updatePassword - Failed Hash::check ');
                //return view('auth.passwords.change')->withErrors($validator);
                Session::flash('error_message', 'Old password does not match');

                return view('auth.passwords.change')->withErrors($validator);
                //return redirect()->back()->withErrors($validator->errors());

            }
        }
    }
    /*

        public function updatePassword()
        {
            if (Auth::check())
            {
                $user = Auth::user();
                $rules = array(
                    'old_password' => 'required',
                    'password' => 'required|confirmed|min:6'
                );

                $passwordOInput = bcrypt(Input::get('old_password'));
                $passwordNewInput = bcrypt(Input::get('password'));
                error_log('updatePassword - Value of old password - ' . $user->password);
                error_log('updatePassword - Value of new password - ' . $passwordOInput);

                $validator = Validator::make(Input::all(), $rules);

                if ($validator->fails()) {
                    return view('auth.passwords.change')->withErrors($validator);
                } elseif (Hash::check($passwordOInput, $user->password)) {
                    error_log('updatePassword - Inside Hash::check ');
                    $user->password = $passwordNewInput;
                    $user->save();
                    return view('auth.passwords.change')->with('Password has been changed');
                } else {
                    error_log('updatePassword - Failed Hash::check ');
                    return view('auth.passwords.change')->withErrors($validator);
                }
            }
        }
    */
    // This function overridden the one in traits AuthenticatesUsers.php
    protected function getCredentials($request)
    {
        $request['active'] = true;
        $request['deleted_at'] = null;
        return $request->only($this->loginUsername(), 'password', 'active', 'deleted_at');
    }

    public function showPasswordEmailPage()
    {
        return view('auth.passwords.email');
    }
}
