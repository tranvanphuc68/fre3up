@extends('layouts.app')
@section('content')
<div class="block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Your Quiz To People') }}</div>
    
                    <div class="card-body">
                       
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#exampleModal">
                            CREATE
                        </button>

                      <div class="row">
                        @foreach ($data as $quiz)

                          <div class="col-lg-3">
                            <a href="{{ url("/detail_quiz/edit/{$quiz->id}") }}">
                              
                                @if ($quiz->check == 1)
                                    <div class="item" style="background-image: linear-gradient(to right,#1ABCF4,#5DEFB8);">
                                      <div class="e-flex-content">{{ $quiz->quiz_name }}</div>
                                      <span>{{ $quiz->number_questions }} questions</span>
                                    </div>
                                @else
                                    <div class="item" style="background-image: linear-gradient(to right,#ff0852,#df9090);">
                                      <div class="e-flex-content">{{ $quiz->quiz_name }}</div>
                                      <span>{{ $quiz->number_questions }} questions</span>
                                    </div>
                                @endif
                              </a>
                              <a href="javascript:void(0)" onclick="if (confirm('Bạn có chắc muốn xóa không?')) document.getElementById('delete-{{ $quiz->id }}').submit()">
                                  <i class="far fa-times-octagon sidebar-icon"></i>
                              </a>
                              <form method="POST" id="delete-{{ $quiz->id }}" action="{{ url("/quiz/{$quiz->id}") }}" >
                                  @method('DELETE')
                                  @csrf
                              </form>
                          </div>                     
                            
                        @endforeach
                        
                      </div>
                      {{ $data->links('') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ url('/quiz') }}" method="post">
        @csrf
      <div class="modal-content form-group">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ABOUT YOUR QUIZ</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
            <div>
                <label for="name">Subject: </label>
                <input type="text" name="quiz_name" id="name" class="form-control form-control-lg">
            </div>
            <div>
                <label for="num">Number of questions: </label>
                <input type="text" name="number_questions" id="num" class="form-control form-control-lg">
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Create</button>
        </div>
      </div>
      </form>
    </div>
  </div>
@endsection