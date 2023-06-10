@extends('layouts.page')

@section('content')

<form class="flex flex-col mx-3 p-3 bg-slate-400 bg-opacity-60 rounded-sm stroke-emerald-200" id="createEmployeeForm" method="POST" action="{{ route('submit.applicant.form') }}">
    @csrf
    @method('post')
    <!-- Form fields -->
    <input class="hidden" type="number" name="employee_id" value="{{ auth()->user()->id }}" required>

    <label for="full_name">Full Name</label>
    <div class="flex flex-row max-sm:flex-col items-center w-full">
        <input class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-2/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="text" name="first_name" value="{{ auth()->user()->first_name }}" placeholder="First Name" required>
        <input class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-2/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="text" name="last_name" value="{{ auth()->user()->last_name }}" placeholder="Last Name" required>
        <input class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-2/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="text" name="middle_name" value="{{ auth()->user()->middle_name }}" placeholder="Middle Name">
    </div>

    <label for="full_name">Current Place</label>
    <div class="flex flex-row max-sm:flex-col items-center w-full">
        <select id="formCountry" class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-2/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" name="country" required>
            <option value="" disabled selected>Select Country</option>
        </select>
        <select id="formProvince" title="Choose a Country first" class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-2/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" name="province_state" required>
            <option value="" disabled selected>Select Province/State</option>
        </select>
        <select id="formCity" title="Choose a Province/State first" class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-2/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" name="city" required>
            <option value="" disabled selected>Select City</option>
        </select>

        {{-- <input class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-2/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="text" name="country" placeholder="Country" required>
        <input class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-2/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="text" name="province_state" placeholder="Province/State" required>
        <input class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-2/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="text" name="city" placeholder="City" required> --}}
    </div>
    
    <div class="flex flex-row max-sm:flex-col items-center w-full">
        <input class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-3/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="text" name="street" placeholder="House#./Building Name/Street" required>
        <input id="formPostalCode" class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-3/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="number" name="postal_id" placeholder="Postal Code" required>
    </div>

    <label class="w-11/12 m-auto h-9 rounded-md text-center bg-slate-300 shadow-md items-center border-box">Applying for</label>
    <div class="flex flex-row max-sm:flex-col items-center w-full">
        <div class="flex flex-row items-center w-full">
            <label for="job_type">Job Type</label>
            <select class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-9/12 max-sm:w-9/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" name="job_type" required>
                <option value="" disabled selected>Select Time</option>
                <option value="Part-time">Part-Time</option>
                <option value="Full-Time">Full-Time</option>
            </select>
        </div>
    
        <div class="flex flex-row items-center w-full">
            <label for="job_position">Job Position</label>
            <select class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-9/12 max-sm:w-9/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" name="job_position" required>
                <option value="" disabled selected>Select Position</option>
                <optgroup label="Human Resources">
                    <option value="HR Manager">HR Manager</option>
                    <option value="Recruiter">Recruiter</option>
                    <option value="Training Specialist">Training Specialist</option>
                    <option value="Compensation Analyst">Compensation Analyst</option>
                </optgroup>
                <optgroup label="Sales & Marketing">
                    <option value="Sales Representative">Sales Representative</option>
                    <option value="Marketing Manager">Marketing Manager</option>
                    <option value="Digital Marketing Specialist">Digital Marketing Specialist</option>
                    <option value="Brand Ambassador">Brand Ambassador</option>
                </optgroup>
                <optgroup label="Finance">
                    <option value="Financial Controller">Financial Controller</option>
                    <option value="Accounts Payable Clerk">Accounts Payable Clerk</option>
                    <option value="Financial Analyst">Financial Analyst</option>
                    <option value="Tax Specialist">Tax Specialist</option>
                </optgroup>
                <optgroup label="Operations">
                    <option value="Operations Manager">Operations Manager</option>
                    <option value="Logistics Coordinator">Logistics Coordinator</option>
                    <option value="Procurement Officer">Procurement Officer</option>
                    <option value="Quality Assurance Specialist">Quality Assurance Specialist</option>
                </optgroup>
                <optgroup label="Information Technology">
                    <option value="IT Project Manager">IT Project Manager</option>
                    <option value="Database Administrator">Database Administrator</option>
                    <option value="Software Engineer">Software Engineer</option>
                    <option value="Cybersecurity Analyst">Cybersecurity Analyst</option>
                </optgroup>
                <optgroup label="Creative">
                    <option value="Graphic Designer">Graphic Designer</option>
                    <option value="Copywriter">Copywriter</option>
                    <option value="UI/UX Designer">UI/UX Designer</option>
                    <option value="Art Director">Art Director</option>
                </optgroup>
            </select>
            
        </div>
    </div>

    <label class="w-11/12 m-auto h-9 rounded-md text-center bg-slate-300 shadow-md items-center border-box">Educational Background</label>
    <div class="flex flex-row max-sm:flex-col items-center w-full">
        <input class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-3/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="text" name="highest_ed" placeholder="Highest Educational Attainment" required>
        <input class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-3/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="text" name="highest_ed_attended" placeholder="Place Studied" required>
    </div>

    <label class="w-11/12 m-auto h-9 rounded-md text-center bg-slate-300 shadow-md items-center border-box">Occupational Background</label>
    <div class="flex flex-row max-sm:flex-col items-center w-full">
        <input class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-3/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="text" name="last_occupation" placeholder="Last Occupation" required>
        <input class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-3/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="text" name="last_occupation_attended" placeholder="Place Occupation Attended" required>
    </div>

    <label class="w-11/12 m-auto h-9 rounded-md text-center bg-slate-300 shadow-md items-center border-box">About you</label>
    <div class="flex flex-row max-sm:flex-col py-2 items-center w-full text-center">
        <textarea rows="4" cols="50" maxlength="255" class="appearance-none shadow-md p-2 m-auto text-md text-slate-600 rounded-md w-5/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" name="about_me" placeholder="Tell us more about yourself" required></textarea>
    </div>


    <!-- Add other fields as needed -->

    <!-- Submit button -->
    <button class="w-39 p-2 my-6 m-auto h-9 rounded-md text-center bg-emerald-400 text-slate-50 shadow-md items-center" type="submit">Submit Application</button>
</form>
@vite('resources/js/applicantForms.js')
@endsection