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
                                <div class="m-3 font-italic"> ==> Answer:  
                                    <input type="text" value name="ques_{{$i}}choice" required>
                                </div>
                                <input type="hidden" class="form-control" name="ques_{{$i}}true_ans">
                                
                            </div>
                            @endfor
                            <div class="text-center mt-5">
                                <button class="btn btn-primary" type="submit">SAVE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection