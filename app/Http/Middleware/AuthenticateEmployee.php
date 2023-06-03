<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateEmployee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            //0 = User // 1 = Employee // 2 = Admin
            if(Auth::user()->role === 'employee'){
                return $next($request);
            }elseif(Auth::user()->role === 'applicant'){
                return redirect('/home')->with('message', 'Access denieid! You are not an employee!');
            }else{
                return redirect('/home')->with('message', 'Access denieid! you are not an employee');
            }
        }else{
            return redirect('/login')->with('message', 'Access denieid! Please sign up first!');
        }
        // return $next($request);
    }
}
