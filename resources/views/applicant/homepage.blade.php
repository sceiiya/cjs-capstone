@extends('layouts.page')

@section('content')
<div class="text-center w-full flex items-center h-full">
@applicant
<a class="m-auto p-6 bg-emerald-400 rounded-md text-slate-50" href="{{ route('applicant.form') }}">
    <h1>Apply Now!</h1>
</a>
@endapplicant

@employee
<a class="m-auto p-6 bg-emerald-400 rounded-md text-slate-50" href="">
    <h1>You are an employee, This should be Dashboard Analytics for you!</h1>
</a>
@endemployee
</div>

@endsection