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

class Google extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){

        try {
            $g_user = Socialite::driver('google')->user();

            $user = Employee::where('google_id', $g_user->getId())->first();
        
                // $nname = $g_user->getName();
                // $nnemail = $g_user->getEmail();
                // $nnid = $g_user->getId();
                echo 'name: '.$g_user->getName().'<br/>first name: '.$g_user->user['given_name'].'<br/>last name: '.$g_user->user['family_name'].'<br/>email: '.$g_user->getEmail().'<br/>gug ID: '.$g_user->getId().'<br/>avatar: '.$g_user->getAvatar();
        
                // print_r([
                //     'name' => $g_user->getName(),
                //     'first_name' => $g_user->user['given_name'],
                //     'last_name' => $g_user->user['family_name'],
                //     'email' => $g_user->getEmail(),
                //     'google_id' => $g_user->getId(),
                //     'avatar' => $g_user->getAvatar(),
                // ]);
        
            if(!$user){
                $password = Str::random(10);
                $new_user = Employee::create([
                    'first_name' => $g_user->user['given_name'],
                    'last_name' => $g_user->user['family_name'],
                    'email' => $g_user->getEmail(),
                    'google_id' => $g_user->getId(),
                    'profile_pic' => $g_user->getAvatar(),
                    'password' => bcrypt($password),
                ]);

                Auth::login($new_user);

                // return redirect()->intended('/');
            }else{
                Auth::login($user);
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
