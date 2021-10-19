@extends('layouts.app')

@section('content')
<div class="block">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#exampleModal">
                    CREATE
                </button>
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">

                    @foreach ($all_process as $process)
                        <div class="col-md-3" >
                                <div class="item" style="background-image: linear-gradient(to right,#1ABCF4,#5DEFB8); border-radius:50%;">
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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ url('/process') }}" method="post">
        @csrf
      <div class="modal-content form-group">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">CREAT A NEW PROCESS</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="paragraph__timeline__entry --entry-1 --is-pending">
                <span></span>
                <div class="paragraph__timeline__content-container">
                    <div class="paragraph__timeline__content">
                        <div class="paragraph__timeline__title">aaaa</div>
                        <div class="paragraph__timeline__info">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                        <div class="paragraph__timeline__date-time">
                            <span class="paragraph__timeline__date">bbbb</span>
                        </div>
                    <div>
                        <div class="paragraph__timeline__name d-flex" style="align-items: center; justify-content:space-between;">

                            <div>
                                <form action="{{ url("/update/detail_process/{/}")}}" method="post">
                                    @csrf
                                    <input type="hidden" name="" value="1">
                                    <button type="submit" class="btn btn-primary"  style="font-size: 15px;">
                                        Completed
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                    </div>
                </div>
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
@endforeach

@endsection

