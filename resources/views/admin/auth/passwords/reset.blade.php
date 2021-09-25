@extends('admin.layouts.auth')
@section('content')
<div class="card overflow-hidden account-card mx-3">
    <div class="bg-primary p-4 text-white text-center position-relative">
        <h4 class="font-20 mb-4">Reset Password</h4><a href="index.html" class="logo logo-admin"><img
                src="{{asset('admin/images/logo-sm.png')}}" height="24" alt="logo"></a>
    </div>
    <div class="account-card-content">
        <div class="alert alert-success m-t-30" role="alert">Enter your Email and New PassWord!</div>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-success" role="alert">
            {{ session('error') }}
        </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <form method="POST" action="{{ route($passwordUpdateRoute) }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email">{{ __('E-Mail Address') }}</label>

                <div>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                        name="email" value="{{ $email ?? old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>

                <div>
                    <input id="password" type="password"
                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                        required>

                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>

                <div>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required>
                </div>
            </div>

            <div class="form-group row m-t-20">
                <div class="col-12 text-right"><button class="btn btn-primary w-md waves-effect waves-light"
                        type="submit">Reset Password</button></div>
            </div>
        </form>
    </div>
</div>
<div class="m-t-40 text-center">
    <p>Remember It ? <a href="pages-login.html" class="font-500 text-primary">Sign In here</a></p>
    <p>© 2019 Xplex - Dashboard. Crafted with <i class="mdi mdi-heart text-danger"></i> by Xplex</p>
</div>
@endsection