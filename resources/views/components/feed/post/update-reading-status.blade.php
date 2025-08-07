<form action="{{ route('feed.status', $reading->id) }}" method="POST" class="mt-6 flex flex-col gap-4">
    @csrf
    @method('PATCH')

    <div x-data="{ open: false, selected: '{{ $reading->status }}', options: ['lendo', 'pausado', 'concluido'] }" class="relative w-full">
        <button @click="open = !open" type="button"
            class="w-full bg-elevated border border-default rounded-lg px-4 py-2 text-left focus:outline-none focus:ring-2 focus:ring-brand flex justify-between items-center">
            <span x-text="selected.charAt(0).toUpperCase() + selected.slice(1)"></span>
            <div :class="{ 'rotate-180': open }" class="transition-transform duration-200">
                <x-heroicon-o-chevron-down class="w-4 h-4 text-gray-500" />
            </div>
        </button>

        <ul x-show="open" @click.away="open = false"
            class="absolute z-50 mt-1 w-full bg-elevated border border-default rounded-lg shadow-lg max-h-60 overflow-auto">
            <template x-for="option in options" :key="option">
                <li @click="selected = option; open = false"
                    class="cursor-pointer px-4 py-2 hover:bg-base hover:text-heading"
                    :class="{ 'bg-brand text-heading': selected === option }">
                    <span x-text="option.charAt(0).toUpperCase() + option.slice(1)"></span>
                </li>
            </template>
        </ul>

        <input type="hidden" name="status" :value="selected" />
    </div>


    <div class="flex justify-end gap-4">
        <x-button type="button" @click="open = false" variant="secundary">Cancelar</x-button>
        <x-button type="submit">Salvar</x-button>
    </div>
</form>
