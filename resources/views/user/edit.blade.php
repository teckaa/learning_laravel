@extends('layouts.app')

@section('content')

    <form method="post" action="{{ route('user.update', $user ?? '') }}" data-role="validator" autocomplete="off">
        @csrf
        @method('patch')


        <img src="
            @if(Auth::user()->avatar)
                {{ asset('storage/images/'.Auth::user()->avatar) }}
                @else
                {{ asset('images/avatar.png') }}
            @endif
            "
            class="border-radius-half border bd-gray drop-shadow" width="65" height="65"
            data-role="popover"
            data-popover-text="
                <a href='{{ url('user/picture') }}' class='text-center fg-white'>Edit picture</a>
            "
            data-popover-position="bottom"
            data-cls-popover="bg-dark drop-shadow text-center" />

        <p class="form-group mt-50" style="margin-top: 50px;">

            <label>{{ __(' Personal / Company Name ') }}</label>
            <input type="text"
                name="name"
                data-cls-input="bg-light"
                value="{{ Auth::user()->name }}"
                placeholder="{{ __(' Enter your name ') }}"
                data-role="input"
                data-clear-button="false"
                data-validate="minlength=2 maxlength=20">
            <small class="invalid_feedback">
                {{ __(' Name cannot be empty ') }}
            </small>
        </p>
        <p class="form-group">
            <label>{{ __(' Email ') }}</label>
            <input type="text"
                name="email"
                data-cls-input="bg-light"
                value="{{ Auth::user()->email }}"
                data-role="input"
                placeholder="{{ __(' Enter your email address ') }}"
                data-clear-button="false"
                data-validate="email">
            <small class="invalid_feedback">
                {{ __(' Enter correct email address ') }}
            </small>
        </p>

        <div class="form-group">
            <label>{{ __(' Phone number ') }}</label><br/>
            <input type="tel"
                id='phone'
                class="bg-light"
                value="{{ Auth::user()->phonenumber }}"
                placeholder="{{ __(' Enter your phone number ') }}">
            <small class="invalid_feedback">
                {{ __(" Enter correct phone number ") }}
            </small>
        </div>

        <p class="form-group">
            <label>{{ __(' Street ') }}</label>
            <input type="text"
                name="street"
                data-cls-input="bg-light"
                placeholder="{{ __(' Enter street name ') }}"
                value="{{ Auth::user()->street }}"
                data-role="input"
                data-clear-button="false">
        </p><br/>

        <div class="row mb-2">
            <div class="cell-md-6">
                <label>{{ __(' City ') }}</label>
                <input type="text"
                    name="city"
                    value="{{ Auth::user()->city }}"
                    placeholder="{{ __(' Enter city name ') }}"
                    data-cls-input="bg-light"
                    data-role="input"
                    data-clear-button="false">
                <span class="invalid_feedback">
                    {{ __(' Input correct name with min length 6 symbols ') }}
                </span>
            </div>
            <div class="cell-md-6">
                <label>{{ __(' State ') }}</label>
                <input type="text"
                    placeholder="{{ __(' Enter state ') }}"
                    name="state"
                    data-cls-input="bg-light"
                    value="{{ Auth::user()->state }}"
                    data-role="input"
                    data-clear-button="false">
                <span class="invalid_feedback">
                    {{ __(' Input correct email address ') }}
                </span>
            </div>
        </div>

        <div class="form-group">
            <label>{{ __(' Pick your country ') }}</label>
            <select name="country"
                class="bg-light"
                id="address-country">
            </select>
        </div>

        @include('includes.save-button-for-update')
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js?1590403638580"></script>
    <script src="{{ asset('/js/custom-intl-tel.js') }}" defer></script>

@endsection
