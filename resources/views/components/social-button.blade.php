@props(['icon', 'label'])

<button type="button" class="w-1/2 btn border rounded-xl flex justify-center items-center gap-3">
    <iconify-icon icon="{{ $icon }}" class="text-primary-600 text-xl"></iconify-icon> {{ $label }}
</button>
