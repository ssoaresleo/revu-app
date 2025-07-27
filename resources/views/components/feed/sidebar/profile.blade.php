    <div class="flex items-center">
        <div class="size-10 mr-2 rounded-full overflow-hidden">
            <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="{{ auth()->user()->name }}">
        </div>
        <div class="flex-1 overflow-hidden">
            <span class="text-heading block truncate max-w-[160px]">
                {{ auth()->user()->name }}
            </span>
            <div class="text-sm truncate text-muted max-w-[160px] overflow-hidden text-ellipsis whitespace-nowrap">
                {{ auth()->user()->username }}
            </div>
        </div>
    </div>
