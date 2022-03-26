@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/review_v_result.css') }}">
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<div class="block" style="padding-top: 60px;">
<div class="banner">
    <img src="{{ asset("/uploads/review/quiz_photo.jpg") }}" alt="" width="100%" height="auto">
    <span>Quiz</span>
</div>
<div class="quiz-container">
    <div class="row">
        <div class="col-md-6">
            <div class="quiz-name d-flex align-items-center">
                <span>{{ $quiz->quiz_name }}</span>
                <div id="{{ $quiz->id }}" class="quiz-bookmark" style="background-size: 25px;height: 40px;width: 30px;" onclick="toggleSave({{ $quiz->id }},1)">
                    </div>
            </div>
            <div class="d-flex">
                <div class="quiz-menu quiz-menu-about active" onclick="active(0) "><span>About</span></div>

                <div class="quiz-menu quiz-menu-review" onclick="active(1)"><span>Reviews</span></div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="take-quiz">
                <a href="{{ url("/do_quiz/{$quiz->id}") }}"><span>Take quiz</span></a>
            </div>
            <div class="save-view-block">
                <span class="quiz-views">1000 Views</span>
                <span class="quiz-saved">300 Saves</span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="scrip about-scrip scrip-active">
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
            <div class="scrip reviews-scrip">
                <h1>How student rated this quiz</h1>
                <div class="row review">
                    <div class="col-md-2"></div>
                    <div class="col-md-4 mb-2 mt-2">
                        <div class="review-card">
                            <div class="review-card-overall">
                                <p>4.5 out to 5 stars</p>
                                <span>
                                    <img src="{{ asset("/uploads/review/yellow-star.png") }}" alt="" srcset="">
                                    <img src="{{ asset("/uploads/review/yellow-star.png") }}" alt="" srcset="">
                                    <img src="{{ asset("/uploads/review/yellow-star.png") }}" alt="" srcset="">
                                    <img src="{{ asset("/uploads/review/grey-star.png") }}" alt="" srcset="">
                                    <img src="{{ asset("/uploads/review/grey-star.png") }}" alt="" srcset="">
                                </span>
                                <p>(500 ratings)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2 mt-2 ">
                        <div class="review-card">
                            <div class="review-card-detail">
                                <div class="rated">
                                    <span>5</span>
                                    <img src="{{ asset("/uploads/review/yellow-star.png") }}" alt="" srcset="">
                                    <div class="rated-bar">
                                        <div class="star-5"></div>
                                    </div>
                                </div>
                                <div class="rated">
                                    <span>4</span>
                                    <img src="{{ asset("/uploads/review/yellow-star.png") }}" alt="" srcset="">
                                    <div class="rated-bar">
                                        <div class="star-5"></div>
                                    </div>
                                </div>
                                <div class="rated">
                                    <span>3</span>
                                    <img src="{{ asset("/uploads/review/yellow-star.png") }}" alt="" srcset="">
                                    <div class="rated-bar">
                                        <div class="star-5"></div>
                                    </div>
                                </div>
                                <div class="rated">
                                    <span>2</span>
                                    <img src="{{ asset("/uploads/review/yellow-star.png") }}" alt="" srcset="">
                                    <div class="rated-bar">
                                        <div class="star-5"></div>
                                    </div>
                                </div>
                                <div class="rated">
                                    <span>1</span>
                                    <img src="{{ asset("/uploads/review/yellow-star.png") }}" alt="" srcset="">
                                    <div class="rated-bar">
                                        <div class="star-5"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="comment">
                    <h1>Comment</h1>
                    <div class="comment-card">
                        <div class="row">
                            <div class="col-md-3 ">
                                <div class="comment-users">
                                    @if ($quiz->provider != null)
                                        <img src="{{ $quiz->avatar }}" alt="">
                                        {{-- style="height: 90px; width: 90px; border-radius: 50%; display:inline-block;" --}}
                                    @else
                                        <img src="{{ asset("/uploads/avatars/$quiz->avatar") }}" alt="">
                                    @endif
                                    <span>{{ $quiz->user_name }}</span>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="comment-scrip">
                                    <span  class="d-flex">
                                        <img src="{{ asset("/uploads/review/yellow-star.png") }}" alt="" srcset="">
                                        <img src="{{ asset("/uploads/review/yellow-star.png") }}" alt="" srcset="">
                                        <img src="{{ asset("/uploads/review/yellow-star.png") }}" alt="" srcset="">
                                        <img src="{{ asset("/uploads/review/grey-star.png") }}" alt="" srcset="">
                                        <img src="{{ asset("/uploads/review/grey-star.png") }}" alt="" srcset="">
                                    </span>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae
                                        assumenda aspernatur similique corrupti ad ex, perferendis consequatur
                                        consectetur.     Assumenda quibusdam, tempore aliquam inventore eius odit
                                        laboriosam. Laudantium perferendis minima voluptates.</p>
                                    <div class="comment-time">
                                        Posted in <span>1 hour</span> ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div></div>
        </div>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script>
    var quiz_menu = document.getElementsByClassName("quiz-menu")
    var scrip = document.getElementsByClassName("scrip")
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
    function toggleSave(id, saved_status) {
        var icon = document.getElementById(id)
        console.log(icon)
        icon.classList.toggle('bold')
        if (saved_status == 0) { }
    }
</script>
@endsection