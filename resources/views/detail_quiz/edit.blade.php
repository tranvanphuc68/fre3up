@extends('layouts.app')
@section('content')
@if(Auth::id() == $id_user || Auth::user()->role == 'admin')
<div class="block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class="quiz-name-title">{{ $quiz->quiz_name }}</h1>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url("/detail_quiz/edit/{$data[0]->id_quiz}") }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="">
                                        <label for="name" class="fw-bold" >Quiz name: </label>
                                        <input type="text" name="quiz_name" class="form-control input-lg" id="quiz_name" placeholder="Quiz name" value="{{ $quiz->quiz_name }}">
                                    </div>
                                    <div class="mt-3">
                                        <label for="about" class="fw-bold">Description: </label>
                                        <textarea type="text" name="about" style="resize: none;" class="form-control input-lg" rows="3" id="about" placeholder="Enter the quiz's description">{{ $quiz->about }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="">
                                        <label for="time" class="fw-bold">Time: </label>
                                        <select class="form-select form-select-lg mb-3" name="time" >
                                            <option value="0" <?php if ($quiz->time == 0) echo "selected" ?> >Unlimited</option>
                                            <option value="1" <?php if ($quiz->time == 1) echo "selected" ?> >30 minutes</option>
                                            <option value="2" <?php if ($quiz->time == 2) echo "selected" ?> >60 minutes</option>
                                            <option value="3" <?php if ($quiz->time == 3) echo "selected" ?> >90 minutes</option>
                                            <option value="4" <?php if ($quiz->time == 4) echo "selected" ?> >120 minutes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <?php $i = 0; ?>
                            @foreach ($data as $item)
                            <div>
                                <?php $i++; ?>
                                <div class="m-4 mt-5">
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
    for (i = 1; i <= {{$count}}; i++) {
        ans = document.getElementById("ques_" + i + "true_ans").value
        document.getElementsByName(ans)[0].classList.add('alert-success')
    }
</script>
@endif
@endsection
