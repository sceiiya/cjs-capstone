<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Illuminate\Http\Client\Request;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // protected function authenticated(Request $request,User $user)
    // {
    //     if ($user->role == '2') {
    //         return redirect()->route('admin.index')->with('status', 'Welcome back ' . $user->first_name . '!');
    //     } elseif ($user->role == '1') {
    //         return redirect()->route('employee.index')->with('status', 'Welcome back ' . $user->first_name . '!');
    //     } elseif ($user->role == '0') {
    //         return redirect()->route('applicant.index')->with('status', 'Welcome back ' . $user->first_name . '!');
    //     }

    //     // Default redirect if the user role is not recognized
    //     return redirect()->route('applicant.index')->with('status', 'Welcome huh? ' . $user->first_name . '!');
    // }

    protected function redirectTo()
    {
        $user = auth()->user();

        if (Auth::check() && Auth::user()->role == 2) {
            return RouteServiceProvider::ADMINHOME;
            // return redirect()->route('admin.index')->with('status', 'Welcome back ' . $user->first_name . '!');
        } elseif (Auth::check() && Auth::user()->role == 1) {
            return RouteServiceProvider::TEAMHOME;
            // return redirect()->route('employee.index')->with('status', 'Welcome back ' . $user->first_name . '!');
        } elseif (Auth::check() && Auth::user()->role == 0) {
            return RouteServiceProvider::HOME;
            // return redirect()->route('applicant.index')->with('status', 'Welcome back ' . $user->first_name . '!');
        }
        // return RouteServiceProvider::HOME;
    }
    // protected $redirectTo = RouteServiceProvider::HOME;

}
