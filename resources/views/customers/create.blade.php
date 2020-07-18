@extends('layouts.app')

@section('content')
    <form method="post" action="{{ url("customers/create") }}" data-role="validator">
        @csrf
        <div class="form-group">
            <label> {{ __(' Customer name ') }} </label>
            <input type="text"
                name="name"
                placeholder="{{ __(' Enter customer name ') }}"
                data-clear-button="false"
                data-role="input"
                data-validate="minlength=2 maxlength=50">
            <small class="invalid_feedback">
                {{ __(" Your customer name can't be empty and shouldn't be more than 50 ") }}
            </small>
        </div>

        <div class="form-group">
            <label>{{ __(" Customer email ") }}</label>
            <input type="text"
                name="email"
                placeholder="{{ __(' Enter customer email ') }}"
                data-clear-button="false"
                data-role="input"
                data-validate="email">
            <small class="invalid_feedback">
                {{ __(" Enter correct email address ") }}
            </small>
        </div>

        <div class="form-group">
            <label>{{ __(" Customer phone number ") }}</label>
            <input type="tel"
                id='phone'
                placeholder="{{ __(' Enter customer phone number ') }}"
                data-clear-button="false"
                data-validate="digits minlength=5 maxlength=20">
            <small class="invalid_feedback">
                {{ __(" Enter correct phone number ") }}
            </small>
        </div>

        <div class="form-group">
            <label>{{ __(" Pick customer country ") }}</label>
            <select name="country"
                id="address-country">
            </select>
        </div>

        @include('includes.save-button-for-update')
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js?1590403638580"></script>
    <script src="{{ asset('/js/custom-intl-tel.js') }}" defer></script>
@endsection
