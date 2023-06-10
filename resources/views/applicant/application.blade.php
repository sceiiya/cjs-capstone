@extends('layouts.pdf')

@section('pdf')

<div class="flex flex-col mx-3 p-3 bg-slate-400 bg-opacity-60 rounded-sm stroke-emerald-200" id="createEmployeeForm">

    <label for="full_name">Full Name</label>
    <div class="flex flex-row max-sm:flex-col items-center w-full">
        <input class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-full max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="text" name="first_name" value="{{ $user->first_name.' '.$user->middle_name.' '.$user->last_name }}" placeholder="First Name" required>
    </div>

    <label class="pb-1" for="full_name">Current Place</label>
    <div class="flex flex-row max-sm:flex-col items-center w-full">
        <input class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-2/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="text" value="{{ $user->country }}" placeholder="Country" required>
        <input class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-2/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="text" value="{{ $user->province_state }}" placeholder="Province/State" required>
        <input class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-2/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="text" value="{{ $user->city }}" placeholder="City" required>
    </div>
    
    <div class="flex flex-row max-sm:flex-col items-center w-full">
        <input class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-3/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="text" value="{{ $user->street }}" placeholder="House#./Building Name/Street" required>
        <input id="formPostalCode" class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-3/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="number" value="{{ $user->postal_id }}" placeholder="Postal Code" required>
    </div>

    {{-- <label class="w-11/12 m-auto h-9 rounded-md text-center bg-slate-300 shadow-md items-center border-box">Applying for</label>
    <div class="flex flex-row max-sm:flex-col items-center w-full">
        <div class="flex flex-row items-center w-full">
            <label for="job_type">Job Type</label>
            <input class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-9/12 max-sm:w-9/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" value="{{ $applicantForm->job_type }}" required>
        </div>
    
        <div class="flex flex-row items-center w-full">
            <label for="job_position">Job Position</label>
            <input class="" value="{{ $applicantForm->job_position }}">
        </div>
    </div> --}}

    <label class="w-11/12 m-auto h-9 rounded-md text-center bg-slate-300 shadow-md items-center border-box">Educational Background</label>
    <div class="flex flex-col max-sm:flex-col items-center w-full">
        <label class="w-11/12 m-auto h-9 rounded-md text-center bg-slate-300 shadow-md items-center border-box">Highest Educational Attainment</label>
        <input class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-3/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="text" value="{{ $applicantForm->highest_ed }}" placeholder="Highest Educational Attainment" required>
        <label class="w-11/12 m-auto h-9 rounded-md text-center bg-slate-300 shadow-md items-center border-box">Place Studied</label>
        <input class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-3/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="text" value="{{ $applicantForm->highest_ed_attended }}" placeholder="Place Studied" required>
    </div>

    <label class="w-11/12 m-auto h-9 rounded-md text-center bg-slate-300 shadow-md items-center border-box">Occupational Background</label>
    <div class="flex flex-col max-sm:flex-col items-center w-full">
        <label class="w-11/12 m-auto h-9 rounded-md text-center bg-slate-300 shadow-md items-center border-box">Last Occupation</label>
        <input class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-3/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="text" value="{{ $applicantForm->last_occupation }}" placeholder="Last Occupation" required>
        <label class="w-11/12 m-auto h-9 rounded-md text-center bg-slate-300 shadow-md items-center border-box">Place Last Occupation Attended</label>
        <input class="appearance-none shadow-md h-9 p-2 m-2 text-md text-slate-600 rounded-md w-3/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" type="text" value="{{ $applicantForm->last_occupation_attended }}" placeholder="Place Last Occupation Attended" required>
    </div>

    <label class="w-11/12 m-auto h-9 rounded-md text-center bg-slate-300 shadow-md items-center border-box">About you</label>
    <div class="flex flex-row max-sm:flex-col py-2 items-center w-full text-center">
        <textarea rows="4" cols="50" maxlength="255" class="appearance-none shadow-md p-2 m-auto text-md text-slate-600 rounded-md w-5/6 max-sm:w-11/12 focus:outline-none focus:outline-emerald-200 bg-slate-50 bg-opacity-80" placeholder="Tell us more about yourself" required>{{ $applicantForm->about_me }}</textarea>
    </div>

    <!-- Add other fields as needed -->

    <!-- Submit button -->
</div>

@endsection