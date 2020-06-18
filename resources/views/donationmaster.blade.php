<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('alertcss/alert.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('/augmented.css') }}" rel="stylesheet" type="text/css" >


</head>
<body>
<div id="app">
    <donationalert-component
         streamer="{{$streamer}}"  path="{{$path}}">

    </donationalert-component>
</div>
<script src="/js/app.js"></script>

</body>
</html>
