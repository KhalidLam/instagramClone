@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        {{-- Main section --}}
        <div class="col-md-8 pt-3 px-2 border bg-white">
            
            @foreach ($posts as $post)
                <div class="mb-5 p-0 border border-dark" style="height: 600px">
                    <a href="/p/{{ $post->id }}">
                        <img src="{{ asset("storage/$post->image") }}" class="w-100 h-100" alt="post image" style="object-fit:cover">
                    </a>
                    <p class="h4">{{ $post->caption }}</p>
                </div>
            @endforeach

            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
            
        </div>

        {{-- Aside Section --}}
        <div class="col-md-4 py-3 border bg-white">
            <div class=" ">
                <h1>{{ auth()->user()->username }}</h1>
            </div>
        </div>


    </div>

</div>
@endsection
