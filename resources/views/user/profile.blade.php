@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                    <div class="user-name mt-3">
                        <div>{{ $user->name }}</div>
                    </div>
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
                        <div class="d-flex flex-row justify-content-between">
                            <h1 class="fw-bolder">Quiz</h1>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#editProfile" class="btn btn-primary pl-4 pr-4 fs-4">Edit profile</button>
                        </div>
                    </div>
                    @if ($data->count() != 0)
                    <div class="row slider">
                        @foreach ($data as $item)
                        <div>
                            <div class="quiz">
                                <a href="{{ url("/review_quiz/{$item->id}") }}">
                                    <div class="quiz-info">
                                        <div>500 views</div>
                                        <div>{{ $item->number_questions }} questions</div>
                                    </div>
                                    <div class="quiz-info">
                                        <h4>{{ $item->quiz_name }}</h4>
                                    </div>
                                </a>
                                <div class="quiz-info">
                                    <div id="{{ $item->id }}" class="quiz-bookmark" onclick="toggleSave({{ $item->id }}, 1)">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="mb-4">Nothing.</div>
                    @endif

                    <!-- work list -->
                    <div class="row mb-4 mt-5">
                        <h1 class="fw-bolder">Work list</h1>
                    </div>
                    @if ($data->count() != 0)
                    <div class="row slider">
                        @foreach ($all_process as $process)
                        <div class="col-md-12">
                            <div data-toggle="modal" data-target="#exampleModal{{$process->id}}">
                                <div class="work-list">
                                    <div class="work-list-name">
                                        <h4>{{ $process->name }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="mb-4">Nothing.</div>
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
                <a href="{{ url("/duplicate/{$process->id}") }}"><button type="button" class="btn btn-secondary">Copy</button></a>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Edit profile -->
<!-- Modal -->
<div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bolder" id="exampleModalLabel">Edit your profile</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url("/update/profile") }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 text-center">
                                <div class="mt-2">
                                    @if ($user->provider != null)
                                    <img src="{{ $user->avatar }}" alt="" style="height: 90px; width: 90px; border-radius: 50%; display:inline-block;">
                                    @else
                                    <img src="{{ asset("/uploads/avatars/$user->avatar") }}" alt="" style="height: 90px; width: 90px; border-radius: 50%; display:inline-block;">
                                    @endif
                                </div>
                                <div class="font-weight-bold mt-2">{{ $user->name }}</div>
                                <div class="mt-2">
                                    <div>
                                        <input type="date" class="form-control" name="dob" value="{{ $user->dob }}" required>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <div>
                                        <input type="radio" name="gender" value="Male" <?php if ($user->gender == 'Male') echo 'checked' ?>>Male
                                        <input type="radio" name="gender" value="Female" <?php if ($user->gender == 'Female') echo 'checked' ?>>Female
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="pb-3" style="border-bottom: 1px solid #000">
                                    <span class="font-weight-bold font-italic">Email</span>
                                    <div><input type="text" class="form-control" name="email" value="{{ $user->email }}" readonly></div>
                                </div>
                                <div class="pt-4 pb-3">
                                    <span class="font-weight-bold font-italic">Description</span>
                                    <div>
                                        <textarea class="form-control" style="resize: none;" name="description" rows="4" required>{{ $user->description }} </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/73fec26af2.js" crossorigin="anonymous"></script>
    <script>
        function toggleSave(id, saved_status) {
            var icon = document.getElementById(id)
            console.log(icon)
            icon.classList.toggle('bold')
            if (saved_status == 0) {

            }
        }

        $('.slider').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [{
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