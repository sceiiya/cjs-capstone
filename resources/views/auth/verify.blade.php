@extends('layouts.app')

@section('content')
<div class="container hr-solutions-bg">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="ps-3 py-2 font-bold text-xl text-slate-50 bg-emerald-400">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body bg-emerald-300 bg-opacity-10">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
