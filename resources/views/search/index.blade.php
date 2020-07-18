<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @isset($tk_page_title)
            {{ $tk_page_title }} |
        @endisset
            {{ config('app.name') }}
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
    <link rel="stylesheet" href="{{ asset('css/teckaa-style.css') }}">
</head>
<body class="h-vh-100 bg-lightGray">

    <div class="container p-5">
        <a href="/teckaa/public/">
            <img src="{{ asset('images\teckaa III-cropped.png') }}" width="90" />
        </a>

        <a class="button place-right" href="https://teckaa.com" role="button">Back to Teckaa </a>

    </div>

    <div class="p-6 mx-auto bg-white drop-shadow" style="width: 550px;height: auto;top: 3%;">
        <h6 class="text-light place-center">{{ __('Enter the reference no') }}</h6>
        <hr class="thin mt-4 mb-4 bg-white">

        <header class="p-3">


            <form method="post" action="{{ route('search') }}">
                @csrf
                <div class="row">
                    <div class="cell-7">
                        <div class="form-group">
                            <label for="invoice_no">Reference no</label>
                            <input type="text"
                                name="search"
                                data-role="input"
                                data-clear-button="false"
                                placeholder="Enter reference no"
                                class='border bd-cobalt border-size-3 bd-cobalt-hover'/>
                        </div>
                    </div>
                    <div class="cell-3">
                        <div class="form-group">
                            <label for="post_type">Type</label>
                            <select name="post_type">
                                <option>Invoice</option>
                                <option>Receipt</option>
                            </select>
                        </div>
                    </div>
                    <div class="cell-2">
                        <div class="form-group">
                            <label for="post_type"></label><br/>
                            <button class="button primary rounded place-right" name="search">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </header>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('metro-ui/build/js/metro.min.js') }}" defer></script>
</body>
</html>
