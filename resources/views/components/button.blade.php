@props([
    'linkto' => null,
    'variant' => 'primary',
    'type' => 'submit',
])

@php
    $baseClasses =
        'font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer transition outline-none focus:ring-0 focus:outline-none';
    $variants = [
        'secondary' => 'border border-default text-body hover:bg-elevated focus:border-transparent',
        'primary' => 'bg-brand text-invert hover:bg-brand-dark focus:border-transparent',
    ];
    $variantKey = strtolower(trim($variant));
    $buttonClass = $variants[$variantKey] ?? $variants['secondary'];
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
