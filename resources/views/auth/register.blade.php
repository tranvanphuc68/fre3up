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
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <input type="radio" name="gender" value="Nam" @if (old('gender') == "Nam") checked @endif><span class="m-3">Male</span> 
                                <input type="radio" name="gender" value="Nữ" @if (old('gender') == "Nữ") checked @endif><span class="m-3">Female</span>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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
                <span>Sign Up</span>
            </div>

            <form class="form-content" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="full-name mt-3">
                    <label for="full-name">Full Name:</label>
                    <input class="form-control mt-2 fs-5 @error('name') is-invalid @enderror" type="text" id="full-name" name="name"  value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="gender mt-3">
                    <label for="gender">Gender:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male" @if (old('gender') == "Male") checked @endif>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="Female" @if (old('gender') == "Female") checked @endif>
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="email mt-3">
                    <label for="email">Email Address:</label>
                    <input class="form-control mt-2 fs-5 @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your Email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="password mt-3">
                    <label for="password">Password:</label>
                    <input class="form-control mt-2 fs-5 @error('password') is-invalid @enderror" type="password" id="password" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="confirm-password mt-3">
                    <label for="confirm-password">Confirm Password:</label>
                    <input class="form-control mt-2 fs-5" type="password" id="confirm-password" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary form-control" data-bs-toggle="modal" data-bs-target="#sign-in-modal">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
