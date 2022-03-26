@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
<div class="block">

<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <h1 class="fw-bolder mb-4">Users</h1>
            <form action="{{ url('/users') }}" method="get">
                <div class="d-flex">
                    <input class="search-users" type="text" placeholder="Type name or email" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];} ?>">
                    <button class="search-users-btn"><i class="fa fa-search"></i></button>
                </div>
            </form>
            <table class="users-table mt-4">
                <div>
                    <thead>
                    <tr>
                        <th class="w-30">Name</th>
                        <th class="w-45">Email</th>
                        <th class="w-20">Role</th>
                        <th class=""></th>
                    </tr>
                </thead>
                </div>
                
                <tbody>
                    @foreach ($data as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td><a href="{{ url("/users/{$user->id}") }}"><i class="fa fa-eye"></i></a></td>
                                </tr> 
                    @endforeach
                </tbody>
            </table>
            {{ $data->links('') }}
        </div>
    </div>
</div>

</div>
@endsection
