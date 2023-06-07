<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
          href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap"
          rel="stylesheet">
        <title>{{$title}}</title>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-emerald-100 hr-solutions-bg nunito-font">
        <h1 class='pt-8 bg-red-800 text-center w-full text-white text-lg font-extrabold'>
            Test Homepage Layout BOO!
        </h1>
        <!-- ---------------============== playground ==============--------------- -->
        <section class="flex flex-col justify-center p-3 ml-5">
        <div>
        @if(session()->has('success'))
            {{session('success')}}
        @endif
        </div>
        <!-- Employee Table -->
        <div id="employeeTable">

        </div>

        <!-- Create Employee Form -->
        @if(empty($editemployee))
        <form class="flex flex-col" id="createEmployeeForm" method="POST" action="{{ route('employees.store') }}">
            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="">
                        {{$error}}
                        </li>
                    @endforeach
                </ul>
            @endif
        <!-- <form class="flex flex-col" id="createEmployeeForm" method="POST" action="{{ route('employees.store') }}"> -->
            @csrf
            @method('post')
            <!-- Form fields -->
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="text" name="middle_name" placeholder="Middle Name">
            <input type="text" name="username" placeholder="Username" required>

            <label for="job_type">Job Type</label>
            <select name="job_type" required>
                <option value="" disabled selected>Select Time</option>
                <option value="Part-time">Part-Time</option>
                <option value="Full-Time">Full-Time</option>
            </select>
            
            <label for="job_position">Job Position</label>
            <select name="job_position" required>
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

            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>

            <input type="text" name="country" placeholder="Country" required>
            <input type="text" name="province_state" placeholder="Province/State" required>
            <input type="text" name="city" placeholder="City" required>
            <input type="text" name="street" placeholder="House#./Building Name/Street" required>
            <input type="number" name="postal_id" placeholder="Postal Code" required>

            <!-- Add other fields as needed -->

            <!-- Submit button -->
            <button type="submit">Create Employee</button>
        </form>
        @endif

        @if(!empty($editemployee))
        <form class="flex flex-col" id="updateEmployeeForm" method="POST" action="{{ route('employee.update', [ 'employee' => $editemployee]) }}">
        <!-- <form class="flex flex-col" id="createEmployeeForm" method="POST" action="{{ route('employees.store') }}"> -->
            @csrf
            @method('put')
            <!-- Form fields -->
            <!-- <input type="text" name="id" placeholder="id" value="{{$editemployee->id}}" required> -->
            <input type="text" name="first_name" placeholder="First Name" value="{{$editemployee->first_name}}" required>
            <input type="text" name="last_name" placeholder="Last Name" value="{{$editemployee->last_name}}" required>
            <input type="text" name="middle_name" placeholder="Middle Name" value="{{$editemployee->middle_name}}">
            <input type="text" name="username" placeholder="Username" value="{{$editemployee->username}}">

            <label for="job_type">Job Type</label>
            <select name="job_type" required>
                <option value="" disabled selected>Select Time</option>
                <option value="Part-time" {{ $editemployee->job_type === 'Part-time' ? 'selected' : null }}>Part-Time</option>
                <option value="Full-Time" {{ $editemployee->job_type === 'Full-Time' ? 'selected' : '' }}>Full-Time</option>
            </select>
            
            <label for="job_position">Job Position</label>
            <select name="job_position" value="{{$editemployee->job_position}}" required>
                <option value="" disabled selected>Select Position</option>
                <optgroup label="Human Resources">
                    <option value="Chat Support" {{ $editemployee->job_position === 'Chat Support' ? 'selected' : '' }}>Chat Support</option>
                    <option value="Counselor" {{ $editemployee->job_position === 'Counselor' ? 'selected' : '' }}>Counselor</option>
                </optgroup>
                <optgroup label="Sales & Marketing">
                    <option value="Advertisment" {{ $editemployee->job_position === 'Advertisment' ? 'selected' : '' }}>Advertisment</option>
                    <option value="Marketer" {{ $editemployee->job_position === 'Marketer' ? 'selected' : '' }}>Marketer</option>
                </optgroup>
            </select>

            <input type="email" name="email" placeholder="Email" value="{{$editemployee->email}}" required>
            <input type="password" name="password" placeholder="Password" required>
            
            <input type="text" name="country" placeholder="Country" value="{{$editemployee->country}}" required>
            <input type="text" name="province_state" placeholder="Province/State" value="{{$editemployee->province_state}}" required>
            <input type="text" name="city" placeholder="City" value="{{$editemployee->city}}" required>
            <input type="text" name="street" placeholder="House#./Building Name/Street" value="{{$editemployee->street}}" required>
            <input type="number" name="postal_id" placeholder="Postal Code" value="{{$editemployee->postal_id}}" required>

            <!-- Add other fields as needed -->

            <!-- Submit button -->
            <button type="submit">Create Employee</button>
        </form>
        @endif

        <!-- Success message -->
        <div id="successMessage" style="display: none;"></div>

        <!-- Error message -->
        <div id="errorMessage" style="display: none;"></div>


        </section>
        <!-- ---------------============== playground ==============--------------- -->

    </body>
</html>
