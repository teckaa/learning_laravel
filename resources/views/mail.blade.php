<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" ng-app="teckaaNgApp">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://teckaa.com/wp-content/uploads/2020/01/cropped-teckaa-1-32x32.png" sizes="32x32" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        Send Email
    </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Varela&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('metro-ui/build/css/metro-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('metro-ui/build/css/metro-icons.css') }}">

    <!-- International tel input style -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" rel="stylesheet">

    <script src="{{ asset('js/angularjs/1.6.9/angular.min.js') }}"></script>
    <script src="{{ asset('js/jquery/3.5.1/jquery.min.js') }}"></script>
</head>
<body>

    <div class="container box">
        <h1>This is email</h1>
    </div>
</body>
</html>

