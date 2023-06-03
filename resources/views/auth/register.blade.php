@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="ps-3 py-2 font-bold text-xl text-slate-50 bg-emerald-400">{{ __('Register') }}</div>

                <div class="card-body bg-emerald-300 bg-opacity-10">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        
                        <div class="mt-4 mb-4 flex items-center justify-center max-h-6">
                            <div class="">
                                <button type="submit" class="rounded-md p-2 bg-cyan-600 hover:bg-opacity-80 text-slate-100">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                        <div class="mb-3 inline-flex items-center justify-center w-full">
                            <hr class="w-64 h-px my-2 bg-gray-200 border-2 dark:bg-gray-700">
                            <span class="absolute px-3 font-medium text-gray-900 -translate-x-1/2 bg-gray-200 rounded-sm left-1/2 dark:text-white dark:bg-gray-900">or</span>
                        </div>
                          
                          <!-- Sign up with Google -->
                          <a href="{{ route('google-auth') }}" class="mt-4 mb-6 flex items-center justify-center max-h-6 no-underline">
                            <div class="rounded-md p-2 bg-slate-50">
                                <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google Sign-In" class="h-6 w-6 mr-2">
                                <span class="text-gray-600 font-extrabold">Sign up with Google</span>
                            </div>
                          </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
