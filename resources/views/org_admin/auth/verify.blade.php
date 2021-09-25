@extends('admin.layouts.auth')
@section('content')
<div class="card overflow-hidden account-card mx-3">
    <div class="bg-primary p-4 text-white text-center position-relative">
        <h4 class="font-20 mb-4">{{ __('Verify Your Email Address') }}</h4><a href="index.html"
            class="logo logo-admin"><img src="{{asset('admin/images/logo-sm.png')}}" height="24" alt="logo"></a>
    </div>
    <div class="account-card-content">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a
                        href="{{ route($resendRoute) }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>

@endsection