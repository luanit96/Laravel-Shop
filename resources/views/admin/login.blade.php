@extends('layouts.login')

@section('content')
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">{{ __('Đăng nhập') }}</div>
        <div class="card-body">
            <form method="POST" action="{{ route('adminlogin') }}">
            @csrf
             <div class="form-group">
                <div class="form-label-group">
                   <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                   @if ($errors->has('email'))
                   <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
                <label for="inputEmail">{{ __('E-Mail') }}</label>
            </div>
        </div>
        <div class="form-group">
            <div class="form-label-group">
             <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
             @if ($errors->has('password'))
             <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
            <label for="inputPassword">{{ __('Mật khẩu') }}</label>
        </div>
    </div>
    <div class="form-group">
        <div class="checkbox">
            <label>
                @if(session('message'))
                    <div class="text-danger">{{session('message')}}</div>
                @endif
            </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">
        {{ __('Đăng nhập') }}
    </button>
</form>
<div class="text-center">
    <a class="d-block small mt-3" href="{{ route('register') }}">Đăng kí tài khoản</a>
</div>
</div>
</div>
</div>
@endsection