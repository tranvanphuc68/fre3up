@extends('layouts.app')

@section('content')
<div class="block">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('User') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <div class="mt-2">
                                @if ($user->provider != null)
                                    <img src="{{ $user->avatar }}" alt="" style="height: 90px; width: 90px; border-radius: 50%; display:inline-block;">
                                @else
                                    <img src="{{ asset("/uploads/avatars/$user->avatar") }}" alt="" style="height: 90px; width: 90px; border-radius: 50%; display:inline-block;">
                                @endif
                            </div>
                            <div class="font-weight-bold mt-2">{{ $user->name }}</div>
                            <div class="mt-2">{{ $user->dob }}</div>
                            <div class="mt-2">{{ $user->gender }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="pt-4 pb-3" style="border-top: 1px solid #000">
                                <span class="font-weight-bold font-italic">Email</span>
                                <div>{{ $user->email }}</div>
                            </div>
                            <div class="pt-4" style="border-top: 1px solid #000">
                                <span class="font-weight-bold font-italic">Description</span>
                                <div>{{ $user->description }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5" style="border-top: 1px dashed #000">

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
          <a href="{{ url("/duplicate/{$process->id}") }}"><button type="button" class="btn btn-secondary" >Copy</button></a>
        </div>
      </div>
    </div>
  </div>
@endforeach
@endsection
