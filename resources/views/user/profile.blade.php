@extends('layouts.app')

@section('content')
<div class="block">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <form action="{{ url("/update/profile") }}" method="post">
                    @csrf
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
                            <div class="mt-2">
                                <div>
                                    <input type="date" class="form-control" name="dob" value="{{ $user->dob }}" required>
                                </div>
                            </div>
                            <div class="mt-2">
                                <div>
                                    <input type="radio" name="gender" value="Nam" <?php iF($user->gender == 'Nam') echo 'checked' ?>>Nam
                                    <input type="radio" name="gender" value="Nữ" <?php iF($user->gender == 'Nữ') echo 'checked' ?>>Nữ
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="pt-4 pb-3" style="border-top: 1px solid #000">
                                <span class="font-weight-bold font-italic">Email</span>
                                <div><input type="text" class="form-control" name="email" value="{{ $user->email }}" required></div>
                            </div>
                            <div class="pt-4" style="border-top: 1px solid #000">
                                <span class="font-weight-bold font-italic">Description</span>
                                <div>
                                        <textarea class="form-control" style="resize: none;" name="description" rows="5" required>{{ $user->description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type='submit'>SAVE</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
