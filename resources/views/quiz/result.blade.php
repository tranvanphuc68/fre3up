@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset("/css/review_v_result.css") }}">
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
    
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $quiz->quiz_name }}</div>

                    <div class="card-body">
                        <!-- result & rank -->
                        <div>
                            <div class="text-center">
                                <div class="m-4 font-weight-bold">Bạn đã đạt: {{ $result }} / {{ $quiz->number_questions }} câu.</div>
                                <div>
                                    <div class="btn btn-outline-info" onclick="oke()">Show Answers</div>
                                    <div class="btn btn-outline-info" onclick="document.getElementById('all_result').classList.toggle('d-none')">All Results</div>
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
                                <?php $i++; $count = $quiz->number_questions; $_answers = $_answers;?>
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
                   
                                @for ($i = 1; $i <= $count; $i++)
                                    <input type="hidden" name="ques_{{$i}}ans" id="ques_{{$i}}ans" value="<?php echo ($_answers["ques_".$i."ans"] != null) ? $_answers["ques_".$i."ans"] : 0 ?>">
                                @endfor
 
                            
                        </div>
                        <a href="{{ url("/review_quiz/{$quiz->id}") }}"><div class="btn btn-info" style="font-size: 15px;">Do Again</div></a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="quiz-finish">
        <span>{{ $quiz->quiz_name }}</span>
        <div class="finish-card">
            <div class="finish-card-container">
                <p>Bạn đã đạt: {{ $result }} / {{ $quiz->number_questions }} câu.</p>
                <div class="finish-menu">
                    <div class="btn btn-outline-info mr-2 ml-2 mb-2" onclick="oke()">Show Answers</div>
                    <div class="btn btn-outline-info mb-2"
                        onclick="document.getElementById('all_result').classList.toggle('d-none')">All Results</div>
                </div>
                <!-- table rank -->
                <div>
                    <div class="rank-review">Rank</div>
                    <table class="finish-table mt-1">
                        <div>
                            <thead>
                                <tr>
                                    <th class="w-10">ID</th>
                                    <th class="w-70">NAME</th>
                                    <th class="w-20">RESULT</th>
                                </tr>
                            </thead>
                        </div>

                        <tbody>
                            @foreach ($rank as $item)
                                <tr>
                                    <td>{{ $item->id_user }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->result }}/{{ $quiz->number_questions }}</td>
                                </tr>        
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- all result -->
                <div class="m-5 d-none border border-info box" id="all_result">
                    @foreach ($all_result as $res)
                    <div class="m-3 d-flex justify-content-between fs-4">
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
                        <?php $i++; $count = $quiz->number_questions; $_answers = $_answers;?>
                        <div class="m-4">
                            <span class="p-3 rounded-pill alert-info font-weight-bold fs-4">Question: {{ $i }} / {{
                                $quiz->number_questions }}</span>
                        </div>
                        <input type="hidden" name="id_{{$i}}" value={{ $item->id }}>
                        <div class="p-4 rounded alert-primary">
                            {{ $item->question }}
                        </div>
                        <div class="mt-3" style="display: flex;" id="ques_{{$i}}ans_1">
                            <div class="m-2 border-bottom" value="{{ $item->ans_1 }}">{{ $item->ans_1 }}</div>
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
                        <input type="hidden" name="ques_{{$i}}true_ans" id="ques_{{$i}}true_ans"
                            value="{{ $item->true_ans }}">
                    </div>
                    @endforeach

                        @for ($i = 1; $i <= $count; $i++)
                            <input type="hidden" name="ques_{{$i}}ans" id="ques_{{$i}}ans" value="<?php echo ($_answers["ques_".$i."ans"] != null) ? $_answers["ques_".$i."ans"] : 0 ?>">
                        @endfor
                </div> 
                <div id="finish-review">
                    <!-- review-->
                    <div class="rank-review">Review</div>
                    <!-- vote-->
                    <div class="vote-rate">
                        <div class="">
                            <img class="star-input" onclick="voted(1)" src="{{ asset("/uploads/review/grey-star.png") }}" alt="" srcset="">
                            <div class="vote-output">
                                <img class="star-output d-none" onclick="un_voted(1)" src="{{ asset("/uploads/review/yellow-star.png") }}" alt=""
                                    srcset="">
                            </div>
                        </div>
                        <div>
                            <img class="star-input" onclick="voted(2)" src="{{ asset("/uploads/review/grey-star.png") }}" alt="" srcset="">
                            <div class="vote-output">
                                <img class="star-output d-none" onclick="un_voted(2)" src="{{ asset("/uploads/review/yellow-star.png") }}" alt=""
                                    srcset="">
                            </div>
                        </div>
                        <div>
                            <img class="star-input" onclick="voted(3)" src="{{ asset("/uploads/review/grey-star.png") }}" alt="" srcset="">
                            <div class="vote-output">
                                <img class="star-output d-none" onclick="un_voted(3)" src="{{ asset("/uploads/review/yellow-star.png") }}" alt=""
                                    srcset="">
                            </div>
                        </div>
                        <div>
                            <img class="star-input" onclick="voted(4)" src="{{ asset("/uploads/review/grey-star.png") }}" alt="" srcset="">
                            <div class="vote-output">
                                <img class="star-output d-none" onclick="un_voted(4)" src="{{ asset("/uploads/review/yellow-star.png") }}" alt=""
                                    srcset="">
                            </div>
                        </div>
                        <div>
                            <img class="star-input" onclick="voted(5)" src="{{ asset("/uploads/review/grey-star.png") }}" alt="" srcset="">
                            <div class="vote-output">
                                <img class="star-output d-none" onclick="un_voted(5)" src="{{ asset("/uploads/review/yellow-star.png") }}" alt=""
                                    srcset="">
                            </div>
                        </div>
    
                    </div>
                    <!-- cmt-review -->
                    <div class="cmt-review">
                        <textarea type="text" rows="3" placeholder="Hãy chia sẻ cảm nhận của bạn về bài quiz"></textarea>
                    </div>
                    <div class="end">
                        <button name="" class="btn btn-primary end">Hoàn thành</button>
                    </div>
                </div>
            </div>
        </div>


</div>




        <script>
            var quiz_menu = document.getElementsByClassName("quiz-menu")
            var scrip = document.getElementsByClassName("scrip")
            var star_input = document.getElementsByClassName("star-input")
            var star_output = document.getElementsByClassName("star-output")
            function voted(n) {
                for (let i = 0; i < n; i++) {
                    star_output[i].classList.remove("d-none");
                }
            }

            function un_voted(n) {
                for (let i = n; i < 6; i++) {
                    star_output[i].classList.add("d-none");
                }
            }

            function active(n) {
                quiz_menu[n].classList.add('active')
                scrip[n].classList.add('scrip-active')
                if (n == 0) {
                    quiz_menu[1].classList.remove("active")
                    scrip[1].classList.remove("scrip-active")
                } else {
                    quiz_menu[0].classList.remove("active")
                    scrip[0].classList.remove("scrip-active")
                }
            }

            function oke() {
                setTimeout(function () {
                    document.getElementById('all_ans').classList.toggle('faded');
                }, 200);
                setTimeout(function () {
                    document.getElementById('all_ans').classList.toggle('d-none');
                    document.getElementById("finish-review").classList.toggle('d-none');
                    document.getElementsByClassName("rank-review")[0].parentElement.classList.toggle('d-none');
                }, 600);
            }
        for (i = 1; i <= {{ $count }}; i++) {
            true_ans = document.getElementById("ques_" + i + "true_ans").value
            ans = document.getElementById("ques_" + i + "ans").value
            if (ans == 0) {
                document.getElementById(true_ans).classList.add('alert-success')
            } else if (true_ans !== ans) {
                document.getElementById(ans).classList.add('alert-danger')
            }
            document.getElementById(true_ans).classList.add('alert-success')
        }
        </script>
@endsection