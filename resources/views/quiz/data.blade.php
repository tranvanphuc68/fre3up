
<div class="row result">
    <?php $count = count($saved_quiz); ?>
      @foreach ($saved_quiz as $quiz)
      <div class="col-md-3 mt-3">
        <div class="quiz @if ($quiz->check == 0) quiz-uncensored @endif ">
          <a href="{{ url("/review_quiz/{$quiz->id_quiz}") }}">
            <div class="quiz-info">
               <!--views -->
               <?php $total = 0; ?>
               @foreach ( $views as $item)
                   @if ( $item->id_quiz == $quiz->id)
                       <?php  $total = $item->total; ?>
                       @break
                   @endif
               @endforeach
               <div> {{ $total }} views</div>
               <!-- end views -->
              <div>{{ $quiz->number_questions }} questions</div>
            </div>
            <div class="quiz-info">
              <h4>{{ $quiz->quiz_name }}</h4>
            </div>
          </a>

          <div class="quiz-info">
            <a href="{{ url("/users/{$quiz->id_user}") }}"><div>{{ $quiz->name }}</div></a>
            <div id="{{ $quiz->id_quiz }}" class="quiz-bookmark bold" value="1" onclick="toggleSave({{ $quiz->id_quiz }})"> </div>
          </div>
        </div>
        <div id='none' class="d-none"></div>

      </div>
      @endforeach
    </div>
    {{-- {{ $saved_quiz->links('') }} --}}
