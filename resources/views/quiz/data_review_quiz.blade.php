<div class="res">
    <div class="review">
        <h1>How student rated this quiz</h1>
        <div class="row">
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
        <!-- comment -->
        <div class="comment">
            <h1>Comment</h1>
            @foreach ($data as $comment)
            <div class="comment-card">
                <div class="row">
                    <div class="col-md-3 ">
                        <div class="comment-users">
                            @if ($comment->provider != null)
                            <img src="{{ $comment->avatar }}" alt="">
                            @else
                            <img src="{{ asset("/uploads/avatars/$comment->avatar") }}" alt="">
                            @endif
                            <span>{{ $comment->user_name }}</span>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="comment-scrip">

                            <span class="d-flex">
                                {{ $comment->point }}
                                <img src="{{ asset("/uploads/review/yellow-star.png") }}" alt="" srcset="">
                                <img src="{{ asset("/uploads/review/yellow-star.png") }}" alt="" srcset="">
                                <img src="{{ asset("/uploads/review/yellow-star.png") }}" alt="" srcset="">
                                <img src="{{ asset("/uploads/review/grey-star.png") }}" alt="" srcset="">
                                <img src="{{ asset("/uploads/review/grey-star.png") }}" alt="" srcset="">
                            </span>
                            <p> {{ $comment->content }}</p>
                            <div class="comment-time">
                                Posted in <span>1 hour</span> ago
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>