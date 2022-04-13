@extends('layouts.app')
@section('content')
<div class="block">
    <div class="container">
        <div id="clock" class="clock"></div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <?php $time = $quiz->time; $id_quiz = $quiz->id ;?>
                <h1 class="quiz-name-title">{{ $quiz->quiz_name }}</h1>
                <div class="card">
                    <div class="card-body">
                        <form id="form" action="{{ url("/result/quiz/{$data[0]->id_quiz}") }}" method="post">
                            @csrf
                            <?php $i = 0; ?>
                            @foreach ($data as $item)
                            <div >
                                <?php $i++; ?>
                                <div class="m-4">
                                    <span class="p-3 rounded-pill alert-info font-weight-bold">Question: {{ $i }} / {{ $count }}</span> 
                                </div>
                                <input type="hidden" name="id_{{$i}}" value={{ $item->id }}>
                                <div class="p-4 rounded alert-primary">
                                    {{ $item->question }}
                                </div>
                                <div class="mt-3 d-flex" id="ques_{{$i}}ans_1">
                                    <div class="input-group-append" onclick="checkCorrect(ques_{{$i}}ans_1)">
                                        <div class="btn btn-outline-secondary"></div>
                                    </div>
                                    <div class="m-2 border-bottom">{{ $item->ans_1 }}</div>     
                                </div>
                                <div class="mt-3 d-flex" id="ques_{{$i}}ans_2">
                                    <div class="input-group-append" onclick="checkCorrect(ques_{{$i}}ans_2)">
                                        <div class="btn btn-outline-secondary"></div>
                                    </div>
                                    <div class="m-2 border-bottom">{{ $item->ans_2 }}</div>  
                                </div>
                                <div class="mt-3 d-flex" id="ques_{{$i}}ans_3">
                                    <div class="input-group-append" onclick="checkCorrect(ques_{{$i}}ans_3)">
                                        <div class="btn btn-outline-secondary"></div>
                                    </div>
                                    <div class="m-2 border-bottom">{{ $item->ans_3 }}</div>  
                                </div>
                                <div class="mt-3 d-flex" id="ques_{{$i}}ans_4">
                                    <div class="input-group-append" onclick="checkCorrect(ques_{{$i}}ans_4)">
                                        <div class="btn btn-outline-secondary"></div>
                                    </div>
                                    <div class="m-2 border-bottom">{{ $item->ans_4 }}</div>  
                                </div>
                                <input type="hidden" name="ques_{{$i}}ans" id="ques_{{$i}}ans" required>
                                
                            </div>
                            @endforeach
                            <div class="text-center mt-5">
                                    <div class="button" onclick="sendForm()">SAVE</div>                         
                                @if (Auth::user()->role == 'admin')
                                    <a href="{{ url("/eviction/{$data[0]->id_quiz}") }}">
                                        <div class="button-2nd m-3">Evict this Quiz</div> 
                                    
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
    var n = {{ $time }}
    var id_quiz = {{ $id_quiz }}
</script>
<script src="{{ asset('js/clock.js') }}"></script>
<script src="{{ asset('js/quiz.js') }}"></script>
<script>document.getElementsByClassName("dropdown-item")[1].classList.remove("active-menu")</script>
@endsection