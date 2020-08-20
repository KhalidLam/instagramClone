<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Title --}}
    <title>Story</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/story.css') }}">


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
