@extends('layouts.app')
@section('content')
<div class="block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url("/detail_quiz/{$data->id}") }}" method="post">
                            @csrf
                        <?php $questions = $data->number_questions; ?>
                        @for ($i = 1; $i <= $data->number_questions; $i++)
                            <div class="m-5">
                                
                                <div class="m-4">
                                    <span class="p-3 rounded-pill alert-info font-weight-bold">Question: {{ $i }} / {{ $data->number_questions }}</span> 
                                </div>
                                <div>
                                    <input type="text" class="form-control input-lg" name="ques_{{$i}}" placeholder="Question" required>
                                </div>
                                <div class="input-group" id="ques_{{$i}}ans_1">
                                    <div class="input-group-append" onclick="checkCorrect(ques_{{$i}}ans_1)">
                                        <div class="btn btn-outline-secondary"></div>
                                    </div>
                                    <input type="text" class="form-control input-lg" name="ques_{{$i}}ans_1" placeholder="Answer 1" required>
                                </div>
                                <div class="input-group" id="ques_{{$i}}ans_2">
                                    <div class="input-group-append" onclick="checkCorrect(ques_{{$i}}ans_2)">
                                        <div class="btn btn-outline-secondary"></div>
                                    </div>
                                    <input type="text" class="form-control input-lg" name="ques_{{$i}}ans_2" placeholder="Answer 2" required>
                                </div>
                                <div class="input-group" id="ques_{{$i}}ans_3">                                  
                                    <div class="input-group-append" onclick="checkCorrect(ques_{{$i}}ans_3)">
                                        <div class="btn btn-outline-secondary"></div>
                                    </div>
                                    <input type="text" class="form-control input-lg" name="ques_{{$i}}ans_3" placeholder="Answer 3" required>
                                </div>
                                <div class="input-group" id="ques_{{$i}}ans_4">
                                    <div class="input-group-append" onclick="checkCorrect(ques_{{$i}}ans_4)">
                                        <div class="btn btn-outline-secondary"></div>
                                    </div>
                                    <input type="text" class="form-control input-lg" name="ques_{{$i}}ans_4" placeholder="Answer 4" required>
                                </div>
                                <div class="m-3 font-italic">
                                </div>
                                <input type="hidden" class="form-control" name="ques_{{$i}}true_ans">
                                
                            </div>
                            @endfor
                            <div class="text-center mt-5">
                                <button class="button" type="button" onclick="beforePost()">SAVE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function beforePost(){
          var questions = {{ $questions }}
          var answers = 0
          for(let i = 1; i <= questions; i++){
                var ques = $(`input[name='ques_${i}']`).val()
                var true_ans = $(`input[name='ques_${i}true_ans']`)
                var ans_1 = $(`input[name='ques_${i}ans_1']`).val()
                var ans_2 = $(`input[name='ques_${i}ans_2']`).val()
                var ans_3 = $(`input[name='ques_${i}ans_3']`).val()
                var ans_4 = $(`input[name='ques_${i}ans_4']`).val()
                if(true_ans.val() == ''){
                    true_ans.prev().html("<div style='color:red;'>Please choose the true one</div>")
                } else if(ans_1 == '' || ans_2 == '' || ans_3 == '' || ans_4 == '' || ques == '') {
                    true_ans.prev().html("<div style='color:red;'>Please fill all input</div>")
                }
                else{
                    true_ans.prev().html("")
                    answers++;
                }
          }
          if(questions == answers ) $("form").submit()
        }
</script>
<script src="{{ asset('js/quiz.js') }}"></script>
@endsection