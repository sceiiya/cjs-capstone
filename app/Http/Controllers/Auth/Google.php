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
use App\Models\PointSystem;

class Google extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){

        try {
            $g_user = Socialite::driver('google')->user();

            $token = $g_user->token;
            $refreshToken = $g_user->refreshToken;
            $expiresIn = $g_user->expiresIn;

            $user = Employee::where('google_id', $g_user->getId())->first();
        
                // $nname = $g_user->getName();
                // $nnemail = $g_user->getEmail();
                // $nnid = $g_user->getId();
                echo '<br/>token: '.$token.'<br/>reftoken: '.$refreshToken.'<br/>expires: '.$expiresIn.'<br/>name: '.$g_user->getName().'<br/>first name: '.$g_user->user['given_name'].'<br/>last name: '.$g_user->user['family_name'].'<br/>email: '.$g_user->getEmail().'<br/>gug ID: '.$g_user->getId().'<br/>avatar: '.$g_user->getAvatar().'<br/>nickname: '.$g_user->getNickname();
        
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
                    'username' => $g_user->getNickname(),
                    'email' => $g_user->getEmail(),
                    'google_id' => $g_user->getId(),
                    'profile_pic' => $g_user->getAvatar(),
                    'password' => bcrypt($password),
                    'status' => 'verified',
                    
                    // Create a new record in the point_system table
                ]);

                $pointSystem = new PointSystem();
                $pointSystem->employee_id = $new_user->id;
                $pointSystem->save();

                Auth::login($new_user);

                // return redirect()->intended('/');
                $mParam['logmsg'] = 'You aare a new user who just created an account trough Google Auth';
                return view('test.googleauth', $mParam);
            }else{
                Auth::login($user);
                $mParam['logmsg'] = 'Already have account therefore you shoud be logged in rn';
                return view('test.googleauth', $mParam);

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
