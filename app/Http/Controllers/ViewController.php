<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataModel;
use App\Models\EmployeeModel;

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
}
