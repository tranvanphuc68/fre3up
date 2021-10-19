@extends('layouts.app')
@section('content')
<div class="block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Your Process') }}</div>

                      <div class="card-body">
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#exampleModal">
                            CREATE
                        </button>
                        <div class="row">
                          @foreach ($data as $process)
                                <div class="col-lg-3">
                                  <a href="{{ url("/detail_process/{$process->id}") }}">
                                    <div class="item" style="background-image: linear-gradient(to right,#ce4ece,#e2e6ab);">
                                        <div class="e-flex-content">{{ $process->name }}</div>
                                    </div>
                                  </a>
                                  <a href="javascript:void(0)" onclick="if (confirm('Bạn có chắc muốn xóa không?')) document.getElementById('delete-{{ $process->id }}').submit()">
                                      <i class="fal fa-calendar sidebar-icon"></i>
                                  </a>
                                <form method="POST" id="delete-{{ $process->id }}" action="{{ url("/process/{$process->id}") }}" >
                                  @method('DELETE')
                                  @csrf
                                </form>
                                </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
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
          <div>
              <label for="name">Process: </label>
              <input type="text" name="name" id="name" class="form-control form-control-lg">
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
