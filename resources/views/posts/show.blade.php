@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8">
            <img src="/storage/{{ $post->image }}" class="w-100">
        </div>
        <div class="col-md-4">
            <a href="#">
                <h1> {{ $post->user->username }} </h1>
            </a>
            <p> {{ $post->caption }} </p>
        </div>
    </div>
</div>
@endsection
