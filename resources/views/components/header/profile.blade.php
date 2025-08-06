@php
    $reading = auth()->user()->currentReading;
    $hasReading = $reading && $reading->status === 'lendo';
@endphp

<div x-data="{ open: false }" class="relative hidden lg:flex items-center cursor-pointer">
    <div @click="open = !open" class="flex items-center space-x-2">
        <x-user-avatar :user="auth()->user()" />
        <div class="overflow-hidden">
            <span class="text-heading block truncate max-w-[160px] font-semibold">
                {{ auth()->user()->name }}
            </span>
        </div>
        <div :class="{ 'rotate-180': open }" class="transition-transform duration-200">
            <x-heroicon-o-chevron-down class="w-4 h-4 text-gray-500" />
        </div>
    </div>

    <div x-show="open" @click.away="open = false" x-transition style="display: none"
        class="absolute top-full mt-2 right-0 w-56 bg-muted rounded-lg shadow-xl z-50">
        <div class="flex items-center px-4 py-3 border-b border-gray-500">
            <div>
                <p class="font-medium text-heading leading-tight">
                    {{ auth()->user()->name }}
                </p>
                <p class="text-xs text-span truncate">
                    {{ '@' . auth()->user()->username }}
                </p>
            </div>
        </div>

        <ul class="py-1 text-sm text-body">
            <li>
                <a href="" class="flex items-center px-4 py-2 hover:bg-gray-100 transition">
                    <x-heroicon-s-user class="size-4 mr-2" />
                    Perfil
                </a>
            </li>
        </ul>

        <div class="border-t border-gray-500"></div>
        <x-header.logout />
    </div>
</div>
