@extends('layouts.app')
@section('content')
@if(Auth::id() == $id_user || Auth::user()->role == 'admin')
<div class="block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url("/detail_quiz/edit/{$data[0]->id_quiz}") }}" method="post">
                            @method('PUT')
                            @csrf
                            <?php $i = 0; ?>
                            @foreach ($data as $item)
                            <div >
                                <?php $i++; ?>
                                <div class="m-4">
                                    <span class="p-3 rounded-pill alert-info font-weight-bold">Question: {{ $i }} / {{ $count }}</span> 
                                </div>
                                <input type="hidden" name="id_{{$i}}" value={{ $item->id }}>
                                <div>
                                    <input type="text" class="form-control input-lg" name="ques_{{$i}}" placeholder="Question" value="{{ $item->question }}">
                                </div>
                                <div class="input-group" id="ques_{{$i}}ans_1">
                                    <div class="input-group-append" onclick="checkCorrect(ques_{{$i}}ans_1)">
                                        <div class="btn btn-outline-secondary"></div>
                                    </div>
                                    <input type="text" class="form-control input-lg" name="ques_{{$i}}ans_1" placeholder="Answer 1" value="{{ $item->ans_1 }}">
                                </div>
                                <div class="input-group" id="ques_{{$i}}ans_2">
                                    <div class="input-group-append" onclick="checkCorrect(ques_{{$i}}ans_2)">
                                        <div class="btn btn-outline-secondary"></div>
                                    </div>
                                    <input type="text" class="form-control input-lg" name="ques_{{$i}}ans_2" placeholder="Answer 2" value="{{ $item->ans_2 }}">
                                </div>
                                <div class="input-group" id="ques_{{$i}}ans_3">
                                    <div class="input-group-append" onclick="checkCorrect(ques_{{$i}}ans_3)">
                                        <div class="btn btn-outline-secondary"></div>
                                    </div>
                                    <input type="text" class="form-control input-lg" name="ques_{{$i}}ans_3" placeholder="Answer 3" value="{{ $item->ans_3 }}">                            
                                </div>
                                <div class="input-group" id="ques_{{$i}}ans_4">
                                    <div class="input-group-append" onclick="checkCorrect(ques_{{$i}}ans_4)">
                                        <div class="btn btn-outline-secondary"></div>
                                    </div>
                                    <input type="text" class="form-control input-lg" name="ques_{{$i}}ans_4" placeholder="Answer 4" value="{{ $item->ans_4 }}">
                                </div>
                                <div class="m-3 font-italic d-none"> ==> Answer:  
                                    <input type="text" value name="ques_{{$i}}choice">
                                </div>
                                <input type="hidden" name="ques_{{$i}}true_ans" id="ques_{{$i}}true_ans" value="{{ $item->true_ans }}">
                                
                            </div>
                            @endforeach
                            <div class="text-center mt-5">
                                <button class="btn btn-primary" type="submit">SAVE</button> 
                                @if (Auth::user()->role == 'admin')
                                <a href="{{ url("/censorship/{$data[0]->id_quiz}") }}">
                                    <div class="btn btn-primary m-3">Agree to Release</div> 
                                </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    for(i=1; i <= {{ $count }} ; i++){
        ans = document.getElementById("ques_"+i+"true_ans").value
        document.getElementsByName(ans)[0].classList.add('alert-success')
    }
</script>
@endif
@endsection