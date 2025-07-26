@props(['name', 'class' => 'w-8 h-8 text-muted mb-2'])

@php
    $iconPath = resource_path("svg/{$name}.svg");
@endphp

@if (file_exists($iconPath))
    @php
        $svg = file_get_contents($iconPath);
    @endphp

    @php
        $svg = preg_replace('/class="[^"]*"/', '', $svg);
        $svg = preg_replace('/<svg/', "<svg class=\"{$class}\"", $svg, 1);
    @endphp

    {!! $svg !!}
@else
    {{-- Ícone fallback se não encontrar --}}
    <svg xmlns="http://www.w3.org/2000/svg" class="{{ $class }}" fill="none" viewBox="0 0 24 24"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M12 4v16m8-8H4" />
    </svg>
@endif
