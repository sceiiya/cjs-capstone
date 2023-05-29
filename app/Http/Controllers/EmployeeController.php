<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PointSystem;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        // return view('employees.index', compact('employees'));
        return view('test.showemployees', ['employees' => $employees]);

    }

    public function testcrud()
    {
        return view('test.employee');
    }
    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     // return view('employees.create');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   

        $user = Employee::where('email', $request->email)->first();

        // Validate the request data
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'nullable',
            'email' => 'required',
            'password' => 'required',
            'job_position' => 'required',
            'job_type' => 'required',
            'country' => 'required',
            'city' => 'required',
            'province_state' => 'required',
            'street' => 'required',
            'postal_id' => 'required|numeric',
            // Add validation rules for other fields
        ]);
        // $employee = Employee::create($request->all());
        if(!$user){
            $employee = Employee::create($data);
        
            $pointSystem = new PointSystem();
            $pointSystem->employee_id = $employee->id;
            $pointSystem->save();

            return redirect(route('employee-crud'));

        }elseif ($user) {
            
            return redirect(route('employee-crud'))->withError(dd($user));

        }
        // Create a new employee record
        // dd($request);
        // dd(Employee::create($request->all()));
        // return Employee::create($request->all());

        // Redirect to the index page with success message
        // return redirect()->route('employees.index')->with('success', 'Employee created successfully');
    }

    public function viewlogin()
    {

    }
    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Employee $employee)
    // {
    //     return view('employees.edit', compact('employee'));
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        // Validate the request data
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            // Add validation rules for other fields
        ]);

        // Update the employee record
        $employee->update($request->all());

        // Redirect to the index page with success message
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        // Delete the employee record
        $employee->delete();

        // Redirect to the index page with success message
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('test/google'); // Redirect to the desired page after logout
    }
}
