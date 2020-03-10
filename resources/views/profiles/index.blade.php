@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-3 p-5">
        <img src="{{ asset('img/img1.jpg')}}" class="rounded-circle">
        </div>

        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <a href="/p/create">Add New Post</a>
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>22,523</strong> posts</div>
                <div class="pr-5"><strong>51,7m</strong> followers</div>
                <div class="pr-5"><strong>30</strong> following</div>
            </div> 
             <div class="pt-4 font-weight-bold ">{{--9GAG: Go Fun The World--}} {{ $user->name }}</div> 
            <div>
                {{-- 🌟 Get our app for the latest and funniest MEMES and VIDEOS 👉🏻@9gagmobile
                <br>
                -
                <br>
                Get your hamster tissue box cover 🐹 by @takemymoney👇🏻 --}}
                {{ $user->profile->bio }}
            </div>
            <div class="font-weight-bold"> 
                <a href="{{ $user->profile->website }}" target="_blanc">
                    {{-- https://bit.ly/hamsterbox --}} {{ $user->profile->website }}
                </a> 
            </div>
        
        </div>
    </div>

    <div class="row pt-5">
        @foreach ( $user->posts as $post)
            <div class="col-4 col-md-4 align-self-stretch">
                <img src="/storage/{{ $post->image }}" class="w-100 h-100" style="max-height: 296px">
            </div>
        @endforeach
        
    </div>
</div>
@endsection
