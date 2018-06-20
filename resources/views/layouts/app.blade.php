<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', '默认标题')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div id="app">

        @include('layouts._header')

        <div class="container">

            @yield('content')

        </div>

        @include('layouts._footer')
    </div>

    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>