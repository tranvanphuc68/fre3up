@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
<link rel="stylesheet" href="{{asset('css/timeline1.css')}}">
<div class="block">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-3">
                <div class="profile">
                    <div>
                        @if ($user->provider != null)
                            <img src="{{ $user->avatar }}" alt="" style="height: 90px; width: 90px; border-radius: 50%; display:inline-block;">
                        @else
                            <img src="{{ asset("/uploads/avatars/$user->avatar") }}" alt="" style="height: 90px; width: 90px; border-radius: 50%; display:inline-block;">
                        @endif
                    </div>
                    <div class="user-name mt-3"><div>{{ $user->name }}</div></div>
                    <div class="user-email mt-4">
                        <span>Email: </span>
                        <span>{{ $user->email }}</span>
                    </div>
                    <div class="user-description mt-4">
                        <span>Description</span>
                        <span>{{ $user->description }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="container">
                <div class="row mb-4">
                    <h1 class="fw-bold">Quiz</h1>
                </div>
                @if ($data->count() != 0)
                <div class="row slider">
                        @foreach ($data as $item)
                        <div>
                            <div class="quiz">
                                <a href="{{ url("/review_quiz/{$item->id}") }}">
                                    <div class="quiz-info">
                                        <!--views -->
                                        <?php $total = 0; ?>
                                        @foreach ( $views as $view)
                                            @if ( $view->id_quiz == $item->id)
                                                <?php  $total = $view->total; ?>
                                                @break
                                            @endif
                                        @endforeach
                                        <div> {{ $total }} <?php echo ($total < 2) ? "view" : "views" ?></div>
                                        <!-- end views -->
                                        <div>{{ $item->number_questions }} <?php echo ($item->number_questions < 2) ? "question" : "questions" ?></div>
                                    </div>
                                    <div class="quiz-info">
                                        <h4>{{ $item->quiz_name }}</h4>
                                    </div>
                                </a>
                                    <div class="quiz-info">
                                        <?php $status = 0;
                                        foreach ( $saved_quiz as $saved){
                                            if($saved->id_user == Auth::user()->id && $saved->id_quiz == $item->id)
                                            { $status = 1;}
                                        } ?>
                                    <div id="{{ $item->id }}" value="{{ $status}}" class="quiz-bookmark <?php echo ($status == 1) ? "bold" :" "?>" onclick="toggleSave({{ $item->id }})">
                                    </div>
                                    </div>
                            </div>
                        </div>
                        @endforeach
                </div>
                @else
                    <div class="nothing-message">Nothing is here</div>
                @endif
                <div class="row mb-4 mt-5">
                    <h1 class="fw-bold">Work list</h1>
                </div>
                    @if ($data->count() != 0)
                    <div class="row slider">
                        @foreach ($all_process as $process)
                        @if ($process->id_user == $user->id)
                            <div class="col-md-12">
                            <div data-toggle="modal" data-target="#exampleModal{{$process->id}}">
                                <div class="work-list">
                                    <div class="work-list-name">
                                        <h4>{{ $process->name }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    @else
                        <div class="nothing-message">Nothing is here</div>
                    @endif
                </div>
                </div>
            </div>
        </div>
</div>

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
                            @foreach ($details as $item)
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
            integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
            integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
            crossorigin="anonymous"></script>
        <script>
            @if (Auth::check())
                document.getElementsByClassName("dropdown-item")[3].classList.add("active-menu")
            @endif
            function toggleSave(id) {
                var icon = document.getElementById(id)
                icon.classList.toggle('bold')
                saved_status = icon.getAttribute('value')
                    if (saved_status == 0) {
                        $('#'+id).attr("value", "1")
                        $.ajax({
                        url: "{{ url('/saved_quiz/') }}"+"/"+id,
                        method: 'GET',
                        success: function(res) {
                            $('#none').text(res)
                        },
                        error: function(err) {
                            console.error(err)
                        }
                        })
                    }
                    else {
                        $('#'+id).attr("value", "0")
                        $.ajax({
                        url: "{{ url('/unsaved_quiz/') }}"+"/"+id,
                        method: 'GET',
                        success: function(res) {
                            $('#none').text(res)
                        },
                        error: function(err) {
                            console.error(err)
                        }
                        })
                    }

                }

            $('.slider').slick({
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            arrows: false
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false
                        }
                    }
                ]
            });
        </script>
@endsection
