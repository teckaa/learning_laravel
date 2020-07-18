@extends('layouts.auth', ['tk_page_title' => 'Reset your account'])

@section('content')
    <p>
        {{ __( 'Enter your email addess and we’ll send you instructions on how to reset your password.' ) }}
    </p>
    @if (session('status'))
        <div class="remark info">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST"
        data-role="validator"
        action="{{ route('password.email') }}"
        data-interactive-check="true">

        @csrf
        <div class="form-group">
            <label for="email">{{ __('E-Mail Address') }}</label>
            <input id="email"
                type="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
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
        <div class="form-group mt-5">
            <button class="button primary w-100">{{ __('Send Password Reset Link') }}</button>
        </div>
    </form>

@endsection
