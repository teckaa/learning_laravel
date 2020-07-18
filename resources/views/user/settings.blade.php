@extends('layouts.app')

@section('content')

    <form method="POST" action="{{ route('user.updateSettings', $user ?? '') }}" data-role="validator" class="p-3">
        @csrf
        @method('patch')

        <div class="mt-3 mb-3">
            <p style="font-size: 14px;"><b>{{ __( 'Social network connect' ) }}</b></p>
            <span style="font-size: 13px;">
                {{ __( 'Your social account will show on your receipts or invoices, so you customers can connect with you.' ) }}
            </span>
        </div>

        <div class="form-group">
            <span class="label">{{ __( 'Facebook' ) }}</span>
            <input type="text"
                name="social_facebook"
                value="{{ Auth::user()->social_facebook }}"
                placeholder="{{ __( 'Enter your facebook username' ) }}"
                data-role="input"
                data-clear-button="false"
                data-prepend='<ion-icon name="logo-facebook"></ion-icon>'
                data-validate="maxlength=20">
            <small class="invalid_feedback">
                {{ __( 'Your facebook handle name can`t be more than 20 letters' ) }}
            </small>
        </div>

        <div class="form-group">
            <span class="label">{{ __( 'Twitter' ) }}</span>
            <input type="text"
                name="social_twitter"
                value="{{ Auth::user()->social_twitter }}"
                placeholder="{{ __( 'Enter your twitter username' ) }}"
                data-role="input"
                data-clear-button="false"
                data-prepend='<ion-icon name="logo-twitter"></ion-icon>'
                data-validate="maxlength=20">
            <small class="invalid_feedback">
                {{ __( 'Your twitter handle name can`t be more than 20 letters' ) }}
            </small>
        </div>

        <div class="form-group">
            <span class="label">{{ __( 'Instagram' ) }}</span>
            <input type="text"
                name="social_instagram"
                value="{{ Auth::user()->social_instagram }}"
                placeholder="{{ __( 'Enter your instagram username' ) }}"
                data-role="input"
                data-clear-button="false"
                data-prepend='<ion-icon name="logo-instagram"></ion-icon>'
                data-validate="maxlength=20">
            <small class="invalid_feedback">
                {{ __( 'Your instagram handle name can`t be more than 20 letters' ) }}
            </small>
        </div>

        <div class="mt-10 mb-3">
            <p style="font-size: 14px;"><b>{{ __( 'Brand color' ) }}</b></p>
            <span style="font-size: 13px;">
                {{ __( 'Every brand has a unique, so choose a color that match with your brand.' ) }}
            </span>
        </div>

        <div class="form-group">
            <span class="label">{{ __( 'Color' ) }}</span>
            <input type="text"
                name="color"
                value="{{ Auth::user()->color }}"
                placeholder="{{ __( 'Enter your brand color' ) }}"
                data-role="input"
                data-clear-button="false"
                data-prepend='<ion-icon name="color-palette-outline"></ion-icon>'
                data-validate="maxlength=20">
            <small class="invalid_feedback">
                {{ __( 'Pick a unique color' ) }}
            </small>
        </div>

        <div class="mt-10 mb-3">
            <p style="font-size: 14px;"><b>{{ __( 'Currency and Discount' ) }}</b></p>
            <span style="font-size: 13px;">
                {{ __( 'Your currency will show on your receipts or invoices, so you customers can connect with you.' ) }}
            </span>
        </div>

        <div class="form-group">
            <span class="label">{{ __( 'Pick your Discount' ) }}</span>
            <select name="discount"
                data-role="select"
                data-prepend='<ion-icon name="wallet-outline"></ion-icon>'>
                <option>{{ Auth::user()->discount }}</option>
                {{ App\Http\Controllers\IntegerController::Write('option', 1, 100) }}
            </select>
        </div>

        <div class="form-group">
            <span class="label">{{ __( 'Pick your Currency' ) }}</span>
            <select name="currency"
                data-role="select"
                data-prepend='<ion-icon name="wallet-outline"></ion-icon>'>
                <option>{{ Auth::user()->currency }}</option>
                {{ App\Http\Controllers\RegionController::CurrencyName('option') }}
            </select>
        </div>

        @include('includes.save-button-for-update')
    </form>

@endsection
