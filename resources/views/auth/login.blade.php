@extends('layouts.auth')

@section('content')
    <div>
        <x-logo />
        <h4 class="mb-3">Sign In to your Account</h4>
        <p class="mb-8 text-secondary-light text-lg">Welcome back! please enter your detail</p>
    </div>

    <form method="POST" action="{{ route('login') }}" id="form_data" class="needs-validation" novalidate>
        @csrf

        <x-input-m type="email" name="email" icon="mage:email" placeholder="Email" :required="true" :autofocus="true" />

        <x-input-password name="password" placeholder="Password" />

        <div class="mt-7 flex justify-between gap-2">
            <div class="flex items-center">
                <input class="form-check-input border border-neutral-300" type="checkbox" name="remember" id="remember">
                <label class="ps-2" for="remember">Remember me</label>
            </div>
            <a href="{{ route('password.request', app()->getLocale()) }}" class="text-primary-600 font-medium hover:underline">Forgot Password?</a>
        </div>

        <x-button class="login_button mt-8">Sign In</x-button>

        <div class="mt-8 center-border-horizontal text-center relative before:absolute before:w-full before:h-[1px] before:top-1/2 before:-translate-y-1/2 before:bg-neutral-300 before:start-0">
            <span class="bg-white dark:bg-dark-2 z-[2] relative px-4">Or sign in with</span>
        </div>

        <div class="mt-8 flex items-center gap-3">
            <x-social-button icon="ic:baseline-facebook" label="Facebook" />
            <x-social-button icon="logos:google-icon" label="Google" />
        </div>

        <div class="mt-8 text-center text-sm">
            <p>Don't have an account?
                <a href="{{ route('register', app()->getLocale()) }}" class="text-primary-600 font-semibold hover:underline">Sign Up</a>
            </p>
        </div>
    </form>
@endsection

@push('script')
<script>
    $(document).ready(function () {
        $("#form_data").submit(function (e) {
            $(".login_button").attr("disabled", true);
            setTimeout(() => {
                $(".login_button").attr("disabled", false);
            }, 1500);
        });
    });
</script>
@endpush
