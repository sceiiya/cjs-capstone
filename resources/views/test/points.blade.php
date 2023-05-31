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
        <!-- <form class="flex flex-col" id="PontsForm" method="POST" action="{{ route('increment-points', [ 'employeeID' => encrypt(1), 'in_add' => encrypt(500), 'csrf' => csrf_token()]) }}"> -->
        <form class="flex flex-col" id="PontsForm" method="POST" action="{{ route('convert-points', [ 'employeeID' => encrypt(2)]) }}">
            @csrf
            @method('put')

            <input type='submit' value='increase'>
        </form>
        <!-- Success message -->
            <div id="successMessage" style="display: none;"></div>

        <!-- Error message -->
            <div id="errorMessage" style="display: none;"></div>

            <table class="table-auto">
                <tr>
                    <th>'id'</th>
                    <th>'employee_id'</th>
                    <th>'total_points'</th>
                    <th>'unused_points'</th>
                    <th>'converted_at'</th>
                </tr>
                <tr>
                    <td></td>
                </tr>
            </table>

        </section>
        <!-- ---------------============== playground ==============--------------- -->

    </body>
</html>
