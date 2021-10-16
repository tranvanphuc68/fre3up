@extends('layouts.app')

@section('content')
<div class="block">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('User') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <div class="mt-2">
                                @if ($user->provider != null)
                                    <img src="{{ $user->avatar }}" alt="" style="height: 90px; width: 90px; border-radius: 50%; display:inline-block;">
                                @else
                                    <img src="{{ asset("/uploads/avatars/$user->avatar") }}" alt="" style="height: 90px; width: 90px; border-radius: 50%; display:inline-block;">
                                @endif
                            </div>
                            <div class="font-weight-bold mt-2">{{ $user->name }}</div>
                            <div class="mt-2">{{ $user->dob }}</div>
                            <div class="mt-2">{{ $user->gender }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="pt-4 pb-3" style="border-top: 1px solid #000">
                                <span class="font-weight-bold font-italic">Email</span>
                                <div>{{ $user->email }}</div>
                            </div>
                            <div class="pt-4" style="border-top: 1px solid #000">
                                <span class="font-weight-bold font-italic">Description</span>
                                <div>{{ $user->description }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
</div>
@endsection
