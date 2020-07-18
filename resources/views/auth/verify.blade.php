@extends('layouts.app', ['page_title' => 'Verify your email'])

@section('content')

    <div class="text-center p-5">
        <h6>{{ __('Verify Your Email Address') }}</h6>
        @if (session('resent'))
            <div class="remark success">
                {{ __('We just sent you a new verification link to your email address. click on it and start sending invoiceand receipts. ') }}
            </div>
        @endif

        {{ __('Hi '.Auth::user()->name.', You are just one step away , please check your email for a verification link.') }}
        {{ __('If you did not receive the email, click the button below to request another') }},
        <form class="" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit"
                role="button"
                class="button primary">
                {{ __('Resend me the verification link') }}
            </button>.
        </form>
    </div>

@endsection
