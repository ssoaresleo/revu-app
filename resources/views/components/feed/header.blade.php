<header x-data="{ open: false }" class="flex justify-between p-6 border-b-2 border-default items-center relative">
    <div class="lg:hidden">
        <x-feed.sidebar.logo />
    </div>

    <div class="hidden lg:block text-2xl text-heading">Página inicial</div>

    <div @click="open = !open" class="cursor-pointer lg:hidden">
        <x-lucide-menu class="size-6" />
    </div>

    <div x-show="open" x-transition @click.outside="open = false"
        class="absolute top-full left-0 w-full z-50 p-4 space-y-4 lg:hidden">
        <x-feed.trending-panel.search-bar />
        <div>
            <x-feed.sidebar.nav />
            <x-feed.sidebar.logout />
        </div>
    </div>
</header>
