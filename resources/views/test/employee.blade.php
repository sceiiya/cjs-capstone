<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{!! csrf_token() !!}">

        <title>Testing Employee Model</title>
        @vite('resources/css/app.css')
    </head>
    <body class="">
        <h1 class='pt-8 bg-red-800 text-center w-full text-white text-lg font-extrabold'>
            Test Employee Model CRUD!
        </h1>
        <!-- ---------------============== playground ==============--------------- -->
        <section class="flex flex-col justify-center p-3 ml-5">

        <!-- Employee Table -->
        <div id="employeeTable"></div>

        <!-- Create Employee Form -->
        <form class="flex flex-col" id="createEmployeeForm" method="POST" action="{{ route('employees.store') }}">
        <!-- <form class="flex flex-col" id="createEmployeeForm" method="POST" action="{{ route('employees.store') }}"> -->
            @csrf
            @method('post')
            <!-- Form fields -->
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="text" name="middle_name" placeholder="Last Name">
            
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
@vite(['resources/js/jquery.js', 'resources/js/auth.js'])