@extends('layouts.auth', ['tk_page_title' => 'Sign in'])

@section('content')
    <p>
        {{ __( 'Welcome back.' ) }}
    </p>
    <form method="POST"
        data-role="validator"
        action="{{ route('login') }}"
        data-interactive-check="true">

        @csrf

        <div class="form-group">
            <label for="email">{{ __('E-Mail Address') }}</label>
            <input id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
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
                    required
                    placeholder="{{ __( '********' ) }}"
                    data-role="input"
                    autocomplete="current-password"
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

        <div class="row">
            <div class="cell">
                <input type="checkbox"
                    data-role="checkbox"
                    data-caption="Remember me">
            </div>

            <div class="cell p-3">
                <a href="{{ url('password/reset') }}" class="float-right" style="font-size: 13px;">
                    {{ __( 'Forgot your password?' ) }}
                </a>
            </div>
        </div>
        <div class="form-group mt-5">
            <button class="button primary w-100">{{ __('Sign in') }}</button>
        </div>
    </form>
@endsection
