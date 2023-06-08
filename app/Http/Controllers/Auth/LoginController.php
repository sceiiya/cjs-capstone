<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Illuminate\Http\Client\Request;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
    //     $userdata = auth()->user();
    //     Session::push('user', [
    //         'name' => $userdata['first_name'].' '.$userdata['last_name'],
    //         'email' => $userdata['email'],
    //     ]);
    }

    protected function authenticated(Request $request, User $user)
{
    // Store the user data in the session
    // $request->session()->put('usercreds', $user);
    Session::push('user', 
    [
        'Mid' => $user->id,
        'name' => $user->first_name.' '.$user->last_name,
        'email' => $user->email,
        'Mfirst_name' => $user->first_name,
        'Mlast_name' => $user->last_name,
        'Mmiddle_name' => $user->middle_name,
        'Musername' => $user->username,
        'Memail' => $user->email,
        'Mphone_number' => $user->phone_number,
        'Mapplied_at' => $user->applied_at,
        'Mjoined_at' => $user->joined_at,
        'Mstatus' => $user->status,
        'Mprofile_pic' => $user->profile_pic,
        'Mjob_position' => $user->job_position,
        'Mjob_type' => $user->job_type,
        'Mcountry' => $user->country,
        'Mcity' => $user->city,
        'Mprovince_state' => $user->province_state,
        'Mstreet' => $user->street,
        'Mpostal_id' => $user->postal_id,
        'Memail_verified_at' => $user->email_verified_at,
    ]);


    // Redirect the user to the desired page
    // return redirect()->intended($this->redirectTo());
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
        if (Auth::check() && Auth::user()->role == 'admin') {
        // if (Auth::check() && Auth::user()->role == 2) {
            return RouteServiceProvider::ADMINHOME;
            // return redirect()->route('admin.index')->with('status', 'Welcome back ' . $user->first_name . '!');
        } elseif (Auth::check() && Auth::user()->role == 'employee') {
        // } elseif (Auth::check() && Auth::user()->role == 1) {
            return RouteServiceProvider::TEAMHOME;
            // return redirect()->route('employee.index')->with('status', 'Welcome back ' . $user->first_name . '!');
        } elseif (Auth::check() && Auth::user()->role == 'applicant') {
        // } elseif (Auth::check() && Auth::user()->role == 0) {
            return RouteServiceProvider::HOME;
            // return redirect()->route('applicant.index')->with('status', 'Welcome back ' . $user->first_name . '!');
        }
        // return RouteServiceProvider::HOME;
    }
    // protected $redirectTo = RouteServiceProvider::HOME;

}
