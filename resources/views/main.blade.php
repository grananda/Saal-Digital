<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

    <title>Saal Digital Assessment - @yield('title') </title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-3"> @include('partials.menu')</div>
        <div class="col-md-9"> @yield('content')</div>
    </div>
</div>
<script src="{{ URL::asset('js/app.js') }}"></script>
</body>
</html>
