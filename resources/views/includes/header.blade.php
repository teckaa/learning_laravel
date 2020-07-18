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
</head>
<body>

<div class="appbar pos-fixed z-100" data-role="appbar" data-expand-point="md"
    style="background:#33475b; height:50px;">

    <ul class="app-bar-menu fg-white">
            <a href="{{ url('/') }}" class="brand">
            <img src="{{ asset('images\teckaa III-cropped.png') }}" width="65" />
        </a>
         <li class="{{ Request::is('customers*') ? 'bg-cobalt' : '' }}">
            <a href="{{ url('customers') }}" style="font-size: 12px;">Customers</a>
        </li>
        <li class="{{ Request::is('invoices*') ? 'bg-cobalt' : '' }}">
            <a href="{{ url('invoices') }}" style="font-size: 12px;">Invoices</a>
        </li>
        <li class="{{ Request::is('receipts*') ? 'bg-cobalt' : '' }}">
            <a href="{{ url('receipts') }}" style="font-size: 12px;">Receipts</a>
        </li>
        <li class="{{ Request::is('stats*') ? 'bg-cobalt' : '' }}">
            <a href="{{ url('stats') }}" style="font-size: 12px;">Stats</a>
        </li>
    </ul>

    <ul class="h-menu mega pos-absolute pos-top-right bg-transparent p-2">
        @if(Request::is('invoices/create') ||
            Request::is('invoices/edit') ||
            Request::is('receipts/create') ||
            Request::is('receipts/edit'))
            <li>
                <a href="#" class="dropdown-toggle bg-white fg-black border-radius-1" data-role="button">Download</a>
                <ul class="d-menu  border bd-lightGray no-shadow" data-role="dropdown">
                    <li>
                        <a href="#" class="dropdown-toggle">
                            <ion-icon name="download-outline"></ion-icon>
                            Download as
                        </a>
                        <ul class="d-menu border bd-lightGray no-shadow mt-2" data-role="dropdown">
                            <li onclick="$('#info-box-1').data('infobox').open()">
                                <a id="btn-to-save-png">
                                    <ion-icon name="image-outline"></ion-icon>
                                    Png
                                </a>
                            </li>
                            <li onclick="$('#info-box-1').data('infobox').open()">
                                <a id="btn-to-save-pdf">
                                    <ion-icon name="document-attach-outline"></ion-icon>
                                    Pdf
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle">
                            <ion-icon name="send-outline"></ion-icon>
                            Send via
                        </a>
                        <ul class="d-menu border bd-lightGray no-shadow mt-2" data-role="dropdown">
                            <li>
                                <a href="#">
                                    <ion-icon name="mail-outline"></ion-icon>
                                    {{ __('Email') }}
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <ion-icon name="logo-whatsapp"></ion-icon>
                                    {{ __('Whatsapp') }}
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <ion-icon name="logo-facebook"></ion-icon>
                                    {{ __('Facebook') }}
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <ion-icon name="logo-twitter"></ion-icon>
                                    {{ __('Twitter') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

        @else
        <li>
            <button class="button bg-white fg-black"
                data-role="popover"
                data-popover-trigger="click"
                data-popover-position="bottom"
                data-popover-text="
                    You need to start creating a
                ">
                {{ __('Download' )}}
            </button>
        </li>
        @endif

        <li>
            <a href="{{ url('user/settings') }}">
                <ion-icon name="settings-outline" style="color:white; font-size:16px;"></ion-icon>
            </a>
        </li>
        <a class="dropdown-toggle border fg-white c-default">
            <img class="border-radius-half" style="width: 30px; height: 30px; margin-top:+1px;"
            src="
                @if(Auth::user()->avatar)
                    {{ asset('storage/images/'.Auth::user()->avatar) }}
                    @else
                    {{ asset('images/avatar.png') }}
                @endif
                    ">
        </a>
        <div class="d-menu mega-container bg-white border bd-lightGray no-shadow"
            data-role="dropdown" style="width:250px; right:150px; margin-top:-1px;">
            <a href="{{ url('user/edit') }}" class="items-list c-pointer">
                <div class="item">
                    <img class="avatar"
                    src="
                        @if(Auth::user()->avatar)
                            {{ asset('storage/images/'.Auth::user()->avatar) }}
                            @else
                            {{ asset('images/avatar.png') }}
                        @endif
                            ">
                    <span class="label" style="text-decoration: none;">{{ Auth::user()->name }}</span>
                    <span class="second-label mt-2">{{ Auth::user()->email }}</span>
                </div>
            </a>
            <div class="divider"></div>
            <div class="p-3">
                <a href="{{ url('customers') }}" class="p-1">{{ __('Customers') }}</a>
                <a href="{{ url('invoices') }}" class="p-1">{{ __('Invoices') }}</a>
                <a href="{{ url('receipts') }}" class="p-1">{{ __('Receipts') }}</a>
                <a href="{{ url('stats') }}" class="p-1">{{ __('Stats') }}</a>
                <a href="{{ url('user/edit') }}" class="p-1">{{ __('Profile') }}</a>
                <a href="{{ url('user/settings') }}" class="p-1">{{ __('Account Settings') }}</a>
            </div>
            <div class="divider"></div>
            <div class="row">
                <div class="cell-5">
                    <a class="dropdown-item p-2 fg-cobalt" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form-top').submit();">
                        <small>{{ __('Logout') }}</small>
                    </a>
                    <form id="logout-form-top" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                <div class="cell-7">
                    <a href="{{ config('app.parent') }}/legal/privacy" class="p-2 text-right fg-cobalt">
                        <small>{{ __('Privacy Policy') }}</small>
                    </a>
                </div>
            </div>
        </div>
    </ul>
</div>
