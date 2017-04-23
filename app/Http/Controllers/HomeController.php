<?php

/**
 * Home Controller
 *
 * @category   Home
 * @package    Basic-Controllers
 * @author     Sachin Pawaskar<spawaskar@unomaha.edu>
 * @copyright  2016-2017
 * @license    The MIT License (MIT)
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check())
        {
            $user = Auth::user();
            $loginUser = Auth::user()->getUserEmail();
            setcookie('login', $loginUser, time() + (86400 * 30), "/");
            if ($user->hasRole('admin') || $user->hasRole('engineer'))
             return view('carousel', compact('user'));
            else if ($user->hasRole('contact')|| $user->hasRole('employee'))
                return view('carousel', compact('user'));

        }
    }
}
