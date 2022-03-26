<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fre3Up</title>
    <!-- Scripts -->
    <link rel="shortcut icon" href="{{ asset("/uploads/light.png")}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossOrigin="anonymous"/>
    <link href="{{ asset("css/sidebar.css") }}" rel="stylesheet">

</head>
<body>
<div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="position: fixed; top: 0; width: 100%; z-index: 100; background-color: #e1eff9;">
            <div class="container">
                @if (Auth::check())
                    <span class="blank_logo"></span>
                @endif
                <a class="navbar-brand" style="color: #005bc9; text-align:center;" href="{{ url('/') }}">
                    <span style="color: rgba(211, 17, 17, 0.863)">I</span>QUIZ
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                            <form action="{{ url('/search') }}" method="get">
                                <div class="simple-search">
                                    <button></button>
                                    <input type="text" placeholder="What quiz do you wanna do?" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];} ?>"/>
                                </div>
                            </form>
                    </ul>
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a href="{{ route('login') }}"><div>Sign In</div> </a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li id="sign-up-btn">
                                    <a href="{{ route('register') }}"><div>Sign Up</div></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span>
                                    @if (Auth::check() && Auth::user()->provider != null )
                                        <img src="{{ Auth::user()->avatar }}" alt="" style="height: 40px; width: 40px; border-radius: 50%; display:inline-block;">
                                    @else
                                        <img src="{{ asset("/uploads/avatars/".Auth::user()->avatar) }}" style="height: 30px; width: 30px; border-radius: 50%; display:inline-block;">
                                    @endif
                                    </span>
                                    <div id="user-name">{{ Auth::user()->name }}</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <div>
                                        <a class="dropdown-item" href="{{ url("/auth/user/profile") }}">
                                            <div>View profile</div>
                                        </a>
                                    </div>
                                    <div>
                                        <a class="dropdown-item" href="{{ url("/quiz") }}">
                                            <div>My quiz</div>
                                        </a>
                                    </div>
                                    <div>
                                        <a class="dropdown-item" href="{{ url("/process") }}">
                                            <div>My work list</div>
                                        </a>
                                    </div>
                                    <div>
                                        <a class="dropdown-item" href="{{ url("/users") }}">
                                            <div>Users</div>
                                        </a>
                                    </div>
                            @if (Auth::user()->role == 'admin')
                                    <div>
                                         <a class="dropdown-item" href="{{ url('/censorship') }}">
                                              <div>Censorship</div>
                                         </a>
                                    </div>
                            @endif
                                    <div>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <div>{{ __('Logout') }}</div>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
