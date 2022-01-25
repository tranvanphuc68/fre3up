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
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossOrigin="anonymous"/>
    <link href="{{ asset("css/sidebar.css") }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("css/timeline1.css") }}">

    <style>
        /* width */
        ::-webkit-scrollbar {
        width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
        background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
        background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
        background: #555;
        }
        .gradient{
          background-color: rgb(255, 255, 255);
          border-right: 1px solid rgba(69, 77, 69, 0.067);
          font-size: 1.6rem;
          cursor: pointer;
          outline: none;
          padding: 13px 0;
          transition: background-color 0.5s linear;
        }

        .gradient:hover{
            background-color: rgb(185, 174, 196);
        }
        .content{
            margin: 0 2rem;
            padding:0 20px;
            text-align: center;
            text-transform: uppercase;
            text-decoration: none;
        }

        a{
            color:black;
            transition: color 0.5s linear;
        }
        a:hover  {
            color: white;
            text-decoration: none;
        }
        .w-5{
            display: inline;
            width: 20px;
            height: 10px;
        }
        p.text-sm.text-gray-700.leading-5, div.flex.justify-between.flex-1{
            display: none;
        }

    </style>
</head>
<body>
<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="position: fixed; width: 100%; z-index: 100;">
            <div class="container">
                @if (Auth::check())
                    <button class="navbar-toggler sidebar-toggler" type="button">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                @endif
                <a class="navbar-brand" href="{{ url('/') }}">
                    Fre3Up
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    <a href="{{ url("/home") }}">
                        <div class="gradient">
                            <div class="content">Home</div>
                        </div>
                    </a>
                    <a href="{{ url("/") }}">
                        <div class="gradient">
                            <div class="content">Quiz</div>
                        </div>
                    </a>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span>
                                    @if (Auth::check() && Auth::user()->provider != null )
                                        <img src="{{ Auth::user()->avatar }}" alt="" style="height: 40px; width: 40px; border-radius: 50%; display:inline-block;">
                                    @else
                                        <img src="{{ asset("/uploads/avatars/".Auth::user()->avatar) }}" style="height: 40px; width: 40px; border-radius: 50%; display:inline-block;">
                                    @endif
                                    </span>
                                    <span> {{ Auth::user()->name }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url("/auth/user/profile") }}">
                                        {{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
