<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PointsModel;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Hash;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        // $employees = Employee::whereNull('archived_at')->get();
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
        $user = EmployeeModel::where('email', $request->email)->first();

        // Validate the request data
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'nullable',
            'username' => 'required',
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

            $data['password'] = Hash::make($data['password']);
            // $data['password'] = bcrypt($data['password']);

            $employee = EmployeeModel::create($data);
        
            $PointsModel = new PointsModel();
            $PointsModel->employee_id = $employee->id;
            $PointsModel->save();

            return redirect()->route('employees.test.show')->with('success', 'Employee registered successfully');

            // return redirect(route('employee-crud'));

        }elseif ($user) {
            
            return redirect()->route('employees.test.show')->with('success', 'You already have an account, Please Login!');
            // return redirect(route('employee-crud'))->withError(dd($user));

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
    public function edit(EmployeeModel $employee)
    {
        // return view('');
        dd($employee);
        // return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmployeeModel $employee)
    {
        // Validate the request data
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'nullable',
            'username' => 'required',
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

        $employee->update($data);
        // Update the employee record
        // $employee->update($request->all());
        // return ($employee);
        // Redirect to the index page with success message
        return redirect()->route('employees.test.show')->with('success', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function archive(EmployeeModel $employee)
    {
        // Delete the employee record
        $data = [
            'archived_at' => date("Y-m-d H:i:s"),
            'status' => 'archived',
        ];
        $employee->update($data);
        PointsModel::where('employee_id', $employee->id)->update(['status' => 'inactive']);
        // Redirect to the index page with success message
        return redirect()->route('employees.test.show')->with('success', 'Employee deleted successfully');
    }

    // public function processSignature(Request $request)
    // {
    //     $signatureData = $request->input('signatureData');
    
    //     // Generate the PDF using dompdf
    //     $dompdf = new Dompdf();
    //     $dompdf->loadHtml('<p>Some content goes here...</p>');
    
    //     // Add the signature image to the PDF
    //     $signatureImage = file_get_contents($signatureData);
    //     $dompdf->getCanvas()->registerXObject('signatureImage', $signatureImage);
    //     $dompdf->getCanvas()->drawXObject('signatureImage', ['x' => 100, 'y' => 100, 'width' => 200, 'height' => 100]);
    
    //     $dompdf->render();
    //     $output = $dompdf->output();
    
    //     // Save the PDF file or send it as a response to the client
    //     $filename = 'signed_document.pdf'; // Define a filename for the PDF file
    //     $path = storage_path('app/public/' . $filename); // Define the storage path for the PDF file
    
    //     file_put_contents($path, $output);
    
    //     // Alternatively, you can directly send the PDF as a response to the client
    //     // return response($output, 200)->header('Content-Type', 'application/pdf');
    
    //     // You can also store the PDF file path in the database or perform any other necessary actions
    //     // For example, you can associate the PDF file with a specific user or record
    
    //     // Return a response to the client indicating the success or redirect to a success page
    //     return response()->json(['message' => 'PDF file generated successfully.', 'file_path' => $path]);
    // }
}