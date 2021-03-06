@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<link rel="stylesheet" href="{{ asset('css/review_v_result.css') }}">
<div class="block">
<div class="">
    <img src="{{ asset("/uploads/review/quiz_photo.jpg") }}" alt="" width="100%">
    <span class="quiz-item">Quiz</span>
</div>
<div class="quiz-container">
    <div class="row">
        <div class="col-md-6">
            <?php $id_quiz = $quiz->id ;?>
            <div class="quiz-name d-flex align-items-start">
                <span>{{ $quiz->quiz_name }}</span>
                @if (Auth::check())
                <?php $status = 0;
                foreach ( $saved_quiz as $saved){
                    if($saved->id_user == Auth::user()->id && $saved->id_quiz == $quiz->id)
                       { $status = 1;}
                } ?>
                    <div id="{{ $quiz->id }}" class="quiz-bookmark" value="{{ $status}}" onclick="toggleSave({{ $quiz->id }})" style="background-size: 25px;height: 40px;width: 30px;"> </div>
                @endif
            </div>
            <div class="d-flex">
                <div class="quiz-menu quiz-menu-about active" onclick="active(0) "><span>About</span></div>
                <div class="quiz-menu quiz-menu-review" onclick="active(1)"><span>Reviews</span></div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="take-quiz" onclick="setClock()">
                <a href="{{ url("/do_quiz/{$quiz->id}") }}"><span>Take quiz</span></a>
            </div>
            <div class="save-view-block">
                <span class="quiz-views"><?php echo count($views) > 1 ? count($views)." Views" : count($views)." View" ?></span>
                <span class="quiz-saved"><?php echo count($saves) > 1 ? count($saves)." Saves" : count($saves)." Save" ?></span>
            </div>
        </div>

        <div class="col-md-12">
            <div class="res">
            <div class="about">
                <div class="row">
                    <div class="col-md-8">
                        <h1>About this quiz</h1>
                        <p>{{ $quiz->about }}</p>
                    </div>
                    <div class="col-md-4">
                        <div class="avatar">
                            @if ($quiz->provider != null)
                                <img src="{{ $quiz->avatar }}" alt="">
                            @else
                                <img src="{{ asset("/uploads/avatars/$quiz->avatar") }}" alt="">
                            @endif
                            <div class="user-quiz-name">{{ $quiz->user_name }}</div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script>
    window.onload = function() {
        load_saved_quiz()
        load_voted()
    }
    var quiz_menu = document.getElementsByClassName("quiz-menu")
    function active(n) {
        quiz_menu[n].classList.add('active')
        let id = {{ $quiz->id }}
        if (n == 0) {
            quiz_menu[1].classList.remove("active")
            $.ajax({
              url: `{{ url('/about_quiz/${id}') }}`,
              method: 'GET',
              success: function(data) {
                $(".review").remove()
                $('.res').html(data)
              },
              error: function(err) {
                  console.error(err)
              }
              })
        } else {
            quiz_menu[0].classList.remove("active")
            $.ajax({
              url: `{{ url('/review/${id}') }}`,
              method: 'GET',
              success: function(data) {
                $(".about").remove()
                $('.res').html(data)
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
      console.log(icon.getAttribute('value'))
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
    //load vote
    function load_voted() {
        var star_rate_1 = document.getElementById('star-rate-1');
        var star_rate_2 = document.getElementById('star-rate-2');
        var star_rate_3 = document.getElementById('star-rate-3');
        var star_rate_4 = document.getElementById('star-rate-4');
        var star_rate_5 = document.getElementById('star-rate-5');
    }

    //load saved quiz
    function load_saved_quiz() {
        var bookmark = document.getElementsByClassName('quiz-bookmark')[0];
        if(bookmark.getAttribute('value') == 1){
            bookmark.classList.add('bold')
        }
    }

    //delete comment
    function detele_comemnt(id) {
        if (confirm('B???n c?? ch???c mu???n x??a kh??ng?')) {
            $.ajax({
                url: `{{ url('/comment/delete/${id}') }}`,
                method: 'GET',
                success: function(res) {
                    $(`#comment-${id}`).remove()
                },
                error: function(err) {
                    console.error(err)
                }
            })
        }
    }
    //set clock
    function setClock(){
        var time = new Date().getTime(); 
        localStorage.setItem("now-{{$id_quiz}}", time);
    }

</script>
@endsection
