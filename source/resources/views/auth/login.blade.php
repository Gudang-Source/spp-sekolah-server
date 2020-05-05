@extends('layouts.login')

@section('title')
SPP | Login
@endsection

@section('content')
<form method="POST" action="{{ route('login') }}" id="loginForm">
    @csrf

    <div class="form-group ">
        <label for="email" class="control-label">{{ __('E-Mail') }}</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" title="Please enter you email" required autocomplete="email" autofocus>

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="password" class="control-label">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password" required autocomplete="current-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <button class="btn btn-success btn-block loginbtn" type="submit">
        {{ __('Login') }}
    </button>
</form>
@endsection
