@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
<div class="block">
  <div class="container myquiz">
    <div class="row mt-5">
        <div class="col-md-10">
            <h1 class="fw-bolder mb-4">My Quiz</h1>
            <div class="d-flex">
                <div class="quiz-list quiz-list-own active" onclick="active(0)"><h3>My Quiz</h3></div>
                <div class="quiz-list quiz-list-saved" onclick="active(1)"><h3>All Save Quiz</h3></div>
                <div class="quiz-list quiz-list-history" onclick="active(2)"><h3>Quiz History</h3></div>
            </div>

        </div>
    </div>
    <div>
        <button type="button" class="btn btn-primary mt-4 mb-4" data-toggle="modal" data-target="#exampleModal">
          CREATE
        </button>
    </div>
    @error('offset0')
      <div class="form-text text-danger" style="font-size: 17px; font-weight: bold;">{{ $message }}</div>
    @enderror
    <div class="row">
      @foreach ($data as $quiz)
        <div class="col-md-3 mt-3">
          <div class="quiz @if ($quiz->check == 0) quiz-uncensored @endif ">
            <a href="{{ url("/detail_quiz/edit/{$quiz->id}") }}">
                <div class="quiz-info">
                    <div>500 views</div>
                    <div>{{ $quiz->number_questions }} questions</div>
                </div>
                <div class="quiz-info">
                    <h4>{{ $quiz->quiz_name }}</h4>
                </div>
            </a>
                <div class="quiz-info">
                    <div id="{{ $quiz->id }}" class="quiz-bookmark" onclick="toggleSave({{ $quiz->id }}, 1)"> </div>
                </div>
            </div>
          <a href="javascript:void(0)" onclick="if (confirm('Bạn có chắc muốn xóa không?')) document.getElementById('delete-{{ $quiz->id }}').submit()"><i class="fa-regular fa-circle-xmark mt-2"></i></a>
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
<script>
      var quiz_list = document.getElementsByClassName("quiz-list")
      function active(n){
          quiz_list[n].classList.add('active')
          if(n == 0){
              quiz_list[1].classList.remove("active")
              quiz_list[2].classList.remove("active")
          } else if(n == 1){
              quiz_list[0].classList.remove("active")
              quiz_list[2].classList.remove("active")
          }
          else {
              quiz_list[1].classList.remove("active")
              quiz_list[0].classList.remove("active")
          }
      }
      
      function toggleSave(id, saved_status){
          var icon = document.getElementById(id)
          console.log(icon)
          icon.classList.toggle('bold')
          if(saved_status == 0){ }
      }
</script>                                
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ url('/quiz') }}" method="post">
        @csrf
      <div class="modal-content form-group">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ABOUT YOUR QUIZ</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
            <div>
                <label for="name">Subject: </label>
                <input type="text" name="quiz_name" id="name" class="form-control form-control-lg" required>
            </div>
            <div>
                <label for="num">Number of questions: </label>
                <input type="text" name="number_questions" id="num" class="form-control form-control-lg" required>
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Create</button>
        </div>
      </div>
      </form>
    </div>
  </div>
@endsection