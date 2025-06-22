@props([
    'type' => 'text',
    'name',
    'icon',
    'placeholder' => '',
    'value' => '',
    'required' => false,
    'autofocus' => false,
])

<div class="icon-field mb-4 relative">
    <span class="absolute start-4 top-1/2 -translate-y-1/2 pointer-events-none flex text-xl">
        <iconify-icon icon="{{ $icon }}"></iconify-icon>
    </span>
    <input type="{{ $type }}" name="{{ $name }}"
           class="form-control h-[56px] ps-11 border-neutral-300 bg-neutral-50 dark:bg-dark-2 rounded-xl @error($name) is-invalid @enderror"
           placeholder="{{ $placeholder }}"
           value="{{ old($name, $value) }}"
           @if($required) required @endif
           @if($autofocus) autofocus @endif>
    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
