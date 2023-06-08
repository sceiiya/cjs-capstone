<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        //0 = User // 1 = Employee // 2 = Admin
        if(Auth::check() && Auth::user()->role == $role){
            return $next($request);  
        }else{
            $user = auth()->user();
            if (Auth::check() && Auth::user()->role == 'admin') {
            // if (Auth::check() && Auth::user()->role == 2) {
                // return RouteServiceProvider::ADMINHOME;
                return redirect()->route('admin.index')->with('status', 'Welcome back ' . $user->first_name . '!');
            } elseif (Auth::check() && Auth::user()->role == 'employee') {
            // } elseif (Auth::check() && Auth::user()->role == 1) {
                // return RouteServiceProvider::TEAMHOME;
                return redirect()->route('employee.index')->with('status', 'Welcome back ' . $user->first_name . '!');
            } elseif (Auth::check() && Auth::user()->role == 'applicant') {
            // } elseif (Auth::check() && Auth::user()->role == 0) {
                // return RouteServiceProvider::HOME;
                return redirect()->route('applicant.index')->with('status', 'Welcome back ' . $user->first_name . '!');
            }else{
            // return response()->json(["You don't have permission to access this page!"]);
            return redirect('/login')->with('message', 'Access denieid! Please sign up first!');
            }
        }

    }
}

