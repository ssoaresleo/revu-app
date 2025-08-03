<header x-data="{ open: false }" class="fixed top-0 left-0 w-full z-50 p-4 bg-elevated">

    <div class="w-full px-8 max-w-7xl mx-auto flex justify-between items-center">
        <x-logo />

        <div @click="open = !open" class="cursor-pointer lg:hidden">
            <x-lucide-menu class="size-6" />
        </div>
        <div class="flex gap-4 items-center">
            <x-header.logout />
            <x-header.profile />
        </div>
    </div>

    <div x-show="open" x-transition @click.outside="open = false"
        class="absolute top-full left-0 w-full z-50 p-4 space-y-4 lg:hidden bg-base border-t border-default">
        <div>
            <x-feed.sidebar.nav />
        </div>
    </div>
</header>
