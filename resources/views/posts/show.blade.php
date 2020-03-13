@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center align-items-center" style="min-height: 80vh">
        <div class="row border bg-white w-100">
            
            {{-- Post Image --}}
            <div class="col-md-8 p-0">
                <img src="{{ asset("storage/$post->image") }}" class="w-100">                        
            </div>
    
            {{-- Post Info --}}
            <div class="col-md-4 border-left">

                {{-- User Info --}}
                <div class="row p-2 border-bottom align-items-stretch">
                    
                    <div class="col-md-2 p-1 px-2 " style="height: 60px">
                        <a href="/profile/{{ $post->user->username }}">
                            <img class="rounded-circle border h-100" src="{{ asset('storage') .'/'. $post->user->profile->getProfileImage() }}" alt="profile image">
                        </a>
                    </div>

                    <div class="col-md-10 d-flex px-4 align-items-center">
                        
                        <a href="/profile/{{ $post->user->username }}" class="text-black pr-2">
                            <span class="text-dark">{{ $post->user->username }}</span>
                        </a>
                        -
                        <a href="#" class="text-black pl-2">
                            <span class="text-dark"> Following</span>
                        </a>
                            
                      
                    </div>

                </div>

                {{-- Description --}}
                <div>
                    <p> {{ $post->caption }} </p>
                </div>

            </div>
        
        </div>
    </div>

</div>
@endsection
