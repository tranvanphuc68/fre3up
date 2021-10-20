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
                            <div class="paragraph__content-container">
                                <div class="paragraph__timeline" style="padding: 0px;">
                                    <div class="paragraph__timeline__container">
                                        @method('PUT')
                                        @csrf
                                        @foreach ($data as $detail)
                                            @if ($detail->status == 0)
                                                <div class="paragraph__timeline__entry --entry-1 --is-pending">
                                                    <span></span>
                                                    <div class="paragraph__timeline__content-container">
                                                        <div class="paragraph__timeline__content">
                                                            <div class="paragraph__timeline__title">
                                                                <input type="text" class="form-control input-lg" name ="content{{ $detail->id }}" id="content{{ $detail->id }}" required value="{{$detail->content}}">
                                                            </div>
                                                            <div class="paragraph__timeline__date-time">
                                                                <div class="paragraph__timeline__date">
                                                                    <input type="date" class="form-control input-lg" name="date{{ $detail->id }}" id="date{{ $detail->id }}" required value="{{$detail->date}}">
                                                                </div>
                                                            </div>
                                                            <div class="paragraph__timeline__info">
                                                                <input type="text" class="form-control input-lg" name ="addition{{ $detail->id }}" id="addition{{ $detail->id }}" required value="{{$detail->addition}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="paragraph__timeline__entry --entry-1 --is-completed">
                                                    <span></span>
                                                    <div class="paragraph__timeline__content-container">
                                                        <div class="paragraph__timeline__content">
                                                            <div class="paragraph__timeline__title">
                                                                <input type="text" class="form-control input-lg" name ="content{{ $detail->id }}" id="content{{ $detail->id }}" required value="{{$detail->content}}">
                                                            </div>
                                                            <div class="paragraph__timeline__date-time">
                                                                <div class="paragraph__timeline__date">
                                                                    <input type="date" class="form-control input-lg" name="date{{ $detail->id }}" id="date{{ $detail->id }}" value="{{$detail->date}}">
                                                                </div>
                                                            </div>
                                                            <div class="paragraph__timeline__info">
                                                                <input type="text" class="form-control input-lg" name ="addition{{ $detail->id }}" id="addition{{ $detail->id }}" required value="{{$detail->addition}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: right;">
                                <button type="submit" class="btn btn-info btn-lg">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

