<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
   {{-- <script type="text/javascript">
        window.__INITIAL_STATE__ = '{!! json_encode($user) !!}'
    </script>--}}
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
{{--@dd($user)--}}
<div id="app">


    <welcome-component :streamer='@json($streamer)'>

    </welcome-component>
</div>
<script src="/js/app.js"></script>

</body>
</html>
