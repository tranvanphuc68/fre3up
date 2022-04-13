@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset("/css/review_v_result.css") }}">
<style>
.box::-webkit-scrollbar {
    width: 2px;
}
.box {
    padding: 1rem;
    max-height: 220px;
    overflow-y: auto;
    scrollbar-gutter: stable;
}
</style>
<div class="block">
    <div class="quiz-finish">
        <div class="quiz-name-title">{{ $quiz->quiz_name }}</div>
        <div class="finish-card">
            <div class="finish-card-container">
                <p>Bạn đã đạt: {{ $result }} / {{ $quiz->number_questions }} câu.</p>
                <div class="finish-menu">
                    <div class="btn btn-outline-info mr-2 ml-2 mb-2" onclick="showAns()">Show Answers</div>
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
                        <div class="d-flex voted-bar">
                            <div class="star" onclick="vote(1)" id="star-1"></div>
                            <div class="star" onclick="vote(2)" id="star-2"></div>
                            <div class="star" onclick="vote(3)" id="star-3"></div>
                            <div class="star" onclick="vote(4)" id="star-4"></div>
                            <div class="star" onclick="vote(5)" id="star-5"></div>
                        </div>
                    </div>
                    <!-- cmt-review -->
                    <form method="POST" action="{{ url("/comment/{$quiz->id}") }}">
                    @csrf
                        <div class="cmt-review">
                            <textarea type="text" name="content" style="resize: none;" required rows="3" placeholder="Hãy chia sẻ cảm nhận của bạn về bài quiz"></textarea>
                        </div>
                        <div class="end">
                            <button type="submit" class="button end">Hoàn thành</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


</div>
        <script>
            window.onload = function() {
                const point = {{ $point }}
                load_voted(point)
            }
            function vote(n){
                let id = {{ $quiz->id }}
                let point = n
                var i = 0
                var star = document.getElementsByClassName("star")
                for(i = 0; i<n; i++){
                    star[i].classList.add("voted-star")
                }
                for(i = n; i<5; i++){
                    star[i].classList.remove("voted-star")
                }
                $.ajax({
                    url: `{{ url('/vote/${id}') }}`,
                    method: 'GET',
                    data: { 
                        _token: "{{ csrf_token() }}",
                        point: `${point}` 
                    },
                success: function(res) {
                    console.log(point);
                },
                error: function(err) {
                    console.error(err)
                }
                })
            }
            
            function load_voted(n) {
                var i = 0
                var star = document.getElementsByClassName("star")
                for(i = 0; i<n; i++){
                    star[i].classList.add("voted-star")
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


            function showAns() {
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
