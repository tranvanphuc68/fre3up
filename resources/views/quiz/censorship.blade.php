@extends('layouts.app')
@section('content')
<div class="block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('All Quiz in Queue') }}</div>
    
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
                          </div>                     
                            
                        @endforeach
                        
                      </div>
                      {{ $data->links('') }}
                        <form method="POST" id="delete-{{ $quiz->id }}" action="{{ url("/quiz/{$quiz->id}") }}" >
                            @method('DELETE')
                            @csrf
                        </form>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection