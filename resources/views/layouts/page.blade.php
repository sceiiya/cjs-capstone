<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">
    <title>{{config('app.name', 'Laravel').' | '.$title}}</title>
    <script src="{{asset('src/js/jquery-3.7.0.min.js')}}"></script>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-emerald-100 hr-solutions-bg nunito-font">
    <div id="app" class="flex flex-col h-screen">
        {{-- top navbar --}}
        <nav class="max-sm:hidden bg-emerald-400 shadow-sm py-3 px-7 fixed top-0 w-full" style="max-height: 60px">
            <div class="flex justify-between mx-11 max-md:mx-14 max-md:flex-col transition-all duration-200">
                <div class="flex justify-between">
                    <a class="text-2xl no-underline font-bold text-slate-50 bg-unset" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button id="burgerDown" class="navbar-toggler px-2 py-1 ring-1 ring-slate-50 rounded-md hidden max-md:block" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"><svg class="text-slate-50 fill-slate-50 w-5 h-5"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg></span>
                    </button>
                </div>

                <div class=" navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link no-underline font-bold text-slate-50 nunito-font bg-unset" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link no-underline font-bold text-slate-50 nunito-font bg-unset" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="">
                                <a id="navbarDropdown" class="max-md:hidden flex text-slate-100 no-underline font-bold nunito-font items-center" href="#" type="button">
                                {{ !empty(Auth::user()->username) ? Auth::user()->username : Auth::user()->first_name }}
                                    <img src="{{ !empty(Auth::user()->profile_pic) ? Auth::user()->profile_pic : asset('src/images/logos/defo_profile.png') }}" style="max-height: 38px;" class="rounded-full ms-2">
                                </a>
                            </li>
                            <li id="profDropdown" class="hidden">
                                <div class="flex flex-col font-medium bg-emerald-100 mt-3 py-1 absolute rounded-md left-auto right-3 ring-1 ring-emerald-600 dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item mx-8 text-emerald-600 hover:text-emerald-950" href="{{ route('logout') }}">
                                        {{ __('Profile') }}
                                    </a>

                                    <a class="dropdown-item mx-8 text-emerald-600 hover:text-red-600" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="flex flex-1 max-sm:flex-col-reverse">
            <div class="w-1/6 max-sm:top-auto max-sm:bottom-0 max-sm:w-full max-md:w-14 bg-emerald-400 text-slate-100 overflow-hidden transition-all duration-500 ease-in-out">
                {{-- left side nav bar --}}
                <nav class="text-slate-100 fixed top-12 max-sm:top-auto max-sm:bottom-0 max-sm:w-full w-1/6 max-md:w-14 max-sm:z-30 max-sm:bg-emerald-400">
                    <ul class="mt-6 max-sm:mt-auto max-sm:px-7 max-sm:flex max-sm:justify-between">
                        <li class="mb-2 max-sm:mb-0">
                            <a href="
                            @applicant
                            {{ route('applicant.index') }}
                            @endapplicant
                            @employee
                            {{ route('employee.index') }}
                            @endemployee
                            @admin
                            {{ route('admin.index') }}
                            @endadmin
                            " class="flex items-center py-2 max-sm:py-3 ps-3 max-sm:ps-0 text-slate-100 hover:text-emerald-600 focus:fill-emerald-600 transition-all ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 max-sm:w-6 max-sm:h-6 fill-slate-100 hover:fill-emerald-600 focus:fill-emerald-600 transition-all ease-in-out" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm50.7-186.9L162.4 380.6c-19.4 7.5-38.5-11.6-31-31l55.5-144.3c3.3-8.5 9.9-15.1 18.4-18.4l144.3-55.5c19.4-7.5 38.5 11.6 31 31L325.1 306.7c-3.2 8.5-9.9 15.1-18.4 18.4zM288 256a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/></svg>
                                <span class="ml-3 max-md:translate-x-44 max-md:hidden truncate">Dashboard</span>
                            </a>
                        </li>
                        @applicant
                        <li class="mb-2 max-sm:mb-0">
                            <a href="{{ route('status.applicant.form') }}" class="flex items-center py-2 max-sm:py-3 ps-3 max-sm:ps-0 text-slate-100 hover:text-emerald-600 transition-all ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 max-sm:w-6 max-sm:h-6 fill-slate-100 hover:fill-emerald-600 focus:fill-emerald-600 transition-all ease-in-out" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M448 160H320V128H448v32zM48 64C21.5 64 0 85.5 0 112v64c0 26.5 21.5 48 48 48H464c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48H48zM448 352v32H192V352H448zM48 288c-26.5 0-48 21.5-48 48v64c0 26.5 21.5 48 48 48H464c26.5 0 48-21.5 48-48V336c0-26.5-21.5-48-48-48H48z"/></svg>
                                <span class="ml-3 max-md:translate-x-44 max-md:hidden truncate">Status</span>
                            </a>
                        </li>
                        @endapplicant
                        @employee
                        <li class="mb-2 max-sm:mb-0">
                            <a href="#" class="flex items-center py-2 max-sm:py-3 ps-3 max-sm:ps-0 text-slate-100 hover:text-emerald-600 transition-all ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 max-sm:w-6 max-sm:h-6 fill-slate-100 hover:fill-emerald-600 focus:fill-emerald-600 transition-all ease-in-out" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M211.2 96a64 64 0 1 0 -128 0 64 64 0 1 0 128 0zM32 256c0 17.7 14.3 32 32 32h85.6c10.1-39.4 38.6-71.5 75.8-86.6c-9.7-6-21.2-9.4-33.4-9.4H96c-35.3 0-64 28.7-64 64zm461.6 32H576c17.7 0 32-14.3 32-32c0-35.3-28.7-64-64-64H448c-11.7 0-22.7 3.1-32.1 8.6c38.1 14.8 67.4 47.3 77.7 87.4zM391.2 226.4c-6.9-1.6-14.2-2.4-21.6-2.4h-96c-8.5 0-16.7 1.1-24.5 3.1c-30.8 8.1-55.6 31.1-66.1 60.9c-3.5 10-5.5 20.8-5.5 32c0 17.7 14.3 32 32 32h224c17.7 0 32-14.3 32-32c0-11.2-1.9-22-5.5-32c-10.8-30.7-36.8-54.2-68.9-61.6zM563.2 96a64 64 0 1 0 -128 0 64 64 0 1 0 128 0zM321.6 192a80 80 0 1 0 0-160 80 80 0 1 0 0 160zM32 416c-17.7 0-32 14.3-32 32s14.3 32 32 32H608c17.7 0 32-14.3 32-32s-14.3-32-32-32H32z"/></svg>
                                <span class="ml-3 max-md:translate-x-44 max-md:hidden truncate">Employees</span>
                            </a>
                        </li>
                        <li class="mb-2 max-sm:mb-0">
                            <a href="#" class="flex items-center py-2 max-sm:py-3 ps-3 max-sm:ps-0 text-slate-100 hover:text-emerald-600 transition-all ease-in-out overflow-hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 max-sm:w-6 max-sm:h-6 fill-slate-100 hover:fill-emerald-600 focus:fill-emerald-600 transition-all ease-in-out" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 0a128 128 0 1 1 0 256A128 128 0 1 1 224 0zM178.3 304h91.4c20.6 0 40.4 3.5 58.8 9.9C323 331 320 349.1 320 368c0 59.5 29.5 112.1 74.8 144H29.7C13.3 512 0 498.7 0 482.3C0 383.8 79.8 304 178.3 304zM352 368a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-80c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H512V304c0-8.8-7.2-16-16-16z"/></svg>
                                <span class="ml-3 max-md:translate-x-44 max-md:hidden truncate">Attendace</span>
                            </a>
                        </li>
                        <li class="mb-2 max-sm:mb-0">
                            <a href="#" class="flex items-center py-2 max-sm:py-3 ps-3 max-sm:ps-0 text-slate-100 hover:text-emerald-600 transition-all ease-in-out overflow-hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 max-sm:w-6 max-sm:h-6 fill-slate-100 hover:fill-emerald-600 focus:fill-emerald-600 transition-all ease-in-out" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M32 0C14.3 0 0 14.3 0 32S14.3 64 32 64V75c0 42.4 16.9 83.1 46.9 113.1L146.7 256 78.9 323.9C48.9 353.9 32 394.6 32 437v11c-17.7 0-32 14.3-32 32s14.3 32 32 32H64 320h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V437c0-42.4-16.9-83.1-46.9-113.1L237.3 256l67.9-67.9c30-30 46.9-70.7 46.9-113.1V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H320 64 32zM288 437v11H96V437c0-25.5 10.1-49.9 28.1-67.9L192 301.3l67.9 67.9c18 18 28.1 42.4 28.1 67.9z"/></svg>
                                <span class="ml-3 max-md:translate-x-44 max-md:hidden truncate">Overtime</span>
                            </a>
                        </li>
                        <li class="mb-2 max-sm:mb-0">
                            <a href="#" class="flex items-center py-2 max-sm:py-3 ps-3 max-sm:ps-0 text-slate-100 hover:text-emerald-600 transition-all ease-in-out overflow-hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 max-sm:w-6 max-sm:h-6 fill-slate-100 hover:fill-emerald-600 focus:fill-emerald-600 transition-all ease-in-out" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M160 64c0-35.3 28.7-64 64-64H576c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H336.8c-11.8-25.5-29.9-47.5-52.4-64H384V320c0-17.7 14.3-32 32-32h64c17.7 0 32 14.3 32 32v32h64V64L224 64v49.1C205.2 102.2 183.3 96 160 96V64zm0 64a96 96 0 1 1 0 192 96 96 0 1 1 0-192zM133.3 352h53.3C260.3 352 320 411.7 320 485.3c0 14.7-11.9 26.7-26.7 26.7H26.7C11.9 512 0 500.1 0 485.3C0 411.7 59.7 352 133.3 352z"/></svg>
                                <span class="ml-3 max-md:translate-x-44 max-md:hidden truncate">Performance</span>
                            </a>
                        </li>
                        <li class="mb-2 max-sm:mb-0">
                            <a href="#" class="flex items-center py-2 max-sm:py-3 ps-3 max-sm:ps-0 text-slate-100 hover:text-emerald-600 transition-all ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 max-sm:w-6 max-sm:h-6 fill-slate-100 hover:fill-emerald-600 focus:fill-emerald-600 transition-all ease-in-out" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zM272 192H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H272c-8.8 0-16-7.2-16-16s7.2-16 16-16zM256 304c0-8.8 7.2-16 16-16H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H272c-8.8 0-16-7.2-16-16zM164 152v13.9c7.5 1.2 14.6 2.9 21.1 4.7c10.7 2.8 17 13.8 14.2 24.5s-13.8 17-24.5 14.2c-11-2.9-21.6-5-31.2-5.2c-7.9-.1-16 1.8-21.5 5c-4.8 2.8-6.2 5.6-6.2 9.3c0 1.8 .1 3.5 5.3 6.7c6.3 3.8 15.5 6.7 28.3 10.5l.7 .2c11.2 3.4 25.6 7.7 37.1 15c12.9 8.1 24.3 21.3 24.6 41.6c.3 20.9-10.5 36.1-24.8 45c-7.2 4.5-15.2 7.3-23.2 9V360c0 11-9 20-20 20s-20-9-20-20V345.4c-10.3-2.2-20-5.5-28.2-8.4l0 0 0 0c-2.1-.7-4.1-1.4-6.1-2.1c-10.5-3.5-16.1-14.8-12.6-25.3s14.8-16.1 25.3-12.6c2.5 .8 4.9 1.7 7.2 2.4c13.6 4.6 24 8.1 35.1 8.5c8.6 .3 16.5-1.6 21.4-4.7c4.1-2.5 6-5.5 5.9-10.5c0-2.9-.8-5-5.9-8.2c-6.3-4-15.4-6.9-28-10.7l-1.7-.5c-10.9-3.3-24.6-7.4-35.6-14c-12.7-7.7-24.6-20.5-24.7-40.7c-.1-21.1 11.8-35.7 25.8-43.9c6.9-4.1 14.5-6.8 22.2-8.5V152c0-11 9-20 20-20s20 9 20 20z"/></svg>
                                <span class="ml-3 max-md:translate-x-44 max-md:hidden truncate">Payroll</span>
                            </a>
                        </li>
                        @endemployee
                        <li class="mb-2 max-sm:mb-0">
                            <a href="#" class="flex items-center py-2 max-sm:py-3 ps-3 max-sm:ps-0 text-slate-100 hover:text-emerald-600 transition-all ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 max-sm:w-6 max-sm:h-6 fill-slate-100 hover:fill-emerald-600 focus:fill-emerald-600 transition-all ease-in-out" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM169.8 165.3c7.9-22.3 29.1-37.3 52.8-37.3h58.3c34.9 0 63.1 28.3 63.1 63.1c0 22.6-12.1 43.5-31.7 54.8L280 264.4c-.2 13-10.9 23.6-24 23.6c-13.3 0-24-10.7-24-24V250.5c0-8.6 4.6-16.5 12.1-20.8l44.3-25.4c4.7-2.7 7.6-7.7 7.6-13.1c0-8.4-6.8-15.1-15.1-15.1H222.6c-3.4 0-6.4 2.1-7.5 5.3l-.4 1.2c-4.4 12.5-18.2 19-30.6 14.6s-19-18.2-14.6-30.6l.4-1.2zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg>
                                <span class="ml-3 max-md:translate-x-44 max-md:hidden truncate">About Us</span>
                            </a>
                        </li>
                        {{-- @applicant
                        <li class="mb-2 max-sm:mb-0">
                            <a href="#" class="flex items-center py-2 max-sm:py-3 ps-3 max-sm:ps-0 text-slate-100 hover:text-emerald-600 transition-all ease-in-out">
                                <svg class="w-5 h-5 max-sm:w-6 max-sm:h-6 fill-slate-100 hover:fill-emerald-600 focus:fill-emerald-600 transition-all ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                <span class="ml-3 max-md:translate-x-44 max-md:hidden truncate">APPLICANT</span>
                            </a>
                        </li>
                        @endapplicant

                        @employee
                        <li class="mb-2 max-sm:mb-0">
                            <a href="#" class="flex items-center py-2 max-sm:py-3 ps-3 max-sm:ps-0 text-slate-100 hover:text-emerald-600 transition-all ease-in-out">
                                <svg class="w-5 h-5 max-sm:w-6 max-sm:h-6 fill-slate-100 hover:fill-emerald-600 focus:fill-emerald-600 transition-all ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                <span class="ml-3 max-md:translate-x-44 max-md:hidden truncate">EMPLOYEE</span>
                            </a>
                        </li>
                        @endemployee

                        @admin
                        <li class="mb-2 max-sm:mb-0">
                            <a href="#" class="flex items-center py-2 max-sm:py-3 ps-3 max-sm:ps-0 text-slate-100 hover:text-emerald-600 transition-all ease-in-out">
                                <svg class="w-5 h-5 max-sm:w-6 max-sm:h-6 fill-slate-100 hover:fill-emerald-600 focus:fill-emerald-600 transition-all ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                <span class="ml-3 max-md:translate-x-44 max-md:hidden truncate">ADMIN</span>
                            </a>
                        </li>
                        @endadmin --}}

                    </ul>
                </nav>
            </div>
            @vite('resources/js/mainpage.js')
            <main class="flex-1 overflow-y-auto items-center px-1 mt-20 max-sm:mt-0">
                @if(session()->has('success'))
                <div class="ring-1 ring-emerald-600 p-3 absolute top-6 w-4/6 bg-emerald-100">
                    {{session('success')}}
                </div>
                @endif
                @if($errors->any())
                <ul class="ring-1 ring-emerald-600 p-3 absolute top-6 w-4/6 bg-emerald-100">
                    @foreach($errors->all() as $error)
                        <li class="">
                        {{$error}}
                        </li>
                    @endforeach
                </ul>
                @endif
                <!-- Whatever content will be here -->
                @yield('content')
            </main>
        </div>
</div>
</body>
</html>