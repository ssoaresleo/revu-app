    <div class="flex items-center">
        <div class="size-10 mr-2 rounded-full overflow-hidden">
            <x-user-profile-picture />
        </div>
        <div class="flex-1 overflow-hidden">
            <span class="text-heading block truncate max-w-[160px]">
                {{ auth()->user()->name }}
            </span>
        </div>
    </div>
