<a href="{{ $href }}" @class([
    'flex items-center gap-3 py-3 opacity-70 hover:opacity-100 rounded-xl',
    'opacity-100 text-brand-light bg-muted' => request()->url() === $href,
])>
    <span class="size-6 ml-2">
        {{ $slot }}
    </span>
    <span class="text-lg">{{ $label }}</span>
</a>
