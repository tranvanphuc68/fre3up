@extends('layouts.app')

@section('content')
<div class="block">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Users') }}</div>

                <div class="card-body">
                    <div class="container">
                        <form action="{{ url('/users') }}" method="get">
                            <div class="row mt-3">
                                    <div class="simple-search">
                                        <input type="text" placeholder="Type email or name" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];} ?>"/>
                                        <button><i class="fa fa-search"></i></button>
                                    </div>
                        </div>
                        </form>
                    </div>
                        <table class="table table-striped table-dark mt-4">
                            <thead>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th></th>
                            </thead>
                            <tbody>
                            @foreach ($data as $user)
                                
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td><a href="{{ url("/users/{$user->id}") }}"><i class="fal fa-eye sidebar-icon"></i></a></td>
                                </tr>
                                
                            @endforeach
                            </tbody>
                        </table>
                        {{ $data->links('') }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
