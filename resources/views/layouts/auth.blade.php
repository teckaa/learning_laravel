<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://teckaa.com/wp-content/uploads/2020/01/cropped-teckaa-1-32x32.png" sizes="32x32" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{-- @isset($tk_page_title ?? '' ?? '')
            {{ $tk_page_title ?? '' ?? '' }} |
        @endisset
            {{ config('app.name') }} --}}
    </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Varela&display=swap" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Varela&display=swap" rel="stylesheet">

    <!-- Ionicons Fonts -->
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('metro-ui/build/css/metro-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="h-vh-100">

    <div class="container p-5">
        <a href="/teckaa/public/">
            <img src="{{ asset('images\teckaa III-cropped.png') }}" width="90" />
        </a>

        <a class="button place-right border-radius-3
            @if(Request::is('login') ||
                Request::is('password/reset') ||
                Request::is('receipts/bin'))
                primary
            @else
                primary outline border-radius-3
            @endif"
            style="border-top-left-radius: 0px; border-bottom-left-radius: 0px;"
            href="{{ url("login") }}"
            role="button">{{ __('Sign in') }}
        </a>

        <a class="button place-right border-radius-3
            @if(Request::is('register'))
                primary
            @else
                primary outline border-radius-3
            @endif"
            style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;"
            href="{{ url("register") }}"
            role="button">{{ __('Sign up for free') }}
        </a>

    </div>

    <div class="teckaa-auth-form p-6 mx-auto">
        <h4 class="text-light place-center">{{ $tk_page_title ?? '' }}</h4>
        <hr class="thin mt-4 mb-4 bg-white">

        @yield('content')

    </div>

    <!-- Scripts -->
    <script src="{{ asset('metro-ui/build/js/metro.min.js') }}" defer></script>
</body>
</html>
