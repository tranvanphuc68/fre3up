@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
<div class="block">
  <div class="container myquiz">
    <div class="row mt-5 mb-5">
      <div class="col-md-10">
        <h1 class="fw-bold mb-5">My Quiz</h1>
        <div class="d-flex">
          <div class="quiz-list quiz-list-own active" onclick="active(0)">
            <h3>My Quiz</h3>
          </div>
          <div class="quiz-list quiz-list-saved" onclick="active(1)">
            <h3>All Save Quiz</h3>
          </div>
          <div class="quiz-list quiz-list-history" onclick="active(2)">
            <h3>Quiz History</h3>
          </div>
        </div>

      </div>
    </div>
    <div>
      <button type="button" class="button mt-4 mb-4" data-toggle="modal" data-target="#exampleModal">
        CREATE
      </button>
    </div>
    
    <div id="res">
    <div class="row result">
      @error('offset0')
          <div class="form-text text-danger" style="font-size: 17px; font-weight: bold;">{{ $message }}</div>
      @enderror
      @if (count($data) == 0)
          <div class="nothing">Nothing is here</div>
      @endif
    <?php $count = count($data); ?>
      @foreach ($data as $quiz)
      <div class="col-md-3 mt-3">
        <div class="quiz @if ($quiz->check == 0) quiz-uncensored @endif" id="quiz-{{ $quiz->id }}">
          <a href="{{ url("/detail_quiz/edit/{$quiz->id}") }}">
            <div class="quiz-info">
                <!--views -->
                <?php $total = 0; ?>
                @foreach ( $views as $item)
                    @if ( $item->id_quiz == $quiz->id)
                        <?php  $total = $item->total; ?>
                        @break
                    @endif
                @endforeach
                <div> {{ $total }} <?php echo ($total < 2) ? "view" : "views" ?></div>
                <!-- end views -->
              <div>{{ $quiz->number_questions }} <?php echo ($quiz->number_questions < 2) ? "question" : "questions" ?></div>
            </div>
            <div class="quiz-info">
              <h4>{{ $quiz->quiz_name }}</h4>
            </div>
          </a>
          <div class="quiz-info">
            <a href="{{ url("/users/{$quiz->id_user}") }}"><div>{{ $quiz->name }}</div></a>
            <?php $status = 0;
              foreach ( $saved_quiz as $saved){
                if($saved->id_user == Auth::user()->id && $saved->id_quiz == $quiz->id)
                  { $status = 1;}
              } ?>
            <div id="{{ $quiz->id }}" class="quiz-bookmark" value="{{ $status}}" onclick="toggleSave({{ $quiz->id }})"> </div>
          </div>
        </div>
        <div id='none' class="d-none"></div>
        <a href="javascript:void(0)" onclick="delete_quiz({{ $quiz->id }})"><i class="fa-regular fa-circle-xmark mt-2"></i></a>
      </div>
      @endforeach

    </div>
    {{ $data->links('') }}
  </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ url('/quiz') }}" method="post">
      @csrf
      <div class="modal-content form-group">
        <div class="modal-header">
          <h1 class="fw-bold" id="exampleModalLabel">ABOUT YOUR QUIZ</h1>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div>
            <label for="name" class="fw-bold" >Quiz name: </label>
            <input type="text" name="quiz_name" class="form-control form-control-lg" id="quiz_name" placeholder="Enter the quiz name" required>
          </div>
          <div class="mt-3">
            <label for="num" class="fw-bold">Number of questions: </label>
            <input type="text" name="number_questions" id="num" class="form-control form-control-lg" placeholder="Enter the number's question" required>
          </div>
          <div class="mt-3">
            <label for="about" class="fw-bold">Description: </label>
            <textarea type="text" name="about" style="resize: none;" class="form-control form-control-lg form-control-lg" rows="3" id="about" placeholder="Enter the quiz's description" required ></textarea>
          </div>
          <div class="mt-3 fw-bold">
            <label for="time">Time: </label>
            <select class="form-select form-select-lg mb-3" name="time" >
              <option value="0" selected>Unlimited</option>
              <option value="1">30 minutes</option>
              <option value="2">60 minutes</option>
              <option value="3">90 minutes</option>
              <option value="4">120 minutes</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Create</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
  window.onload = load_saved_quiz()
    var quiz_list = document.getElementsByClassName("quiz-list")
    function active(n) {
      quiz_list[n].classList.add('active')
      if (n == 0) {
        $.ajax({
              url: "{{ url('/quiz/') }}",
              method: 'GET',
              success: function(data) {
                  $(".result").remove()
                  $('#res').html(data)
                  load_saved_quiz()
              },
              error: function(err) {
                  console.error(err)
              }
              })
        quiz_list[1].classList.remove("active")
        quiz_list[2].classList.remove("active")
      } else if (n == 1) {
        quiz_list[0].classList.remove("active")
        quiz_list[2].classList.remove("active")
        $.ajax({
              url: "{{ url('/all_saved_quiz/') }}",
              method: 'GET',
              success: function(data) {
                  $(".result").remove()
                  $('#res').html(data)
              },
              error: function(err) {
                  console.error(err)
              }
              })
      } else {
        quiz_list[1].classList.remove("active")
        quiz_list[0].classList.remove("active")
        $.ajax({
              url: "{{ url('/history_quiz/') }}",
              method: 'GET',
              success: function(data) {
                  $(".result").remove()
                  $('#res').html(data)
              },
              error: function(err) {
                  console.error(err)
              }
              })
      }
    }

    function toggleSave(id) {
      var icon = document.getElementById(id)
      icon.classList.toggle('bold')
      saved_status = icon.getAttribute('value')
        if (saved_status == 0) {
            $('#'+id).attr("value", "1")
            $.ajax({
              url: "{{ url('/saved_quiz/') }}"+"/"+id,
              method: 'GET',
              success: function(res) {
                $('#none').text(res)
              },
              error: function(err) {
                  console.error(err)
              }
              })
        }
        else {
            $('#'+id).attr("value", "0")
            $.ajax({
              url: "{{ url('/unsaved_quiz/') }}"+"/"+id,
              method: 'GET',
              success: function(res) {
                $('#none').text(res)
              },
              error: function(err) {
                  console.error(err)
              }
              })
        }

    }

    //load saved quiz
    function load_saved_quiz(){
        var count = {{ $count }}
          for (var i=0; i < count; i++){
          var bookmark = document.getElementsByClassName('quiz-bookmark')[i];
            if(bookmark.getAttribute('value') == 1){
              bookmark.classList.add('bold')
          }
      }
    }

    //delete quiz
    function delete_quiz(id) {
      if (confirm('B???n c?? ch???c mu???n x??a kh??ng?')) {
        $.ajax({
          url: `{{ url('/quiz/delete/${id}') }}`,
          method: 'GET',
          success: function(res) {
            $(`#quiz-${id}`).parent().remove()
          },
          error: function(err) {
            console.error(err)
          }
        })
      }
    }
  </script>
<script src="{{ asset('js/quiz.js') }}"></script>
@endsection
