<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    {{-- Title --}}
    <title>Story</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
   <style>
    body {
    font-family: sans-serif;
    }


    h1, h5 {
    margin: 0;
    color: #fff;
    }

    h1 {
    font-size: 2.5rem;
    }

    h5 {
    opacity: 0.66;
    font-weight: normal;
    font-size: 1.25rem;
    }

    .container {
    position: relative;
    width: 500px;
    height: 750px;
    margin: 50px auto;
    background: #fafafa;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    }

    .time {
    padding: 10px;
    display: flex;
    justify-content: space-around;
    }

    .time-item {
    flex: 1 1 auto;
    border-radius: 5px;
    margin-right: 5px;
    height: 10px;
    background-color: rgba(0,0,0,0.10);
    position: relative;
    overflow: hidden;
    }

    .time-item:last-child {
    margin-right: 0;
    }

    .time-item > div {
    position: absolute;
    width: 0%;
    height: 100%;
    background-color: rgba(255,255,255,0.5);
    }

    .content {
    position: absolute;
    height: 750px;
    width: 500px;
    background-image: linear-gradient(-180deg, rgba(255,255,255,0.00) 0%, rgba(0,0,0,0.15) 100%);

    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    }
    .texts {
    padding: 7%;
    }

    #back, #next {
    position: absolute;
    top: 0;
    }

    #back {
    left: 0;
    height: 100%;
    width: 50%;
    }

    #next {
    left: 50%;
    height: 100%;
    width: 50%;
    }

   </style>


</head>
<body>
    <div id="app">
        <div class="container">
            <div id="times" class="time">
            </div>

            <div class="content">
              <div class="texts">
                <h1 id="title"></h1>
                <h5 id="description"></h5>
              </div>
            </div>

            <div id="back"></div>
            <div id="next"></div>
          </div>
    </div>

    <script src="{{ asset('js/story.js') }}" ></script>

</body>
</html>
