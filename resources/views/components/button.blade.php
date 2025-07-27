@props([
    'linkto' => null,
    'variant' => 'primary',
    'type' => 'submit',
    'size' => 'md',
])

@php
    $baseClasses =
        'font-medium rounded-lg text-sm text-center cursor-pointer transition outline-none focus:ring-0 focus:outline-none';

    $sizes = [
        'sm' => 'px-3 py-1.5 text-sm',
        'md' => 'px-5 py-2.5 text-sm',
        'lg' => 'px-6 py-3 text-base',
    ];
    $variants = [
        'secondary' => 'border border-default text-body hover:bg-elevated focus:border-transparent',
        'primary' => 'bg-brand text-invert hover:bg-brand-dark focus:border-transparent',
    ];

    $sizeClass = $sizes[strtolower($size)] ?? $sizes['md'];
    $variantClass = $variants[strtolower($variant)] ?? $variants['secondary'];

    $finalClass = "$baseClasses $sizeClass $variantClass";
@endphp

@if ($linkto)
    <a href="{{ Route::has($linkto) ? route($linkto) : $linkto }}"
        {{ $attributes->merge(['class' => $finalClass]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $finalClass]) }}>
        {{ $slot }}
    </button>
@endif
