@props([
    'type' => 'submit',
    'class' => '',
    'disabled' => false,
])

<button
    type="{{ $type }}"
    {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->merge(['class' => "btn btn-primary justify-center text-sm btn-sm px-3 py-4 w-full rounded-xl $class"]) }}
>
    {{ $slot }}
</button>
