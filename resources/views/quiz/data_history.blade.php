<div id="res">
    <div class="row result">
    <?php $count = count($history_quiz); ?>
      @foreach ($history_quiz as $quiz)
      <div class="col-md-3 mt-3">
        <div class="quiz">
          <a href="{{ url("/review_quiz/{$quiz->id}") }}">
            <div class="quiz-info">
                <div> 500 views</div>
                <!-- end views -->
              <div>{{ $quiz->number_questions }} questions</div>
            </div>
            <div class="quiz-info">
              <h4>{{ $quiz->quiz_name }}</h4>
            </div>
          </a>

          <div class="quiz-info">
                <div>{{ $quiz->name }}</div>
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
    {{-- {{ $history_quiz->links('') }} --}}
</div>