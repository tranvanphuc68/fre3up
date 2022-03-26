@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
<div class="block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('All Quiz in Queue') }}</div>
    
                      <div class="card-body">
                        
                        @error('offset0')
                          <div class="form-text text-danger" style="font-size: 17px; font-weight: bold;">{{ $message }}</div>
                        @enderror
                      <div class="row">
                        {{-- @foreach ($data as $quiz)

                          <div class="col-lg-3">
                            <a href="{{ url("/detail_quiz/edit/{$quiz->id}") }}">
                              
                                @if ($quiz->check == 1)
                                    <div class="item" style="background-image: linear-gradient(to right,#1ABCF4,#5DEFB8);">
                                      <div class="e-flex-content">{{ $quiz->quiz_name }}</div>
                                      <span>{{ $quiz->number_questions }} questions</span>
                                    </div>
                                @else
                                    <div class="item" style="background-image: linear-gradient(to right,#ff0852,#df9090);">
                                      <div class="e-flex-content">{{ $quiz->quiz_name }}</div>
                                      <span>{{ $quiz->number_questions }} questions</span>
                                    </div>
                                @endif
                              </a>
                              <a href="javascript:void(0)" onclick="if (confirm('Bạn có chắc muốn xóa không?')) document.getElementById('delete-{{ $quiz->id }}').submit()">
                                  <i class="fa-regular fa-circle-xmark mt-2"></i>
                              </a>
                              <form method="POST" id="delete-{{ $quiz->id }}" action="{{ url("/quiz/{$quiz->id}") }}" >
                                  @method('DELETE')
                                  @csrf
                              </form>
                          </div>                     
                            
                        @endforeach --}}

                        @foreach ($data as $quiz)
                        <div class="col-lg-3">
                            <div class="quiz quiz-uncensored">
                                <a href="{{ url("/detail_quiz/edit/{$quiz->id}") }}">
                                    <div class="quiz-info">
                                        <div>{{ $quiz->number_questions }} questions</div>
                                    </div>
                                    <div class="quiz-info">
                                        <h4>{{ $quiz->quiz_name }}</h4>
                                    </div>
                                </a>
                                    <div class="quiz-info">
                                        <div><a href="{{ url("/users/{$quiz->id_user}") }}">{{ $quiz->user_name }}</a></div>
                                    </div>
                            </div>
                            <a href="javascript:void(0)" onclick="if (confirm('Bạn có chắc muốn xóa không?')) document.getElementById('delete-{{ $quiz->id }}').submit()">
                              <i class="fa-regular fa-circle-xmark mt-2"></i>
                            </a>
                            <form method="POST" id="delete-{{ $quiz->id }}" action="{{ url("/quiz/{$quiz->id}") }}" >
                                @method('DELETE')
                                @csrf
                          </form>
                        </div>
                        @endforeach
                        
                      </div>
                      {{ $data->links('') }}
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection