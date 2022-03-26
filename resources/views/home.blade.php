@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/timeline1.css')}}">
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
                        <div class="col-lg-3" data-toggle="modal" data-target="#exampleModal{{$process->id}}">
                                <div class="item" style="background-image: linear-gradient(to right,#ce4ece,#e2e6ab); padding:20px;">
                                    <div style="text-align: center;" >{{ $process->name }}</div>
                              </div>

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
                    <div class="paragraph__content-container">
                        <div class="paragraph__timeline">
                            <div class="paragraph__timeline__container">
                                @foreach ($data as $item)
                                    @if ($item->id_process == $process->id)
                                        @if ($item->status == 0)
                                            <div class="paragraph__timeline__entry --entry-1 --is-pending">
                                                <span></span>
                                                <div class="paragraph__timeline__content-container">
                                                    <div class="paragraph__timeline__content">
                                                        <div class="paragraph__timeline__title">{{ $item->content }}</div>
                                                        <div class="paragraph__timeline__info">
                                                            @if (substr($item->addition,0,4) == 'http')
                                                                <a href="{{$item->addition}}" style="font-style: italic;">Addition</a>
                                                            @else
                                                                <div> {{$item->addition}} </div>
                                                            @endif
                                                        </div>
                                                        <div>
                                                            <div class="paragraph__timeline__name d-flex" style="align-items: center; justify-content:space-between;">
                                                                <div class="btn btn-danger"  style="font-size: 15px;">Not Completed</div>
                                                            </div>
                                                        </div>
                                                        <div class="paragraph__timeline__date-time">
                                                            <span class="paragraph__timeline__date">{{ date('d/m/Y', strtotime($item->date)) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="paragraph__timeline__entry --entry-1 --is-completed">
                                                <span></span>
                                                <div class="paragraph__timeline__content-container">
                                                    <div class="paragraph__timeline__content">
                                                        <div class="paragraph__timeline__title">{{ $item->content }}</div>
                                                        <div class="paragraph__timeline__info">
                                                            @if (substr($item->addition,0,4) == 'http')
                                                                        <a href="{{$item->addition}}" style="font-style: italic;">Addition</a>
                                                                    @else
                                                                        <div> {{$item->addition}} </div>
                                                                    @endif
                                                        </div>
                                                        <div>
                                                            <div class="paragraph__timeline__name d-flex" style="align-items: center; justify-content:space-between;">
                                                                <div class="btn btn-success"  style="font-size: 15px;">Completed</div>
                                                            </div>
                                                        </div>
                                                        <div class="paragraph__timeline__date-time">
                                                            <span class="paragraph__timeline__date">{{ date('d/m/Y', strtotime($item->date)) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
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

