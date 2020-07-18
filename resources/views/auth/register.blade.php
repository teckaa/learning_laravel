@extends('layouts.auth', ['tk_page_title' => 'Sign up'])

@section('content')
    <p>
        {{ __( 'Get started with Teckaa Invoice and send unlimited invoice and receipts to your customers.' ) }}
    </p>
    <form method="POST"
        data-role="validator"
        action="{{ route('register') }}"
        data-interactive-check="true">

        @csrf

        <div class="form-group">
            <label for="name">{{ __('Fullname/Brand') }}</label>
            <input id="name"
                type="text"
                autofocus
                class="form-control @error('name') is-invalid @enderror"
                name="name"
                value="{{ old('name') }}"
                placeholder="{{ __( 'Teckaa Institute' ) }}"
                required
                autocomplete="name"
                data-clear-button="false"
                data-validate="minlength=2 maxlength=20">
            <span class="invalid_feedback">
                {{ __('Enter your name with min length of 2 and max of 20') }}
            </span>
            @error('name')
                <small class="fg-red" role="alert">
                    {{ $message }}
                </small>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">{{ __('E-Mail Address') }}</label>
            <input id="email"
                type="email"
                class="form-control @error('email') is-invalid @enderror"
                name="email"
                value="{{ old('email') }}"
                placeholder="{{ __( 'institute@teckaa.com' ) }}"
                required
                data-clear-button="false"
                data-validate="email">
            <span class="invalid_feedback">
                {{ __('Enter correct email address.') }}
            </span>
            @error('email')
                <small class="fg-red" role="alert">
                    {{ $message }}
                </small>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <input type="password"
                id="password"
                class="form-control @error('password') is-invalid @enderror"
                name="password"
                required
                autocomplete="new-password"
                data-role="input"
                data-reveal-button-icon="<ion-icon name='eye-outline'></ion-icon>"
                data-clear-button="false"
                data-validate="minlength=8">
            <span class="invalid_feedback">
                {{ __('Password cannot be empty.') }}
            </span>
            @error('password')
                <small class="fg-red" role="alert">
                    {{ $message }}
                </small>
            @enderror
        </div>

        <div class="form-group">
            <label for="password-confirm">{{ __('Confirm Password') }}</label>
            <input id="password-confirm"
                type="password"
                name="password_confirmation"
                required
                data-role="input"
                data-reveal-button-icon="<ion-icon name='eye-outline'></ion-icon>"
                data-clear-button="false"
                data-validate="compare=password minlength=8" name="pass2">
            <span class="invalid_feedback">
                {{ __('Both password be equal.') }}
            </span>
            @error('password')
                <small class="fg-red" role="alert">
                    {{ $message }}
                </small>
            @enderror
        </div>

        <div class="form-group mt-5">
            <button class="button primary w-100">{{ __('Sign Up') }}</button>
        </div>
    </form>
@endsection
