@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 1100px;">

    <div class="row justify-content-center align-items-center" style="min-height: 80vh">

        <div class="card w-100">
            <div class="row no-gutters" style="height: 598px;">

                <!-- Card Image -->
                <div class="col-md-8 h-100">
                    <img src="{{ asset("storage/$post->image") }}" class="w-100 h-100">
                </div>

                <div class="col-md-4 h-100">
                    <div class="d-flex flex-column h-100">

                        <!-- Card Header -->
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <a href="/profile/{{$post->user->username}}" style="width: 32px; height: 32px;">
                                    <img src="{{ asset('storage') .'/'. $post->user->profile->getProfileImage() }}" class="rounded-circle w-100">
                                </a>
                                <a href="/profile/{{$post->user->username}}" class="my-0 ml-3 text-dark text-decoration-none">
                                    <strong> {{ $post->user->name }}</strong>
                                </a>
                                <p class="my-0 ml-1 text-dark"> <strong> - Following </strong></p>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body px-2" style="overflow-y: auto; overflow-x: hidden;">

                            <!-- Post Caption  -->
                            <div class="row">
                                <div class="col-2">
                                    <a href="/profile/{{$post->user->username}}">
                                        <img src="{{ asset('storage') .'/'. $post->user->profile->getProfileImage() }}" class="rounded-circle w-100">
                                    </a>
                                </div>
                                <div class="col-10 pl-0">
                                    <p class="m-0 text-dark">
                                        <a href="/profile/{{$post->user->username}}" class="my-0 text-dark text-decoration-none">
                                            <strong> {{ $post->user->name }}</strong>
                                        </a>
                                        expanding crochet⠀📹@littlebluehook⠀
                                        -⠀
                                        #scheepjeswip #9gag #snufflebeanyarn #crochet
                                    </p>
                                </div>
                            </div>

                            {{-- Comments --}}
                            @foreach ($post->comments as $comment)
                                <div class="row my-3">
                                    <div class="col-2">
                                        <a href="/profile/{{$comment->user->username}}">
                                            <img src="{{ asset('storage') .'/'. $comment->user->profile->getProfileImage() }}" class="rounded-circle w-100">
                                        </a>
                                    </div>
                                    <div class="col-10 pl-0">
                                        <p class="m-0 text-dark">
                                            <a href="/profile/{{$comment->user->username}}" class="my-0 text-dark text-decoration-none">
                                                <strong> {{ $comment->user->name }}</strong>
                                            </a>
                                            {{ $comment->body }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Card Footer -->
                        <div class="card-footer align-self-end w-100 p-0 border-top-0">
                            <!-- Post State -->
                            <div class="py-2 px-3 border">
                                <div class="d-flex flex-row">
                                    <button type="submit" class="btn pl-0">
                                        <i class="far fa-heart fa-2x"></i>
                                    </button>
                                    <button name="msg" value="0" type="submit" class="btn">
                                        <i class="far fa-comment fa-2x"></i>
                                    </button>
                                    <button type="submit" class="btn">
                                        <svg aria-label="Share Post" class="_8-yf5 " fill="#262626" height="24" viewBox="0 0 48 48" width="24"><path d="M47.8 3.8c-.3-.5-.8-.8-1.3-.8h-45C.9 3.1.3 3.5.1 4S0 5.2.4 5.7l15.9 15.6 5.5 22.6c.1.6.6 1 1.2 1.1h.2c.5 0 1-.3 1.3-.7l23.2-39c.4-.4.4-1 .1-1.5zM5.2 6.1h35.5L18 18.7 5.2 6.1zm18.7 33.6l-4.4-18.4L42.4 8.6 23.9 39.7z"></path></svg>
                                    </button>
                                </div>
                                <p class="m-0"><strong>{{ $post->likes }} likes</strong></p>
                                <p class="m-0"><small class="text-muted">{{ strtoupper($post->created_at->diffForHumans()) }}</small></p>
                            </div>

                            <!-- Add Comment -->
                            <form action="{{ action('CommentController@store') }}" method="POST">
                                @csrf
                                <div class="form-group mb-0 text-muted">
                                    <div class="input-group is-invalid">
                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                        <textarea class="form-control py-2 px-3" id="body" name='body' rows="1" placeholder="Add a comment..."></textarea>
                                        <div class="input-group-append">
                                            <button class="btn btn-md btn-outline-info" type="submit">Post</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection
