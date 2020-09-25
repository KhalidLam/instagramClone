@extends('layouts.app')

@section('content')
<div class="container">

    {{-- Post  --}}
    <div class="post">

        <div class="row mt-3">

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
                                        <img src="{{ asset($post->user->profile->getProfileImage()) }}" class="rounded-circle w-100">
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
                                            <img src="{{ asset($post->user->profile->getProfileImage()) }}" class="rounded-circle w-100">
                                        </a>
                                    </div>
                                    <div class="col-10 pl-0">
                                        <p class="m-0 text-dark">
                                            <a href="/profile/{{$post->user->username}}" class="my-0 text-dark text-decoration-none">
                                                <strong> {{ $post->user->name }}</strong>
                                            </a>
                                            {{ $post->caption }}
                                        </p>
                                    </div>
                                </div>

                                {{-- Comments --}}
                                @foreach ($post->comments as $comment)
                                    <div class="row my-3">
                                        <div class="col-2">
                                            <a href="/profile/{{$comment->user->username}}">
                                                <img src="{{ asset($comment->user->profile->getProfileImage()) }}" class="rounded-circle w-100">
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
                                        {{-- Like Btn --}}
                                        <button type="submit" class="btn pl-0">
                                            <i class="far fa-heart fa-2x"></i>
                                        </button>

                                        {{-- Comment Btn --}}
                                        <button name="msg" value="0" type="button" class="btn pl-0">
                                            <i class="far fa-comment fa-2x"></i>
                                        </button>

                                        {{-- <button type="button" class="btn pl-0 pt-0">
                                            <svg aria-label="Share Post" class="_8-yf5 " fill="#262626" height="22" viewBox="0 0 48 48" width="21"><path d="M47.8 3.8c-.3-.5-.8-.8-1.3-.8h-45C.9 3.1.3 3.5.1 4S0 5.2.4 5.7l15.9 15.6 5.5 22.6c.1.6.6 1 1.2 1.1h.2c.5 0 1-.3 1.3-.7l23.2-39c.4-.4.4-1 .1-1.5zM5.2 6.1h35.5L18 18.7 5.2 6.1zm18.7 33.6l-4.4-18.4L42.4 8.6 23.9 39.7z"></path></svg>
                                        </button> --}}

                                        <!-- Share Button trigger modal -->
                                        <button type="button" class="btn pl-0 pt-0" data-toggle="modal" data-target="#sharebtn{{$post->id}}">
                                            <svg aria-label="Share Post" class="_8-yf5 " fill="#262626" height="22" viewBox="0 0 48 48" width="21"><path d="M47.8 3.8c-.3-.5-.8-.8-1.3-.8h-45C.9 3.1.3 3.5.1 4S0 5.2.4 5.7l15.9 15.6 5.5 22.6c.1.6.6 1 1.2 1.1h.2c.5 0 1-.3 1.3-.7l23.2-39c.4-.4.4-1 .1-1.5zM5.2 6.1h35.5L18 18.7 5.2 6.1zm18.7 33.6l-4.4-18.4L42.4 8.6 23.9 39.7z"></path></svg>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="sharebtn{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                            <div class="modal-content">
                                                <ul class="list-group">
                                                    <li class="list-group-item" style="position: absolute; left: -1000px; top: -1000px">
                                                        <input type="text" value="http://localhost:8000/p/{{ $post->id }}" id="copy_{{ $post->id }}" />
                                                    </li>
                                                    <li class="btn list-group-item" data-dismiss="modal" onclick="copyToClipboard('copy_{{ $post->id }}')">Copy Link</li>
                                                    <li class="btn list-group-item" data-dismiss="modal">Cancel</li>
                                                </ul>
                                            </div>
                                            </div>
                                        </div>

                                    </div>

                                    {{-- Post Likes --}}
                                    @if ($post->likes > 0)
                                        <p class="m-0"><strong>{{ $post->likes }} likes</strong></p>
                                    @endif

                                    {{-- Post Date --}}
                                    <p class="m-0"><small class="text-muted">{{ strtoupper($post->created_at->diffForHumans()) }}</small></p>
                                </div>

                                <!-- Add Comment -->
                                <form action="{{ action('CommentController@store') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-0 text-muted">
                                        <div class="input-group is-invalid">
                                            <input type="hidden" name="post_id" value="{{$post->id}}">
                                            <input type="hidden" name="redirect" value="show">
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

    {{-- More Posts --}}
    @if ($posts->count() > 0)

        <hr class="my-5">

        <div class="more">
                <h6 class="text-muted">More posts from
                    <a href="/profile/{{$post->user->username}}" class="text-dark text-decoration-none">
                        <strong> {{ $post->user->name }}</strong>
                    </a>
                </h6>

                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-4 col-md-4 mb-2  align-self-stretch">
                            <a href="/p/{{ $post->id }}">
                                <img class="img rounded" height="300" src="{{ asset("storage/$post->image") }}">
                            </a>
                        </div>
                    @endforeach
                </div>
        </div>
    @endif

</div>
@endsection

@section('exscript')
    <script>
        function copyToClipboard(id) {
            var copyText = document.getElementById(id);
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
        }
    </script>
@endsection
