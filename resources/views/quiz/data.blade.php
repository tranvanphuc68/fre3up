
<div class="row result">
    <?php $count = count($saved_quiz); ?>
      @foreach ($saved_quiz as $quiz)
      <div class="col-md-3 mt-3">
        <div class="quiz @if ($quiz->check == 0) quiz-uncensored @endif ">
          <a href="{{ url("/review_quiz/{$quiz->id_quiz}") }}">
            <div class="quiz-info">
              <div>500 views</div>
              <div>{{ $quiz->number_questions }} questions</div>
            </div>
            <div class="quiz-info">
              <h4>{{ $quiz->quiz_name }}</h4>
            </div>
          </a>

          <div class="quiz-info">
        
                {{-- foreach ( $saved_quiz as $saved){
                    if($saved->id_user == Auth::user()->id && $saved->id_quiz == $quiz->id)
                       { $status = 1;}
                }  --}}
            <div id="{{ $quiz->id_quiz }}" class="quiz-bookmark bold" value="1" onclick="toggleSave({{ $quiz->id_quiz }})"> </div>
          </div>
        </div>
        <div id='none' class="d-none"></div>
        
      </div>
      @endforeach
    </div>
    {{-- {{ $saved_quiz->links('') }} --}}
