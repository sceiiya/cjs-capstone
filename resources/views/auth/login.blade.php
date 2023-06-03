@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="ps-3 py-2 font-bold text-xl text-slate-50 bg-emerald-400">{{ __('Login') }}</div>

                <div class="card-body bg-emerald-300 bg-opacity-10">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                          
                        <div class="mt-4 mb-4 flex items-center justify-center max-h-6">
                            <div class="">
                                <button type="submit" class="rounded-md p-2 bg-cyan-600 hover:bg-opacity-80 text-slate-100">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 inline-flex items-center justify-center w-full">
                            <hr class="w-64 h-px my-2 bg-gray-200 border-2 dark:bg-gray-700">
                            <span style="transform: translateX(-50%); left: 50%;" class="absolute px-3 font-medium text-gray-900 -translate-x-1/2 bg-gray-200 rounded-sm left-1/2 dark:text-white dark:bg-gray-900">or</span>
                        </div>
                          
                          <!-- Login with Google -->
                          <a href="{{ route('google-auth') }}" class="mt-3 mb-6 flex items-center justify-center max-h-6 no-underline">
                            <div class="rounded-md p-2 bg-slate-50">
                                <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google Sign-In" class="h-6 w-6 mr-2">
                                <span class="text-gray-600 font-extrabold">Log in with Google</span>
                            </div>
                          </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
