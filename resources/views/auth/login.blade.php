@extends('layouts.app')

@section('content')
<style>
    .logo {
        width: 95%;
        padding: 20px;
    }

    .sign-header span {
        text-align: center;
        font-size: 3rem;
        font-weight: 500;
    }
    .remember-me a {
        float: right;
        font-size: 80%;
    }
    .social-media p {
        width: 100%;
        text-align: center;
        border-bottom: 1px solid #000;
        line-height: 0.1em;
        margin: 10px 0 20px;
    }

    .social-media p span {
        background: #fff;
        padding: 0 10px;
    }

    .social-media img {
        width: 50px;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
</style>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <hr>
                            <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-primary"><i class="fa fa-facebook"></i>Sign in with Facebook</a>
                            </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="block">
<div class="container">
    <div class="row align-items-center">
        <div class="col-sm-8">
            <img class="logo" src="{{ asset("uploads/Anh.png") }}" alt="">
        </div>
        <div class="col-sm-4">
            <div class="sign-header">
                <span>Sign In</span>
            </div>

            <form class="form-content" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="email mt-3">
                    <label for="email">Email Address:</label>
                    <input class="form-control mt-2 fs-5 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" type="email" id="email" required autocomplete="email" autofocus placeholder="Enter your Email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            
                <div class="password mt-3">
                    <label for="password">Password:</label>
                    <input class="form-control mt-2 fs-5 @error('password') is-invalid @enderror" type="password" id="password" name="password" required autocomplete="current-password" placeholder="Enter your Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="remember-me mt-3">
                    <input type="checkbox" id="remember-me" name="remember-me" value="remember-me">
                    <label for="remember-me">Remember Me</label>
                    <a href="#">Forgot Password?</a>
                </div class="remember-me">
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary form-control">Sign In</button>
                </div>
            </form>
            <p class="mt-3">Don't have an account? 
                <a href="{{ url('/register') }}" style="text-decoration: underline; color: blue;" data-bs-toggle="modal" data-bs-target="#sign-up-modal">Sign Up</a>
            </p>
            <div class="social-media mt-4">
                <p><span>Or with Social Profile</span></p>
                <a href="{{ url('/auth/redirect/facebook') }}"><img src="https://brandlogos.net/wp-content/uploads/2021/04/facebook-icon-512x512.png"></a>
            </div>  
        </div>
    </div>
</div>
</div>
@endsection
