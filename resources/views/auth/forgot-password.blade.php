@extends('layouts.auth')

@section('page-title')
    {{ __('Reset Password') }}
@endsection

@section('language-bar')
    <div class="lang-dropdown-only-desk">
        <li class="dropdown dash-h-item drp-language">
            <a class="dash-head-link dropdown-toggle btn" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="drp-text"> {{ Str::upper($lang) }}</span>
            </a>
            <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                @foreach (languages() as $key => $language)
                    <a href="{{ url('/forgot-password', $key) }}"
                        class="dropdown-item @if ($lang == $key) text-primary @endif">
                        <span>{{ Str::ucfirst($language) }}</span>
                    </a>
                @endforeach
            </div>
        </li>
    </div>
@endsection

@php
    $admin_settings = getAdminAllSetting();
@endphp

@section('content')
    <div>
        <x-logo />
        <h4 class="mb-3">{{ __('Forgot Password') }}</h4>
        <p class="mb-8 text-secondary-light text-lg">Enter your email and we'll send a reset link.</p>
    </div>

    <div>
        @if (session('status'))
            <div class="alert alert-primary">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <form method="POST" action="{{ route('password.email') }}" id="form_data" class="needs-validation" novalidate>
        @csrf

        {{-- Email Input using Component --}}
        <x-input-m name="email" type="email" icon="mdi:email-outline" placeholder="{{ __('Enter Email') }}" :value="old('email')" required autofocus />

        @stack('recaptcha_field')

        <div class="d-grid mt-3">
            <x-button class="login_button mt-8"> {{ __('Send Password Reset Link') }}</x-button>
        </div>

        <p class="mb-0 my-4 text-center">
            Back to login
            <a href="{{ route('login', $lang) }}" class="f-w-400 text-primary">{{ __('Login') }}</a>
        </p>
    </form>
@endsection
