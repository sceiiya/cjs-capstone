@extends('layouts.page')

@section('content')

        <div class="w-full">
            <ul class="w-full bg-emerald-300 opacity-70 p-3">
                @foreach($applicantForm as $aForms)
                <li class="flex bg-emerald-700 text-slate-100 list-none m-4 p-3 px-5 items-center justify-between">
                    <div>Submitted: {{$aForms->created_at}}</div>
                    <div class="rounded-md bg-emerald-900 p-3">
                        <form action="{{ route('viewpdf.applicant.form') }}" method="POST" target="__blank">
                            @csrf 
                            <button type="submit">View</button>
                        </form>
                    </div>
                    <div class="rounded-md bg-emerald-900 p-3">
                        <form action="{{ route('downloadpdf.applicant.form') }}" method="POST">
                            @csrf 
                            <button type="submit">Download</button>
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    
@endsection