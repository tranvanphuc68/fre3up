@extends('layouts.quiz.app')
@section('content')
    </head>
        <div class="relative items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif    
        </div>
        <div class="container">
            <div class="row">
                          <div class="simple-search">
                            <input type="text" placeholder="Type here and hit Enter"/>
                            <button><i class="fa fa-search"></i></button>
                          </div>
            </div>

            <div class="row">
                @foreach ($data as $item)
                    <div class="col-md-3">
                    <a href="{{ url("/do_quiz/{$item->id}") }}">
                        <div>
                        <div class="item" style="background-image: linear-gradient(to right,#1ABCF4,#5DEFB8);">
                            <div class="e-flex-content">{{ $item->quiz_name }}</div>
                            <div class="">{{ $item->number_questions }} questions</div>
                        </div>
                        </div>
                    </a>
                </div>
                @endforeach  
        </div>
@endsection