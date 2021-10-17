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
                        <div class="col-md-3" >
                                <div class="item" style="background-image: linear-gradient(to right,#1ABCF4,#5DEFB8);">
                                    <div class="e-flex-content" >{{ $process->name }}</div>
                              </div>
                            <a href="{{ url("/detail_process/{$process->id}") }}">
                                    <i class="fas fa-edit"></i>
                            </a>
                            <div id="timeline" style="display: none;">
                              <table  class="table table-bordered table-hover">
                                <thead>
                                  <td>Content</td>
                                  <td>Date</td>
                                  <td>Status</td>
                                </thead>
                                @csrf
                                  @foreach ($data as $detail)
                                    @if ($detail->id_process == $process->id)
                                    <tr>
                                    <td style="width: 60%">{{ $detail->content }}</td>
                                    <td style="width: 20%, text-align:center">{{ date('d/m/Y', strtotime($detail->date)) }}</td>
                                    <td style="width: 10%">
                                      @switch($detail->status)
                                          @case(0)
                                            Pending
                                            @break
                                          @case(1)
                                              In Progress
                                              @break
                                          @default
                                            Completed
                                        @endswitch
                                    </td>
                                  </tr>
                                    @endif
                                  @endforeach
                                </table>  
                            </div>
                          </div>
                      @endforeach
                    </div>
                   
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
  </div>
</div>


@endsection

