@extends('layouts.app')
@section('content')
<div class="block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Your Process') }}</div>
                    <div class="card-body">
                        
                        @csrf
                        @foreach ($data as $detail)
                              <div>
                                  Content: {{ $detail->content }}  
                                  Date: {{ $detail->date }}
                                  <form action="">
                                    <label for="check"> Done</label>
                                    <input type="checkbox" id="check" name="check" value="1">
                                  </form>
                                  <a href="#" data-toggle="modal" data-target="#edit{{$detail->id}}">
                                    <i class="fas fa-edit"></i>
                                  </a>
                                  <a href="javascript:void(0)" onclick="if (confirm('Bạn có chắc muốn xóa không?')) document.getElementById('delete-{{ $detail->id }}').submit()">
                                    <i class="fas fa-trash-alt"></i>
                                  </a>
                              </div>
                          <form method="POST" id="delete-{{ $detail->id }}" action="{{ url("/detail_process/{$detail->id}") }}" >
                            @method('DELETE')
                            @csrf
                          </form>         
                        @endforeach
                        <form method="POST">
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#create">
                                ADD CONTENT
                            </button>
                        </form>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
  <!--create -->
  <div class="modal fade" id="create" tabindex="-1" aria-labelledby="createLabel" aria-hidden="true">
      <div class="modal-dialog">
          <form action="{{ url("/detail_process/{$id_process}") }}" method="post">
          @csrf
        <div class="modal-content form-group">
          <div class="modal-header">
            <h5 class="modal-title" id="createLabel">CREAT A NEW CONTENT</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div>
                  <label for="content">Content:</label>
                  <input type="text" name="content" id="content" class="form-control form-control-lg">
              </div>
              <div>
                  <label for="name">Date:</label>
                  <input type="date" name="date" id="date" class="form-control form-control-lg">
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
<!--edit -->
@foreach ($data as $detail)
<div class="modal fade" id="edit{{ $detail->id }}" tabindex="-1" aria-labelledby="edit{{ $detail->id }}Label" aria-hidden="true">
  <div class="modal-dialog">
      <form action="{{ url("/detail_process/edit/$id_process") }}" method="post">
      @csrf
        <div class="modal-content form-group">
          <div class="modal-header">
            <h5 class="modal-title" id="edit{{ $detail->id }}Label">EDIT CONTENT</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div>
                  <label for="content{{$detail->id}}">Content:</label>
                  <input type="text" name="content{{$detail->id}}" id="content{{$detail->id}}" class="form-control form-control-lg" value ="{{ old("content$detail->id",$detail->content)}}">
              </div>
              <div>
                  <label for="date">Date:</label>
                  <input type="date" name="date{{$detail->id}}" id="date{{$detail->id}}" class="form-control form-control-lg" value ="{{ old("date$detail->id",$detail->date)}}">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
    </form>
  </div>
</div>
@endforeach
@endsection