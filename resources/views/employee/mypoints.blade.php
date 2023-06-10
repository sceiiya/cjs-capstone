@extends('layouts.page')

@section('content')

<section class="flex flex-col justify-center p-3 ml-5">
<!-- Employee Table -->
<div id="employeeTable"></div>

<!-- Create Employee Form -->
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li class="">
                {{$error}}
                </li>
            @endforeach
        </ul>
    @endif
    @if(session()->has('status'))
    <ul>
            <li class="">
            {{session('status')}}
            </li>
    </ul>
@endif
<div class="flex flex-row w-full justify-between mb-4">
<form class="flex flex-col w-full" id="PontsForm" method="POST" action="{{ route('increment-points', [ 'employeeID' => encrypt(auth()->user()->id), 'in_add' => encrypt(255), 'csrf' => csrf_token()]) }}">
    @csrf
    @method('put')

    <button class="w-3/6 rounded-md p-3 m-auto bg-emerald-800 text-slate-50" type='submit'>Done Task(claim points)</button>
</form>
<form class="flex flex-col w-full" id="PontsForm" method="POST" action="{{ route('convert-points', [ 'employeeID' => encrypt(auth()->user()->id)]) }}">
    @csrf
    @method('put')

    <button class="w-3/6 rounded-md p-3 m-auto bg-emerald-800 text-slate-50" type='submit'>Convert Points</button>
</form>
</div>
<!-- Success message -->
    <div id="successMessage" style="display: none;"></div>

<!-- Error message -->
    <div id="errorMessage" style="display: none;"></div>

    {{-- <table class="table-auto">
        <tr class="w-full">
            <th>total_points</th>
            <th>unused_points</th>
            <th>converted_at</th>
            <th>converted_points</th>
        </tr>
        @if(isset($mypoints))
        <tr class="w-full">
            <td>{{$mypoints->total_points}}</td>
            <td>{{$mypoints->unused_points}}</td>
            <td>{{$mypoints->converted_at}}</td>
            <td>{{$mypoints->converted_points}}</td>
        </tr>
        @endif
    </table> --}}

    <section class="flex flex-row w-full justify-between">
        <div class="rounded-md flex flex-col w-3/12 h-32 p-auto bg-emerald-500 bg-opacity-80 items-center text-center font-semibold">
            <div class="items-center text-center font-semibold text-slate-50 mt-10">
                Total Points
            </div>
            <div class="items-center text-center font-semibold text-slate-50">
                {{$mypoints->total_points}}
            </div>
        </div>
        <div class="rounded-md flex flex-col w-3/12 h-32 p-auto bg-emerald-500 bg-opacity-80 items-center text-center font-semibold">
            <div class="items-center text-center font-semibold text-slate-50 mt-10">
                Unused Points
            </div>
            <div class="items-center text-center font-semibold text-slate-50">
                {{$mypoints->unused_points}}
            </div>
        </div>
        <div class="rounded-md flex flex-col w-3/12 h-32 p-auto bg-emerald-500 bg-opacity-80 items-center text-center font-semibold">
            <div class="items-center text-center font-semibold text-slate-50 mt-10">
                Converted Points
            </div>
            <div class="items-center text-center font-semibold text-slate-50">
                {{$mypoints->converted_points}}
            </div>
        </div>
    </section>
    <div class="w-full bg-emerald-500 p-2 rounded-md mt-6 bg-opacity-80">
        <div class="items-center text-center font-semibold text-slate-50">
            To be added next payroll
        </div>
        <div class="items-center text-center font-semibold text-slate-50">
            ${{ number_format($mypoints->converted_points/100, 2) }}
        </div>
    </div>

</section>

@endsection