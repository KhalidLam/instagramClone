<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Title --}}
    <title>{{ config('app.name', 'InstaClone') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">


</head>
<body>
    <div id="app">

        <!-- Header section -->
        <nav class="navbar fixed-top navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <!-- Logo -->
                <a href="{{ url('/') }}" class="navbar-brand">
                    <img src="{{asset('img/cleanlogo.png')}}" alt="InstaClone Logo" >
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar5">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="navbar-collapse collapse justify-content-stretch" id="navbar5">

                    <form action="/search" method="POST" role="search" class="m-auto d-inline w-80">
                        @csrf
                        <div class="input-group">
                            <input class="form-control" name="q" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" style="border-color: #ced4da"><i class="fas fa-search"></i></button>
                        </div>
                    </form>

                    <ul class="navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item px-2 {{ Route::is('post.index') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/') }}">
                                    <i class="fas fa-home fa-2x"></i>
                                </a>
                            </li>
                            <li class="nav-item px-2 {{ Route::is('post.explore') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/explore') }}">
                                    <i class="far fa-compass fa-2x"></i>
                                </a>
                            </li>
                            {{-- <li class="nav-item px-2 ">
                                <a class="nav-link" href="#">
                                    <i class="far fa-heart fa-2x"></i>
                                </a>
                            </li> --}}
                            <li class="nav-item pl-2">
                                <a href="/profile/{{Auth::user()->username}}" class="nav-link" style="width: 42px; height: 22px; padding-top: 6px;" >
                                    <img src="{{ asset(Auth::user()->profile->getProfileImage())  }}" class="rounded-circle w-100">
                                    {{-- <i class="far fa-user fa-2x"></i> --}}
                                </a>
                            </li>

                            <!-- Add more dropdown in Profile Page -->
                            <!-- To get current routedd(Route::currentRouteName())  -->
                            {{-- @if (Route::is('profile.index')) --}}

                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre></a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                        @can('update', Auth::user()->profile)
                                            <a class="dropdown-item" href="/p/create" role="button">
                                                Add New Post
                                            </a>
                                        @endcan

                                        @can('update', Auth::user()->profile)
                                            <a class="dropdown-item" href="/stories/create" role="button">
                                                Add New Story
                                            </a>
                                        @endcan

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            {{-- @endif --}}

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Content section -->
        <div class="pt-3 mt-5">
            @yield('content')
        </div>

    </div>

    @yield('exscript')

</body>
</html>

