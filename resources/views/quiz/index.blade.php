@extends('layouts.app')
@section('content')
<div class="block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Your Quiz To People') }}</div>
    
                    <div class="card-body">
                       
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#exampleModal">
                            CREATE
                        </button>
                          
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="post">
      <div class="modal-content form-group">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ABOUT YOUR QUIZ</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
            <div>
                <label for="">Subject: </label>
                <input type="text" name="" id="" class="form-control form-control-lg">
            </div>
            <div>
                <label for="">Number of questions: </label>
                <input type="text" name="" id="" class="form-control form-control-lg">
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