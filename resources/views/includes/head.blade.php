<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" ng-app="teckaaNgApp">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://teckaa.com/wp-content/uploads/2020/01/cropped-teckaa-1-32x32.png" sizes="32x32" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @isset($page_title)  {{ $page_title }} |  @endisset  {{ config('app.name') }}
    </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Varela&display=swap" rel="stylesheet">

    <!-- Ionicons Fonts -->
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>

    <!-- Metro Ui Styles -->
    <link rel="stylesheet" href="{{ asset('metro-ui/build/css/metro-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('metro-ui/build/css/metro-icons.css') }}">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Jquery Scripts -->
    <script src="{{ asset('js/jquery/3.5.1/jquery.min.js') }}"></script>

    <!-- International tel input style -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" rel="stylesheet">

    <!-- canvas2image Scripts -->
    <script src="{{ asset('js/convert-html-image/canvas2image.js') }}"></script>
    <script src="{{ asset('js/convert-html-image/html2canvas.min.js') }}"></script>

    <!-- jspdf Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>

    <!-- Custom Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
