@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
<div class="block" style="padding-top: 60px;">
    <div class="banner" style="background-image: url('{{ asset('uploads/Back.png') }}');">
        <div class="row">
            <div class="col-md-8">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facere, totam, ut maxime optio
                    exercitationem repellat eligendi fuga consectetur unde ullam assumenda voluptas cupiditate nobis,
                    reprehenderit saepe tenetur nostrum? Perspiciatis, explicabo?</p>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <div class="container">
        <h1 style="margin: 3%;"><b>
            @if ( isset($_GET['search']) )
                Search results
            @else
                Best This Month
            @endif </b></h1>
        <div class="row slider">
            <?php $count = count($data); ?>
            @foreach ($data as $item)
            <div class="col-md-12">
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
                                    <div>  <?php echo $total > 1 ? $total." views" :  $total." view" ?></div>
                                    <!-- end views -->
                                <div>{{ $item->number_questions }} questions</div>
                            </div>
                            <div class="quiz-info">
                                <h4>{{ $item->quiz_name }}</h4>
                            </div>
                        </a>
                        <div class="quiz-info">
                            <a href="{{ url("/users/{$item->id_user}") }}"><div>{{ $item->name }}</div></a>
                            <?php $status = 0;
                                foreach ( $saved_quiz as $saved){
                                    if($saved->id_user == Auth::user()->id && $saved->id_quiz == $item->id)
                                    { $status = 1;}
                                } ?>
                            @auth
                                <div id="{{ $item->id }}" class="quiz-bookmark <?php echo ($status == 1) ? "bold" :" "?>" value="{{ $status }}" onclick="toggleSave({{ $item->id }})">
                                </div>
                            @endauth
                        </div>
                    </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

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
                           console.log(res)

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
                            console.log(res)
                        },
                        error: function(err) {
                            console.error(err)
                        }
                        })
                    }

                }

                //load saved quiz
                // function load_saved_quiz(){
                //     var count = {{ $count }}
                //     for (var i=0; i < count; i++){
                //     var bookmark = document.getElementsByClassName('quiz-bookmark')[i];
                //         if(bookmark.getAttribute('value') == 1){
                //         bookmark.classList.add('bold')
                //         }
                //     }
                // }

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

