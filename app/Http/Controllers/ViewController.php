<?php

namespace App\Http\Controllers;

use App\Models\Applicants;
use Illuminate\Http\Request;
use App\Models\DataModel;
use App\Models\EmployeeModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ViewController extends Controller
{
    public function showemployee(EmployeeModel $mData){
        // $employees = EmployeeModel::all();
        // return view('employees.index', compact('employees'));
        // return view('test.showemployees', ['employees' => $employees]);
        // $employees = Employee::whereNull('archived_at')->get();

        $mParam['title'] = 'All Employees';
        $mParam['employees'] = $mData->whereNull('archived_at')->get();
        return view('test.employee', $mParam);
    }

    public function employeeedit(EmployeeModel $employee){
        // $employees = EmployeeModel::all();
        // return view('employees.index', compact('employees'));
        // return view('test.showemployees', ['employees' => $employees]);

        $mParam['title'] = 'Edit Employees';
        $mParam['editemployee'] = $employee;
        // return $employee;
        return view('test.employee', $mParam);
    }

    //====================== Home view methods ======================
    public function applicanthome()
    {
        $pData['title'] = 'Applicant Page';
        return view('applicant.homepage', $pData);
    }

    public function employeehome()
    {
        $pData['title'] = 'Employee Page';
        return view('applicant.homepage', $pData);
    }

    public function adminhome()
    {
        $pData['title'] = 'Admin Page';
        return view('applicant.homepage', $pData);
    }


    //====================== applicant methods ======================
    public function applicantform()
    {
        $pData['usercreds'] = Session::get('user');
        $pData['title'] = 'Application Form';
        return view('applicant.form', $pData);
    }

    public function applicantstatus()
    {   
        $user = Auth::user();
        // return Applicants::where('employee_id', $user->id)->get();
        $pData['usercreds'] = Session::get('user');
        $pData['user'] = $user;
        $pData['applicantForm'] = Applicants::where('employee_id', $user->id)->get();
        $pData['title'] = 'Application Status';
        return view('applicant.status', $pData);
    }
}
