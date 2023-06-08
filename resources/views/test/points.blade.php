<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{!! csrf_token() !!}">

        <title>Testing Points Model</title>
        @vite('resources/css/app.css')
    </head>
    <body class="">
        <h1 class='pt-8 bg-red-800 text-center w-full text-white text-lg font-extrabold'>
            Test Points Model CRUD SHOW!
        </h1>
        <!-- ---------------============== playground ==============--------------- -->
        <section class="flex flex-col justify-center p-3 ml-5">
            @foreach( $usercreds as $usercreds)
            {{$usercreds['Memail']}}
            {{$usercreds['Memail_verified_at']}}
            @endforeach
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
        <form class="flex flex-col" id="PontsForm" method="POST" action="{{ route('increment-points', [ 'employeeID' => encrypt($usercreds['Mid']), 'in_add' => encrypt(255), 'csrf' => csrf_token()]) }}">
            @csrf
            @method('put')

            <input type='submit' value='increase'>
        </form>
        <form class="flex flex-col" id="PontsForm" method="POST" action="{{ route('convert-points', [ 'employeeID' => encrypt($usercreds['Mid'])]) }}">
            @csrf
            @method('put')

            <input type='submit' value='convert'>
        </form>
        <!-- Success message -->
            <div id="successMessage" style="display: none;"></div>

        <!-- Error message -->
            <div id="errorMessage" style="display: none;"></div>

            <table class="table-auto">
                <tr>
                    <th>id</th>
                    <th>employee_id</th>
                    <th>total_points</th>
                    <th>unused_points</th>
                    <th>converted_at</th>
                    <th>converted_points</th>
                </tr>
                @if(isset($mypoints))
                <tr>
                    <td>{{$mypoints->id}}</td>
                    <td>{{$mypoints->employee_id}}</td>
                    <td>{{$mypoints->total_points}}</td>
                    <td>{{$mypoints->unused_points}}</td>
                    <td>{{$mypoints->converted_at}}</td>
                    <td>{{$mypoints->converted_points}}</td>
                </tr>
                @endif
            </table>

        </section>
        <!-- ---------------============== playground ==============--------------- -->

    </body>
</html>
