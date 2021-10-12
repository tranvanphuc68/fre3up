@extends('layouts.app')
@section('content')
<style>
.box::-webkit-scrollbar {
    width: 2px;
} 
.box{
    padding: 1rem;
    max-height: 220px;
    overflow-y: auto;
    scrollbar-gutter: stable;
}
</style>
<div class="block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Your Quiz To People') }}</div>

                    <div class="card-body">
                        <!-- result & rank -->
                        <div>
                            <div class="text-center">
                                <div class="m-4 font-weight-bold">Bạn đã đạt: {{ $result }} / {{ $quiz->number_questions }} câu.</div>
                                <div>
                                    <div class="btn btn-outline-secondary" onclick="oke()">Show Answers</div>
                                    <div class="btn btn-outline-secondary" onclick="document.getElementById('all_result').classList.toggle('d-none')">All Results</div>
                                </div>     
                            </div>
                            <div class="d-flex mt-5 justify-content-center">   
                                <div class="col-md-6 p-2" style="border-radius: 10%; background-image: linear-gradient(to right, #ffcde5, #ffffff );">
                                    <h3 class="text-center font-weight-bold">Rank</h3>
                                    <div class="box">
                                    @foreach ($rank as $item)
                                        <div class="d-flex justify-content-between "><span class="col-md-6">{{ $item->name }}</span>  <span class="col-md-6 text-right">{{ $item->result }}/{{ $quiz->number_questions }}</span></div>
                                    @endforeach
                                    </div>
                                </div>       
                            </div>
                        </div>
                        <!-- all result -->
                        <div class="m-5 d-none border border-info box" id="all_result">
                            @foreach ($all_result as $res)
                            <div class="m-3 d-flex justify-content-between">
                                <div>Bạn đã đạt: {{ $res->result }}/{{ $quiz->number_questions }} câu</div>
                                <div>{{ $res->updated_at }}</div>
                            </div>
                            @endforeach
                        </div>
                        <!-- all answer -->
                        <div class="faded d-none" id="all_ans">
                            <?php $i = 0; ?>
                            @foreach ($data as $item)
                            <div>
                                <?php $i++; $count = $quiz->number_questions; ?>
                                <div class="m-4">
                                    <span class="p-3 rounded-pill alert-info font-weight-bold">Question: {{ $i }} / {{ $quiz->number_questions }}</span> 
                                </div>
                                <input type="hidden" name="id_{{$i}}" value={{ $item->id }}>
                                <div class="p-4 rounded alert-primary">
                                    {{ $item->question }}
                                </div>
                                <div class="mt-3" style="display: flex;" id="ques_{{$i}}ans_1">
                                    <div class="m-2 border-bottom" value="{{ $item->ans_1 }}" >{{ $item->ans_1 }}</div>     
                                </div>
                                <div class="mt-3" style="display: flex;" id="ques_{{$i}}ans_2">
                                    <div class="m-2 border-bottom" value="{{ $item->ans_2 }}">{{ $item->ans_2 }}</div>  
                                </div>
                                <div class="mt-3" style="display: flex;" id="ques_{{$i}}ans_3">
                                    <div class="m-2 border-bottom" value="{{ $item->ans_3 }}">{{ $item->ans_3 }}</div>  
                                </div>
                                <div class="mt-3" style="display: flex;" id="ques_{{$i}}ans_4">
                                    <div class="m-2 border-bottom" value="{{ $item->ans_4 }}">{{ $item->ans_4 }}</div>  
                                </div>
                                <input type="hidden" name="ques_{{$i}}true_ans" id="ques_{{$i}}true_ans" value="{{ $item->true_ans }}">
                                
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function oke(){
        setTimeout(function(){
            document.getElementById('all_ans').classList.toggle('faded');
        },200);
        setTimeout(function(){
            document.getElementById('all_ans').classList.toggle('d-none'); 
        },600);
        
    }
    for(i=1; i <= {{ $count }} ; i++){
        ans = document.getElementById("ques_"+i+"true_ans").value
        document.getElementById(ans).classList.add('alert-success')
    }
</script>
@endsection