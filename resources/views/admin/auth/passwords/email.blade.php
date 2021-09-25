@extends('admin.layouts.auth')
@section('content')
<div class="card overflow-hidden account-card mx-3">
    <div class="bg-primary p-4 text-white text-center position-relative">
        <h4 class="font-20 mb-4">Reset Password</h4><a href="index.html" class="logo logo-admin"><img
                src="{{asset('admin/images/logo-sm.png')}}" height="24" alt="logo"></a>
    </div>
    <div class="account-card-content">
        <div class="alert alert-success m-t-30" role="alert">Enter your Email and instructions will be sent to
            you!</div>
        <form class="form-horizontal m-t-30" action="{{ route($passwordEmailRoute) }}" method="post">
            @csrf
            <div class="form-group"><label for="useremail">Email</label> <input id="email" type="email"
                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                    value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group row m-t-20 mb-0">
                <div class="col-12 text-right"><button class="btn btn-primary w-md waves-effect waves-light"
                        type="submit">Reset</button></div>
            </div>
        </form>
    </div>
</div>
<div class="m-t-40 text-center">
    <p>Remember It ? <a href="pages-login.html" class="font-500 text-primary">Sign In here</a></p>
    <p>© 2019 Xplex - Dashboard. Crafted with <i class="mdi mdi-heart text-danger"></i> by Xplex</p>
</div>
@endsection