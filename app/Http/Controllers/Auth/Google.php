<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

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
                echo 'name: '.$g_user->getName().'<br/>email: '.$g_user->getEmail().'<br/>gug ID: '.$g_user->getId();
        
                print_r([
                    'name' => $g_user->getName(),
                    'email' => $g_user->getEmail(),
                    'google_id' => $g_user->getId(),
                ]);
        
            if(!$user){
                $new_user = Employee::create([
                    'name' => $g_user->getName(),
                    'email' => $g_user->getEmail(),
                    'google_id' => $g_user->getId(),
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
