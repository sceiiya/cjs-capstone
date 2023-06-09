@extends('layouts.page')

@section('content')

<form class="flex flex-col mx-3 p-3 bg-slate-400 bg-opacity-60 rounded-sm stroke-emerald-200" id="createEmployeeForm" method="POST" action="{{ route('employees.store') }}">
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li class="">
                {{$error}}
                </li>
            @endforeach
        </ul>
    @endif
    @csrf
    @method('post')
    <!-- Form fields -->
    <label for="full_name">Full Name</label>
    <div class="flex flex-row max-sm:flex-col items-center w-full">
        <input class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-2/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="text" name="first_name" placeholder="First Name" required>
        <input class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-2/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="text" name="last_name" placeholder="Last Name" required>
        <input class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-2/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="text" name="middle_name" placeholder="Middle Name">
    </div>

    <label for="full_name">Current Place</label>
    <div class="flex flex-row max-sm:flex-col items-center w-full">
        <select id="formCountry" class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-2/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" name="job_type" required>
            <option value="" disabled selected>Select Country</option>
        </select>
        <input class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-2/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="text" name="country" placeholder="Country" required>
        <input class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-2/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="text" name="province_state" placeholder="Province/State" required>
        <input class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-2/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="text" name="city" placeholder="City" required>
    </div>
    
    <div class="flex flex-row max-sm:flex-col items-center w-full">
        <input class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-3/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="text" name="street" placeholder="House#./Building Name/Street" required>
        <input class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-3/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="number" name="postal_id" placeholder="Postal Code" required>
    </div>

    <label class="w-11/12 m-auto h-9 rounded-md text-center bg-slate-300 shadow-md items-center border-box">Applying for</label>
    <div class="flex flex-row max-sm:flex-col items-center w-full">
        <div class="flex flex-row items-center w-full">
            <label for="job_type">Job Type</label>
            <select class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-2/6 max-sm:w-10/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" name="job_type" required>
                <option value="" disabled selected>Select Time</option>
                <option value="Part-time">Part-Time</option>
                <option value="Full-Time">Full-Time</option>
            </select>
        </div>
    
        <div class="flex flex-row items-center w-full">
            <label for="job_position">Job Position</label>
            <select class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-2/6 max-sm:w-10/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" name="job_position" required>
                <option value="" disabled selected>Select Position</option>
                <optgroup label="Human Resources">
                    <option value="Chat Support">Chat Support</option>
                    <option value="Counselor">Counselor</option>
                </optgroup>
                <optgroup label="Sales & Marketing">
                    <option value="Advertisment">Advertisment</option>
                    <option value="Marketer">Marketer</option>
                </optgroup>
            </select>
        </div>
    </div>
    <!-- Add other fields as needed -->

    <!-- Submit button -->
    <button type="submit">Submit Application</button>
</form>

@endsection