@extends('layouts.login')

@section('content')
<div class="p-5">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
    </div>
    <form class="user" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="Password" name="password" placeholder="{{ __('Password') }}" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-user btn-block">
            {{ __('Login') }}
        </button>
    </form>
    <hr>

    <div class="text-center">
        <a class="small" href="{{ route('register') }}">Create an Account!</a>
    </div>
</div>
@endsection
