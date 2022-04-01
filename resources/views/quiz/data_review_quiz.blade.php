<div class="res">
    <div class="review">
        <h1>How student rated this quiz</h1>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4 mb-2 mt-2">
                <div class="review-card">
                    <div class="review-card-overall">
                        <?php
                            $total = 0; $vote_num = count($vote);
                            foreach ($vote as $item) $total = $total + $item->point;
                            $average = $total / $vote_num;
                            $point = round($average, 2);
                        ?>
                        <p><?php echo $point ?> out to 5 stars</p>
                        <span>
                            <?php
                                for ($i = 1; $i < 6; $i++) { 
                                    if ($i <= $average) { ?>
                                        <div class="star voted-star" id="star-<?php echo $i?>"></div>
                                    <?php } else if (gettype($average) != "integer" && $i <= $average + 1) { ?>
                                        <div class="star half-star" id="star-<?php echo $i?>"></div>
                                    <?php } else { ?>
                                         <div class="star" id="star-<?php echo $i?>"></div>
                                 <?php }} ?>
                        </span>
                        <p>(<?php echo $vote_num ?> ratings)</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-2 mt-2 ">
                <div class="review-card">
                    <div class="review-card-detail">
                        <?php
                            for ($i = 5; $i > 0; $i--) {
                                $vote_star[$i] = 0; $star[$i] = 0;
                                foreach ($vote as $item) {
                                    if ($item->point ==  $i) {$vote_star[$i] ++;}
                                }
                                $star[$i] = $vote_star[$i] / $vote_num * 100;
                            ?>
                                <div class="rated">
                                    <span><?php echo $i ?></span>
                                    <img src="{{ asset("/uploads/review/yellow-star.png") }}" alt="" srcset="">
                                    <div class="range-wrap">
                                        <div class="range-slider">
                                          <span class="range-thumb" style="width: <?php echo $star[$i]; ?>% "></span>
                                        </div>
                                      </div>
                                </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <!-- comment -->
        <div class="comment">
            <h1>Comment</h1>
            @foreach ($data as $comment)
            @if ($comment->content != null)
            <div class="comment-card">
                <div class="row">
                    <div class="col-md-3 ">
                        <div class="comment-users">
                            @if ($comment->provider != null)
                            <img src="{{ $comment->avatar }}" alt="">
                            @else
                            <img src="{{ asset("/uploads/avatars/$comment->avatar") }}" alt="">
                            @endif
                            <span class="border-0">{{ $comment->user_name }}</span>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="comment-scrip">
                            <span class="d-flex">
                                @if ($comment->point != null)
                                <?php $comment->point == null ? $point = 5 : $point = $comment->point;
                                    for ($i = 1; $i < 6; $i++) { ?>
                                        <div class="users-voted-rate star <?php echo $i <= $point ? "voted-star" : null; ?>" id="star-<?php echo $i?>"></div>
                                <?php } ?>
                                @else 
                                <div class="fs-5">Người dùng chưa thực hiện đánh giá bài quiz</div>
                                @endif
                            </span>
                            <p> {{ $comment->content }}</p>
                            <div class="comment-time">
                                Posted at <span>{{ $comment->updated_at }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
