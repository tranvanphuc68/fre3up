@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
<link rel="stylesheet" href="{{asset('css/timeline1.css')}}">
<div class="block">
        <div class="container my-work-list">
          <h1 class="fw-bolder mb-4 mt-5">My Work List</h1>
          <div>
              <div class="btn btn-primary mt-4 mb-4" data-toggle="modal" data-target="#exampleModal">Create</div>
          </div>
          <div class="row">
            @foreach ($data as $process)
              <div class="col-md-3 mt-4">
                <a href="{{ url("/detail_process/{$process->id}") }}">
                  <div class="work-list">
                      <div class="work-list-name">{{ $process->name }}</div>
                  </div>
                </a>
                  <a href="javascript:void(0)" onclick="if (confirm('Bạn có chắc muốn xóa không?')) document.getElementById('delete-{{ $process->id }}').submit()"><i class="fa-regular fa-circle-xmark mt-2"></i></a>
              
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
              <input type="text" name="name" id="name" class="form-control form-control-lg" required>
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
