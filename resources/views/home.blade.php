@extends('layouts.app')

@section('content')
<div class="block">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">

                    @foreach ($all_process as $process)
                        <div class="col-md-3" data-toggle="modal" data-target="#exampleModal{{$process->id}}">
                                <div class="item" style="background-image: linear-gradient(to right,#ce4ece,#e2e6ab); border-radius:50%;">
                                    <div style="text-align: center;" >{{ $process->name }}</div>
                              </div>
                                @csrf
                                  @foreach ($data as $detail)
                                    @if ($detail->id_process == $process->id)

                                    @endif
                                  @endforeach

                        </div>
                      @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

<!-- Modal -->
@foreach ( $all_process as $process )

<div class="modal fade" id="exampleModal{{$process->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ url('/process') }}" method="post">
        @csrf
      <div class="modal-content form-group">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ $process->name }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @foreach ($data as $item)
          @if ($item->id_process == $process->id)
           
            <div class="paragraph__timeline__entry --entry-1 --is-pending">
                <span></span>
                <div class="paragraph__timeline__content-container">
                    <div class="paragraph__timeline__content">
                        <div class="paragraph__timeline__title">{{ $item->content }}</div>
                        <div class="paragraph__timeline__info"><a href="https://www.youtube.com/watch?v=U3ASj1L6_sY">This is link <i class="fal fa-alicorn"></i></a></div>
                        <div class="paragraph__timeline__date-time">
                            <span class="paragraph__timeline__date">{{ $item->date }}</span>
                        </div>
                    <div>
                        <div class="paragraph__timeline__name d-flex" style="align-items: center; justify-content:space-between;">
                            <div>    
                                  @if ($item->status == 0)
                                    <div class="btn btn-danger"  style="font-size: 15px;">Not Completed</div>
                                  @else
                                    <div class="btn btn-success"  style="font-size: 15px;">Completed</div>
                                  @endif
                            </div>
                        </div>

                    </div>
                    </div>
                </div>
            </div>
               
            @endif
            @endforeach
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>
@endforeach

@endsection

