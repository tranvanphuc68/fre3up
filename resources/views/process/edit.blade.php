@extends('layouts.app')
@section('content')
<div class="block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Your Process') }}</div>
                    <div class="card-body">
                        
                        <form method="POST" action="{{ url("/detail_process/edit/$id_process") }}" >
                            <table class="table table-bordered">
                                <thead>
                                    <td>Content</td>
                                    <td>Date</td>
                                    <td>Status</td>
                                </thead>
                            @method('PUT')
                            @csrf
                            @foreach ($data as $detail)
                              <tr>
                                <td>
                                    <input type="text" name ="content{{ $detail->id }}" id="content{{ $detail->id }}" require value="{{$detail->content}}">
                                </td>
                                <td>
                                    <input type="date" name="date{{ $detail->id }}" id="date{{ $detail->id }}" value="{{$detail->date}}">
                                </td>           
                                <td class="w15">
                                  <input type="radio" id="status{{ $detail->id }}_0" name="status{{ $detail->id }}" value="0" <?php echo ($detail->status == 0) ? 'checked' : '' ?>>
                                  <label for="status{{ $detail->id }}_0">Pending</label>
                                  <input type="radio" id="status{{ $detail->id }}_1" name="status{{ $detail->id }}" value="1" <?php echo ($detail->status == 1) ? 'checked' : '' ?>>
                                  <label for="status{{ $detail->id }}_1">in Progress</label>
                                  <input type="radio" id="status{{ $detail->id }}_2" name="status{{ $detail->id }}" value="2" <?php echo ($detail->status == 2) ? 'checked' : '' ?>>
                                  <label for="status{{ $detail->id }}_2">Completed</label>
                                </td>                              
                              </tr>
                            @endforeach
                            </table>
                            <div>
                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#create">
                                    ADD CONTENT
                                </button>
                            <button type="submit" class="btn btn-info btn-lg">Save</button>
                            </div>
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
          <form action="{{ url("/detail_process/{$id_process}")}} " method="post">
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

@endsection

