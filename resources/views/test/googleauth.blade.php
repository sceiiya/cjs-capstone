<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Testing Google Auth</title>
        @vite('resources/css/app.css')
    </head>
    <body class="">
        <h1 class='pt-8 bg-red-800 text-center w-full text-white text-lg font-extrabold'>
            Test Google Auth!
        </h1>
        <!-- ---------------============== playground ==============--------------- -->
        <section class="flex flex-col justify-center p-3">

        <!-- Login Modal -->
        <h1>
          @if(!empty($logmsg))
            {{$logmsg}}
          @endif
        </h1>
        <div class="modal w-4/6 rounded-lg m-1 border border-x-slate-500 p-3">
          <div class="modal-content flex-col items-center justify-center">
            <!-- Login Form -->
            <form class="w-full max-w-sm">
              <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email:</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Enter your email">
              </div>
              <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password:</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="Enter your password">
              </div>
              <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">Log In</button>
                <a href="#" class="text-blue-500 font-bold hover:underline">Forgot Password?</a>
              </div>
            </form>

            <div class="mt-6 flex items-center justify-center">
              <span class="border-t border-gray-400 w-16"></span>
              <span class="px-2 text-gray-600">or</span>
              <span class="border-t border-gray-400 w-16"></span>
            </div>

            <!-- Login with Google -->
            <a href="{{ route('google-auth') }}" class="mt-6 flex items-center justify-center">
              <img src="google-logo.png" alt="Google Logo" class="h-6 w-6 mr-2">
              <span class="text-gray-600 font-bold">Log in with Google</span>
            </a>
          </div>
        </div>

        <!-- Signup Modal -->
        <div class="modal w-4/6 rounded-lg m-1 border border-x-slate-500 p-3">
          <div class="modal-content flex-col items-center justify-center">
            <!-- Signup Form -->
            <form class="w-full max-w-sm">
              <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name:</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Enter your name">
              </div>
              <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email:</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Enter your email">
              </div>
              <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password:</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="Enter your password">
              </div>
              <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">Sign Up</button>
              </div>
            </form>

            <div class="mt-6 flex items-center justify-center">
              <span class="border-t border-gray-400 w-16"></span>
              <span class="px-2 text-gray-600">or</span>
              <span class="border-t border-gray-400 w-16"></span>
            </div>

            <!-- Sign up with Google -->
            <a href="{{ route('google-auth') }}" class="mt-6 flex items-center justify-center">
              <img src="google-logo.png" alt="Google Logo" class="h-6 w-6 mr-2">
              <span class="text-gray-600 font-bold">Sign up with Google</span>
            </a>
          </div>
        </div>

        <a href="{{ route('logout') }}">Logout</a>



        </section>
        <!-- ---------------============== playground ==============--------------- -->

    </body>
</html>
<!-- <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
<script src="{{ asset('js/auth.js') }}"></script> -->