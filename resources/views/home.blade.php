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
                    @foreach ($data as $process)
                    <div data-toggle="modal" data-target="show{{ $process->id }}">
                        <div class="col-md-3">
                                <div class="item" style="background-image: linear-gradient(to right,#1ABCF4,#5DEFB8);">
                                    <div class="e-flex-content">{{ $process->name }}</div>
                              </div>
                            <a href="{{ url("/detail_process/{$process->id}") }}">
                                    <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    @endforeach
                   
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- <div class="modal fade" id="show{{$process->id}}" tabindex="-1" aria-labelledby="{{ $process->id }}Label" aria-hidden="true">
  <div class="modal-dialog">
        <div class="modal-content form-group">
          <div class="modal-header">
            <h5 class="modal-title" id="{{$process->id}}Label">EDIT CONTENT</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          aaaaaaa
          </div>
          <div class="modal-footer">
            <button  type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button id="edit-btn" type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
    </form>
  </div>
</div> -->
@endsection

