<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function applicantHome(){
        return view('home', ['msg' => "I am applicant"]);
    }

    public function employeeHome(){
        return view('home', ['msg' => "I am employee"]);
    }

    public function adminHome(){
        return view('home', ['msg' => "I am admin"]);
    }
}
