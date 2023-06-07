<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\EmployeeAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Str;
use App\Models\PointsModel;
use Carbon\Carbon;

class GoogleController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){

        try {
            $g_user = Socialite::driver('google')->user();

            // $token = $g_user->token;
            // $refreshToken = $g_user->refreshToken;
            // $expiresIn = $g_user->expiresIn;

            $user = User::where('google_id', $g_user->getId())->first();
                
            if(!$user){
                $password = Str::random(10);
                $new_user = User::create([
                    'first_name' => $g_user->user['given_name'],
                    'last_name' => $g_user->user['family_name'],
                    'username' => $g_user->getNickname(),
                    'email' => $g_user->getEmail(),
                    'google_id' => $g_user->getId(),
                    'profile_pic' => $g_user->getAvatar(),
                    'password' => bcrypt($password),
                    'email_verified_at' => Carbon::now(),
                    
                ]);

                $PointsModel = new PointsModel();
                $PointsModel->employee_id = $new_user->id;
                $PointsModel->save();

                Auth::login($new_user);

                // $mParam['logmsg'] = 'You are a new user who just created an account trough Google Auth';
                return redirect()->intended('home')->with('Welcome aboard '.$g_user->user["given_name"].'!');
                // return view('test.googleauth', $mParam);
            }else{

                Auth::login($user);

                // switch ($user->role) {
                //     case 0: // Applicant
                //         return redirect()->route('applicant.index')->with('success', 'Welcome back, ' . $g_user->user["given_name"] . '!');
                //         break;
                //     case 1: // Employee
                //         return redirect()->route('employee.index')->with('success', 'Welcome back, ' . $g_user->user["given_name"] . '!');
                //         break;
                //     case 2: // Admin
                //         return redirect()->route('admin.index')->with('success', 'Welcome back, ' . $g_user->user["given_name"] . '!');
                //         break;
                //     default:
                //         return redirect()->route('home');
                // }

                if($user->role == 2){
                    return redirect()->route('admin.index')->with('status', 'Welcome back ' . $g_user->user["given_name"] . '!');
                }elseif($user->role == 1){
                    return redirect()->route('employee.index')->with('status', 'Welcome back ' . $g_user->user["given_name"] . '!');
                }else{
                    return redirect()->route('applicant.index')->with('status', 'Welcome aboard ' . $g_user->user["given_name"] . '!');
                }
                // $mParam['logmsg'] = 'Already have account therefore you shoud be logged in rn';
                // return view('home', $mParam);
                // return redirect()->intended('test/google')->with($mParam);

                // return redirect()->intended('/');
            }
        } catch (\Throwable $th) {
            dd('Something went wrong! '.$th->getMessage());
        }



    // Handle user details and authentication
    // E.g., check if the user exists in the database, create a new user, or log in the existing user
        // print_r($user);
    // return redirect()->route('home'); // Redirect to the desired page after authentication
    }
}
