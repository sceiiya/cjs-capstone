<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">
    <title>{{$title}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-emerald-100 hr-solutions-bg nunito-font">
    <div id="app" class="flex flex-col h-screen">
        <nav class="bg-emerald-400 shadow-sm py-3 px-7" style="max-height: 60px">
            <div class="flex justify-between mx-11">
                <a class="text-2xl no-underline font-bold text-slate-50 bg-unset" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#545454}</style><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg></span>
                </button>

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
                                <a id="navbarDropdown" class="flex text-slate-100 no-underline font-bold nunito-font items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ !empty(Auth::user()->username) ? Auth::user()->username : Auth::user()->first_name }}
                                    <img src="{{ !empty(Auth::user()->profile_pic) ? Auth::user()->profile_pic : asset('src/images/logos/defo_profile.png') }}" style="max-height: 38px;" class="rounded-full ms-2">
                                </a>

                                <div class="collapse dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
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

        <div class="flex flex-1">
            <div class="w-1/6 max-md:w-14 bg-emerald-400 text-slate-100 overflow-hidden transition-all duration-500 ease-in-out">
                <nav class="text-slate-100 ">
                    <ul class="mt-6">
                        <li class="mb-2">
                            <a href="#" class="flex items-center py-2 ps-3 text-slate-100 hover:text-gray-500">
                                <svg style="width: 26px; height: 26px" class="" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                                </svg>
                                <span class="ml-3 max-md:translate-x-44 max-md:hidden transition-all duration-500 ease-in-out">Dashboard</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="flex items-center py-2 ps-3 text-slate-100 hover:text-gray-500">
                                <svg style="width: 26px; height: 26px" class="" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                                <span class="ml-3 max-md:translate-x-44 max-md:hidden transition-all duration-500 ease-in-out">Employees</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="flex items-center py-2 ps-3 text-slate-100 hover:text-gray-500">
                                <svg style="width: 26px; height: 26px" class="" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 21v-2m0 0H7a2 2 0 01-2-2V9a2 2 0 012-2h10a2 2 0 012 2v8a2 2 0 01-2 2z"/>
                                </svg>
                                <span class="ml-3 max-md:translate-x-44 max-md:hidden transition-all duration-500 ease-in-out">Leave Management</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="flex items-center py-2 ps-3 text-slate-100 hover:text-gray-500">
                                <svg style="width: 26px; height: 26px" class="" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                <span class="ml-3 max-md:translate-x-44 max-md:hidden transition-all duration-500 ease-in-out">Payroll</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="flex items-center py-2 ps-3 text-slate-100 hover:text-gray-500">
                                <svg style="width: 26px; height: 26px" class="" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                <span class="ml-3 max-md:translate-x-44 max-md:hidden transition-all duration-500 ease-in-out">Reports</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="flex items-center py-2 ps-3 text-slate-100 hover:text-gray-500">
                                <svg style="width: 26px; height: 26px" class="" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                <span class="ml-3 max-md:translate-x-44 max-md:hidden transition-all duration-500 ease-in-out">Settings</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="flex-1">
                @yield('content')
                <!-- Main Content Goes Here -->
            </div>
        </div>
</div>
<script>
    const menuToggle = document.getElementById('navbarDropdown');
    const sidebar = document.getElementById('sidebar');

    menuToggle.addEventListener('click', () => {
        sidebar.classList.toggle('hidden');
    });
</script>
</body>
</html>
