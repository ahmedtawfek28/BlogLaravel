<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {    
        if (Auth::guard()->check()&& Auth::user()->role->id == 1) {
            Toastr::info(Auth::user()->name, 'Welcome Dashboard Admin ');
            $this->redirectTo=route('admin.dashboard');
        }
        else {
            $this->redirectTo=route('author.dashboard');
           }
        $this->middleware('guest')->except('logout');
    }
}
