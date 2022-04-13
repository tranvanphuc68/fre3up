@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
<div class="block">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
                
                      <h1 class="fw-bold mb-5">Censorship</h1>
                      <div>
                        @if (count($data) == 0)
                            <div class="nothing">Nothing is here</div>
                        @endif
                        @error('offset0')
                          <div class="form-text text-danger" style="font-size: 17px; font-weight: bold;">{{ $message }}</div>
                        @enderror
                      <div class="row mt-3">

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
                            <form method="GET" id="delete-{{ $quiz->id }}" action="{{ url("/quiz/delete/{$quiz->id}") }}" >
                              
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
<script>
    document.getElementsByClassName("dropdown-item")[4].classList.add("active-menu")
</script>

@endsection