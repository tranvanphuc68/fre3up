@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/timeline1.css')}}">
<div class="block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">{{ $process->name}}
                            <button type="button" data-toggle="modal" data-target="#edit"> <i class="fas fa-edit"></i></button>
                    </div>
                    <div class="card-body">
                      {{-- <div>
                        {{-- <form action="{{ url("/process/edit/{$process->id}")}}" method="post">
                        @csrf
                          <label for="theme">Choose type:</label>
                          <select name="theme" id="theme">
                            <option value="0" <?php echo ($process->theme == 0) ? 'selected':'' ?> >Todo list</option>
                            <option value="1" <?php echo ($process->theme == 1) ? 'selected':'' ?>>Timeline</option>
                          </select>
                              <button type="submit">Select</button>
                          </form>
                      </div> --}}
                        <a href="{{ url("/detail_process/edit/$id_process") }}" class="btn btn-info btn-lg">
                          <i class="fas fa-edit"></i>
                        </a>
                        @include('process.timeline1')
                        <form method="POST">
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#create">
                                <i class="fas fa-plus"></i>
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
                  <input type="text" name="content" id="content" class="form-control form-control-lg" required>
              </div>
              <div>
                  <label for="name">Date:</label>
                  <input type="date" name="date" id="date" class="form-control form-control-lg" required>
              </div>
              <div>
                  <label for="name">Addition:</label>
                  <input type="text" name="addition" id="addition" class="form-control form-control-lg">
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
  <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
      <div class="modal-dialog">
          <form action="{{ url("rename/process/{$id_process}")}} " method="post">
          @csrf
        <div class="modal-content form-group">
          <div class="modal-header">
            <h5 class="modal-title" id="editLabel">EDIT PROCESS NAME</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div>
                  <label for="name">Name:</label>
                  <input type="text" name="name" id="name" class="form-control form-control-lg" required value="{{ $process->name}}">
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

    <script>
        function updateStatus(id){
            let check = document.getElementById(id)
            let status = check.getAttribute('value')
            //console.log(status)
            $.ajax({
              url: "{{ url('/update/detail_process/') }}"+"/"+id,
              method: 'POST',
              data: {
			    _token: "{{ csrf_token() }}",
			    status: status
		        },
              success: function(res) {

              },
              error: function(err) {
                  console.error(err)
              }
            })
            console.log(check)
            if( status == 0){
                check.setAttribute('value',1)
                document.getElementById("btn"+id).classList.add("btn-success")
                document.getElementById("btn"+id).classList.remove("btn-danger")
                document.getElementById("btn"+id).textContent = "Complete"
                document.getElementById("style"+id).classList.add("--is-pending")
                document.getElementById("style"+id).classList.remove("--is-completed")
            }
            else {
                check.setAttribute('value',0)
                document.getElementById("btn"+id).classList.remove("btn-success")
                document.getElementById("btn"+id).classList.add("btn-danger")
                document.getElementById("btn"+id).textContent = "Cancel"
                document.getElementById("style"+id).classList.remove("--is-pending")
                document.getElementById("style"+id).classList.add("--is-completed")
            }
        }


    </script>
@endsection

