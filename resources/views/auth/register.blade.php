@extends('layouts.auth')

@section('page-title')
    {{ __('Register') }}
@endsection

@section('language-bar')
    <div class="lang-dropdown-only-desk">
        <li class="dropdown dash-h-item drp-language">
            <a class="dash-head-link dropdown-toggle btn" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="drp-text"> {{ Str::upper($lang) }}</span>
            </a>
            <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                @foreach (languages() as $key => $language)
                    <a href="{{ route('register', [$ref, $key]) }}"
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
    $setting = Workdo\LandingPage\Entities\LandingPageSetting::settings();
@endphp

@section('content')
    <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
    @csrf
        <div>
            <x-logo />
            <h4 class="mb-3">Sign In to your Account</h4>
            <p class="mb-8 text-secondary-light text-lg">{{ __('Register') }}</p>
        </div>

        {{-- Name Field --}}
        <x-input-m name="name" type="text" icon="mdi:account" placeholder="{{ __('Enter Name') }}" :value="old('name')" required autofocus />
        <x-input-m name="workspace" type="text" icon="mdi:domain" placeholder="{{ __('Enter WorkSpace Name') }}" :value="old('store_name')" required />
        <input type="hidden" name="type" value="register" id="type">
        <x-input-m name="email" type="email" icon="mdi:email" placeholder="{{ __('Enter Email') }}" :value="old('email')" required />
        <x-input-m name="password" type="password" icon="mdi:lock" placeholder="{{ __('Enter Password') }}" required />
        <x-input-m name="password_confirmation" type="password" icon="mdi:lock-check" placeholder="{{ __('Enter Confirm Password') }}" required />

        {{-- Terms & Conditions --}}
        <div class="form-check mt-3">
            <input type="checkbox" class="form-check-input" id="termsCheckbox" name="terms" required>
            <label class="form-check-label text-sm" for="termsCheckbox">
                {{ __('I agree to the ') }}
                @if (is_array(json_decode($setting['menubar_page'])) || is_object(json_decode($setting['menubar_page'])))
                    @foreach (json_decode($setting['menubar_page']) as $value)
                        @if (in_array($value->page_slug, ['terms_and_conditions']) && isset($value->template_name))
                            @if (module_is_active('LandingPage'))
                                <a href="{{ $value->template_name == 'page_content' ? route('custom.page', $value->page_slug) : $value->page_url }}" target="_blank">
                                    {{ $value->menubar_page_name }}
                                </a>
                            @else
                                <a href="{{ route('custompage', ['page' => 'terms_and_conditions']) }}" target="_blank">
                                    {{ __('Terms and Conditions') }}
                                </a>
                            @endif
                        @endif
                    @endforeach

                    {{ __(' and the ') }}

                    @foreach (json_decode($setting['menubar_page']) as $value)
                        @if (in_array($value->page_slug, ['privacy_policy']) && isset($value->template_name))
                            @if (module_is_active('LandingPage'))
                                <a href="{{ $value->template_name == 'page_content' ? route('custom.page', $value->page_slug) : $value->page_url }}" target="_blank">
                                    {{ $value->menubar_page_name }}
                                </a>
                            @else
                                <a href="{{ route('custompage', ['page' => 'privacy_policy']) }}" target="_blank">
                                    {{ __('Privacy Policy') }}
                                </a>
                            @endif
                        @endif
                    @endforeach
                @endif
            </label>
        </div>

        @stack('recaptcha_field')

        {{-- Submit Button --}}
        <div class="d-grid mt-3">
            <input type="hidden" name="ref_code" value="{{ $ref }}">
            <x-button class="login_button mt-8">{{ __('Register') }}</x-button>
            @stack('SigninButton')
        </div>

        <div class="mt-8 center-border-horizontal text-center relative before:absolute before:w-full before:h-[1px] before:top-1/2 before:-translate-y-1/2 before:bg-neutral-300 before:start-0">
            <span class="bg-white dark:bg-dark-2 z-[2] relative px-4">Or sign up with</span>
        </div>

        <div class="mt-8 flex items-center gap-3">
            <x-social-button icon="ic:baseline-facebook" label="Facebook" />
            <x-social-button icon="logos:google-icon" label="Google" />
        </div>
        <p class="mb-0 my-4 text-center">
            {{ __('Already have an account?') }}
            <a href="{{ route('login', $lang) }}" class="f-w-400 text-primary">{{ __('Login') }}</a>
        </p>
    </form>
@endsection
