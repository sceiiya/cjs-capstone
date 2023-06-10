@extends('layouts.page')

@section('content')
<div class="text-center w-full flex items-center h-full">
<a class="m-auto p-6 bg-emerald-400 rounded-md text-slate-50" href="{{ route('applicant.form') }}">
    <h1>Apply Now!</h1>
</a>
</div>

@endsection