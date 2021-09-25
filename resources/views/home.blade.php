@extends('layouts.app')

@section('content')
<div class="block">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias vel perspiciatis in quam quibusdam suscipit ipsa numquam. Commodi odit modi magnam eveniet iure qui consequatur aut, fugit earum est quos?</div>
                    <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias vel perspiciatis in quam quibusdam suscipit ipsa numquam. Commodi odit modi magnam eveniet iure qui consequatur aut, fugit earum est quos?</div>
                    <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias vel perspiciatis in quam quibusdam suscipit ipsa numquam. Commodi odit modi magnam eveniet iure qui consequatur aut, fugit earum est quos?</div>
                    <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias vel perspiciatis in quam quibusdam suscipit ipsa numquam. Commodi odit modi magnam eveniet iure qui consequatur aut, fugit earum est quos?</div>
                    <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias vel perspiciatis in quam quibusdam suscipit ipsa numquam. Commodi odit modi magnam eveniet iure qui consequatur aut, fugit earum est quos?</div>
                    <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias vel perspiciatis in quam quibusdam suscipit ipsa numquam. Commodi odit modi magnam eveniet iure qui consequatur aut, fugit earum est quos?</div>
                    <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias vel perspiciatis in quam quibusdam suscipit ipsa numquam. Commodi odit modi magnam eveniet iure qui consequatur aut, fugit earum est quos?</div>
                    <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias vel perspiciatis in quam quibusdam suscipit ipsa numquam. Commodi odit modi magnam eveniet iure qui consequatur aut, fugit earum est quos?</div>
                    <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias vel perspiciatis in quam quibusdam suscipit ipsa numquam. Commodi odit modi magnam eveniet iure qui consequatur aut, fugit earum est quos?</div>
                    <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias vel perspiciatis in quam quibusdam suscipit ipsa numquam. Commodi odit modi magnam eveniet iure qui consequatur aut, fugit earum est quos?</div>
                    <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias vel perspiciatis in quam quibusdam suscipit ipsa numquam. Commodi odit modi magnam eveniet iure qui consequatur aut, fugit earum est quos?</div>
                    <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias vel perspiciatis in quam quibusdam suscipit ipsa numquam. Commodi odit modi magnam eveniet iure qui consequatur aut, fugit earum est quos?</div>
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
