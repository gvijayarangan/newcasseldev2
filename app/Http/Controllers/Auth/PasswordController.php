<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\User;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Contracts\Auth\CanResetPassword;

use Hash;
use Auth;
use Illuminate\Support\Facades\Input;


class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showUserPasswordChange($user_id_from_email)
    {
        error_log('showUserPasswordChange - Value of User ID from email password url - ' . $user_id_from_email);
        $this->viewData['user_id_from_email'] = $user_id_from_email;
        return view('auth.passwords.createpassword', $this->viewData);
    }

    /**
     * Updates the password for the current user.
     *
     * @param  void
     * @return void
     */
    public function createNewPassword()
    {
        //Display the received id from url email

        //Get the user object from database
        $rules = array(
            'password'          => array(
                'required',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/',
                'confirmed'
            )
        );

        $user_id = $_POST["user_id_from_email"];
        error_log('createNewPassword - Value of User ID receieved from email password url - ' . $user_id);

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
            //return view('auth.passwords.createpassword')->withErrors($validator);
        } else {
            $user = User::find($user_id);
            Auth::login($user);
            $user->password = bcrypt(Input::get('password'));
            $user->save();

            $this->viewData['user_id_from_email'] = $user_id;

            if ($user->hasRole('admin'))
                return view('carousel', compact('user'));
            else
                return view('carousel', compact('user'));
            //return view('auth.passwords.createpassword')->with('Password has been changed',  $this->viewData);
        }
    }
}