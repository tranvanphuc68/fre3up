<div id="res">
    <div class="row result">
    <?php $count = count($data); ?>
      @foreach ($data as $quiz)
      <div class="col-md-3 mt-3">
        <div class="quiz @if ($quiz->check == 0) quiz-uncensored @endif ">
          <a href="{{ url("/detail_quiz/edit/{$quiz->id}") }}">
            <div class="quiz-info">
                <!--views -->
                <?php $total = 0; ?>
                @foreach ( $views as $item)
                    @if ( $item->id_quiz == $quiz->id)
                        <?php  $total = $item->total; ?>
                        @break
                    @endif
                @endforeach
                <div> {{ $total }} <?php echo ($total == 0) ? "view" : "views" ?></div>
                <!-- end views -->
              <div>{{ $quiz->number_questions }} <?php echo ($quiz->number_questions < 2) ? "question" : "questions" ?></div>
            </div>
            <div class="quiz-info">
              <h4>{{ $quiz->quiz_name }}</h4>
            </div>
          </a>

          <div class="quiz-info">
            <a href="{{ url("/users/{$quiz->id_user}") }}"><div>{{ $quiz->name }}</div></a>
        <?php $status = 0;
                foreach ( $saved_quiz as $saved){
                    if($saved->id_user == Auth::user()->id && $saved->id_quiz == $quiz->id)
                       { $status = 1;}
                } ?>
            <div id="{{ $quiz->id }}" class="quiz-bookmark" value="{{ $status}}" onclick="toggleSave({{ $quiz->id }})"> </div>
          </div>
        </div>
        <div id='none' class="d-none"></div>
        <a href="javascript:void(0)" onclick="if (confirm('Bạn có chắc muốn xóa không?')) document.getElementById('delete-{{ $quiz->id }}').submit()"><i class="fa-regular fa-circle-xmark mt-2"></i></a>
        <form method="POST" id="delete-{{ $quiz->id }}" action="{{ url("/quiz/{$quiz->id}") }}">
          @method('DELETE')
          @csrf
        </form>
      </div>
      @endforeach
    </div>
    {{ $data->links('') }}
</div>
