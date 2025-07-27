<a href="{{ $href }}" @class([
    'flex items-center gap-6 py-3 opacity-70 hover:opacity-100',
    'opacity-100 text-heading' => request()->url() === $href,
])>
    <span class="size-6">
        {{ $slot }}
    </span>
    <span class="text-lg">{{ $label }}</span>
</a>
