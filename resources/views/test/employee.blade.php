<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{!! csrf_token() !!}">

        <title>{{$title}}</title>
        @vite('resources/css/app.css')
    </head>
    <body class="">
        <h1 class='pt-8 bg-red-800 text-center w-full text-white text-lg font-extrabold'>
            Test Employee Model CRUD BOO!
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

            <table class="table-auto table">
                <tr>
                    <th>first_name</th>
                    <th>last_name</th>
                    <th>middle_name</th>
                    <th>username</th>
                    <th>email</th>
                    <th>applied_at</th>
                    <th>joined_at</th>
                    <th>archived_at</th>
                    <th>status</th>
                    <th>otp</th>
                    <th>profile_pic</th>
                    <th>job_position</th>
                    <th>job_type</th>
                    <th>country</th>
                    <th>city</th>
                    <th>province_state</th>
                    <th>street</th>
                    <th>postal_id</th>
                    <th>google_id</th>
                    <th>Edit<th>
                    <th>Delete</th>
                </tr>
                    @if(!empty($employees))
                    @foreach($employees as $employee)
                        <tr>   
                            <td> {{$employee->first_name}} </td>
                            <td> {{$employee->last_name}} </td>
                            <td> {{$employee->middle_name}} </td>
                            <td> {{$employee->username}} </td>
                            <td> {{$employee->email}} </td>
                            <td> {{$employee->applied_at}} </td>
                            <td> {{$employee->joined_at}} </td>
                            <td> {{$employee->archived_at}} </td>
                            <td> {{$employee->status}} </td>
                            <td> {{$employee->otp}} </td>
                            <td> {{$employee->profile_pic}} </td>
                            <td> {{$employee->job_position}} </td>
                            <td> {{$employee->job_type}} </td>
                            <td> {{$employee->country}} </td>
                            <td> {{$employee->city}} </td>
                            <td> {{$employee->province_state}} </td>
                            <td> {{$employee->street}} </td>
                            <td> {{$employee->postal_id}} </td>
                            <td> {{$employee->google_id}} </td>
                            <td><a href="{{route('employee.edit', [ 'employee' => $employee ])}}">Edit</a></td>
                            <td>
    <form action="{{ route('employee.delete', ['employee' => $employee]) }}" method="POST">
        @csrf
        @method('PUT')
        <button type="submit">Delete</button>
    </form>
</td>

                        </tr>
                        @endforeach
                        @endif
            </table>

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

        <!-- Edit Employee Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="editEmployeeForm" method="POST" action="{{ route('employees.update', ':id') }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <!-- Hidden field for employee ID -->
                            <input type="hidden" name="employee_id" id="editEmployeeId">
                            <!-- Edit form fields -->
                            <input type="text" name="first_name" id="editFirstName" placeholder="First Name" required>
                            <input type="text" name="last_name" id="editLastName" placeholder="Last Name" required>
                            <!-- Add other fields as needed -->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Success message -->
        <div id="successMessage" style="display: none;"></div>

        <!-- Error message -->
        <div id="errorMessage" style="display: none;"></div>


        </section>
        <!-- ---------------============== playground ==============--------------- -->

    </body>
</html>
