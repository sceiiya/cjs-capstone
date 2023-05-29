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

        <!-- Success message -->
            <div id="successMessage" style="display: none;"></div>

        <!-- Error message -->
            <div id="errorMessage" style="display: none;"></div>

            <table class="table-auto">
                <tr>
                    <th>'first_name'</th>
                    <th>'last_name'</th>
                    <th>'middle_name'</th>
                    <th>'username'</th>
                    <th>'email'</th>
                    <th>'password'</th>
                    <th>'applied_at'</th>
                    <th>'joined_at'</th>
                    <th>'archived_at'</th>
                    <th>'status'</th>
                    <th>'otp'</th>
                    <th>'profile_pic'</th>
                    <th>'job_position'</th>
                    <th>'job_type'</th>
                    <th>'country'</th>
                    <th>'city'</th>
                    <th>'province_state'</th>
                    <th>'street'</th>
                    <th>'postal_id'</th>
                    <th>'google_id'</th>
                </tr>
                <tr>
                    <td></td>
                </tr>
            </table>

        </section>
        <!-- ---------------============== playground ==============--------------- -->

    </body>
</html>
