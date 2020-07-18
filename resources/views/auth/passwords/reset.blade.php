@extends('layouts.auth', ['tk_page_title' => 'Reset your account'])

@section('content')

    <form method="POST"
        data-role="validator"
        action="{{ route('password.update') }}"
        data-interactive-check="true">

        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group">
            <label for="email">{{ __('E-Mail Address') }}</label>
            <input id="email"
                type="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ $email ?? old('email') }}"
                required
                autocomplete="email"
                placeholder="{{ __( 'institute@teckaa.com' ) }}"
                data-role="input"
                data-validate="email"
                data-clear-button="false"
                autofocus>
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
            <label for="email">{{ __('Password') }}</label>
                <input id="password"
                    type="password"
                    name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    required
                    placeholder="{{ __( '********' ) }}"
                    data-role="input"
                    autocomplete="new-password"
                    data-reveal-button-icon="<ion-icon name='eye-outline'></ion-icon>"
                    data-clear-button="false"
                    data-validate="minlength=8">
                <span class="invalid_feedback">
                    {{ __('Password cannot be empty and must be 8 letter.') }}
                </span>
                @error('password')
                    <small class="fg-red " role="alert">
                        {{ $message }}
                    </small>
                @enderror
        </div>

        <div class="form-group">
            <label for="password-confirm">{{ __('Confirm Password') }}</label>
            <input id="password-confirm"
                type="password"
                name="password_confirmation"
                autocomplete="new-password"
                required
                data-role="input"
                data-reveal-button-icon="<ion-icon name='eye-outline'></ion-icon>"
                data-clear-button="false"
                data-validate="compare=password minlength=8" name="pass2">
            <span class="invalid_feedback">
                {{ __('Both password be equal.') }}
            </span>
        </div>

        <div class="form-group mt-5">
            <button type="submit" class="button primary place-right">{{ __('Reset Password') }}</button>
        </div>
    </form>
@endsection
