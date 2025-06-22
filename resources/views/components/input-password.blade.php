@props(['name', 'placeholder' => ''])

<div class="relative mb-5">
    <div class="icon-field">
        <span class="absolute start-4 top-1/2 -translate-y-1/2 pointer-events-none flex text-xl">
            <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
        </span>
        <input type="password" name="{{ $name }}" id="your-password"
               class="form-control h-[56px] ps-11 border-neutral-300 bg-neutral-50 dark:bg-dark-2 rounded-xl @error($name) is-invalid @enderror"
               placeholder="{{ $placeholder }}" required>
        @error($name)
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <span class="toggle-password ri-eye-line cursor-pointer absolute end-0 top-1/2 -translate-y-1/2 me-4 text-secondary-light"
          data-toggle="#your-password"></span>
</div>
