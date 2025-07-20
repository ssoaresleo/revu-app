@props([
    'linkto' => null,
    'variant' => 'default',
    'type' => 'submit',
])

@php
    $baseClasses = 'font-medium rounded-lg text-sm px-5 py-2.5 text-center';
    $variants = [
        'default' => 'hover:bg-zinc-900 focus:ring-2 focus:ring-zinc-800',
        'gradient' =>
            'text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:ring-red-100 dark:focus:ring-red-400',
    ];

    $variantKey = strtolower(trim($variant));
    $buttonClass = $variants[$variantKey] ?? $variants['default'];
@endphp

@if ($linkto)
    <a href="{{ Route::has($linkto) ? route($linkto) : $linkto }}"
        {{ $attributes->merge(['class' => "$baseClasses $buttonClass"]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => "$baseClasses $buttonClass"]) }}>
        {{ $slot }}
    </button>
@endif
