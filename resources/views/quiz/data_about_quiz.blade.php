<div class="res">
    <div class="about">
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
</div>