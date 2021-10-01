@extends('layouts.app')
@section('content')
<div class="block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Your Quiz To People') }}</div>
    
                    <div class="card-body">
                        <form action="{{ url("/detail_quiz/{$data->id}") }}" method="post">
                            @csrf
                        @for ($i = 1; $i <= $data->number_questions; $i++)
                            <div >
                                
                                <div class="m-4">
                                    <span class="p-3 rounded-pill alert-info">Question: {{ $i }} / {{ $data->number_questions }}</span> 
                                </div>
                                <div>
                                    <input type="text" class="form-control input-lg" name="ques_{{$i}}" placeholder="Question">
                                </div>
                                <div class="input-group" id="ques_{{$i}}ans_1">
                                    <div class="input-group-append" onclick="checkCorrect(ques_{{$i}}ans_1)">
                                        <div class="btn btn-outline-secondary"><i class="fal fa-check sidebar-icon"></i></div>
                                    </div>
                                    <input type="text" class="form-control input-lg" name="ques_{{$i}}ans_1" placeholder="Answer 1">
                                </div>
                                <div class="input-group" id="ques_{{$i}}ans_2">
                                    <div class="input-group-append" onclick="checkCorrect(ques_{{$i}}ans_2)">
                                        <div class="btn btn-outline-secondary"><i class="fal fa-check sidebar-icon"></i></div>
                                    </div>
                                    <input type="text" class="form-control input-lg" name="ques_{{$i}}ans_2" placeholder="Answer 2">
                                </div>
                                <div class="input-group" id="ques_{{$i}}ans_3">                                  
                                    <div class="input-group-append" onclick="checkCorrect(ques_{{$i}}ans_3)">
                                        <div class="btn btn-outline-secondary"><i class="fal fa-check sidebar-icon"></i></div>
                                    </div>
                                    <input type="text" class="form-control input-lg" name="ques_{{$i}}ans_3" placeholder="Answer 3">
                                </div>
                                <div class="input-group" id="ques_{{$i}}ans_4">
                                    <div class="input-group-append" onclick="checkCorrect(ques_{{$i}}ans_4)">
                                        <div class="btn btn-outline-secondary"><i class="fal fa-check sidebar-icon"></i></div>
                                    </div>
                                    <input type="text" class="form-control input-lg" name="ques_{{$i}}ans_4" placeholder="Answer 4">
                                </div>
                                <input type="hidden" name="ques_{{$i}}true_ans" value="">
                                
                            </div>
                            @endfor
                            <button class="btn btn-primary" type="submit">SAVE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection