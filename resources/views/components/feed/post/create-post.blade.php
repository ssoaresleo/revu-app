<div class="flex gap-6 mt-6 mb-4 px-8 py-6 border rounded-3xl border-default bg-elevated">
    <div class="size-12 rounded-full overflow-x-hidden">
        <x-user-avatar :user="auth()->user()" />
    </div>
    <div class="flex-1">
        <textarea name="content" rows="2" placeholder="Avalie e descubra seu próximo livro favorito."
            class="w-full min-h-14 outline-none text-lg text-body bg-transparent resize-none"></textarea>

        <div class="flex justify-between items-center mt-2">
            <div class="flex items-center gap-4">
                <div class="cursor-pointer">
                    <x-bi-image-fill class="size-6" />
                </div>
                <div x-data="{ open: false, step: 1 }" class="inline-block">
                    <div class="cursor-pointer" @click="open = true; step = 1">
                        <x-fas-book class="size-6" />
                    </div>

                    <div x-show="open" x-transition.opacity
                        class="fixed inset-0 flex items-center justify-center z-50 bg-black/50 p-4 overflow-auto">

                        <div @click.away="open = false"
                            class="bg-elevated border border-default rounded-lg p-6 w-full max-w-xl flex flex-col gap-6">

                            <template x-if="step === 1">
                                @php
                                    $reading = auth()->user()->userReadings()->latest()->first();
                                    $status = $reading->status ?? null;

                                @endphp
                                @if ($status && $status !== 'concluido')
                                    <div>
                                        <h3 class="text-2xl font-bold text-heading mb-2">Estou lendo</h3>
                                        <p class="text-sm text-span mb-4">Gerencie o progresso do seu livro atual.</p>

                                        <div
                                            class="flex items-start gap-4 border border-default rounded-lg p-4 bg-muted/40">
                                            <x-fas-book class="size-8 text-brand-light flex-shrink-0" />
                                            <div class="flex-1">
                                                <p class="text-lg font-semibold text-body">{{ $reading->book_title }}
                                                </p>
                                                @if ($reading->genre)
                                                    <p class="text-sm text-span mb-1">{{ $reading->genre }}</p>
                                                @endif
                                                <p class="text-sm text-span capitalize">
                                                    Status atual: <span
                                                        class="font-medium text-body">{{ $reading->status }}</span>
                                                </p>
                                            </div>
                                        </div>

                                        <form action="{{ route('feed.status', $reading->id) }}" method="POST"
                                            class="mt-6 flex flex-col gap-4">
                                            @csrf
                                            @method('PATCH')

                                            <div x-data="{ open: false, selected: '{{ $reading->status }}', options: ['lendo', 'pausado', 'concluido'] }" class="relative w-full">
                                                <button @click="open = !open" type="button"
                                                    class="w-full bg-elevated border border-default rounded-lg px-4 py-2 text-left focus:outline-none focus:ring-2 focus:ring-brand flex justify-between items-center">
                                                    <span
                                                        x-text="selected.charAt(0).toUpperCase() + selected.slice(1)"></span>
                                                    <div :class="{ 'rotate-180': open }"
                                                        class="transition-transform duration-200">
                                                        <x-heroicon-o-chevron-down class="w-4 h-4 text-gray-500" />
                                                    </div>
                                                </button>

                                                <ul x-show="open" @click.away="open = false"
                                                    class="absolute z-50 mt-1 w-full bg-elevated border border-default rounded-lg shadow-lg max-h-60 overflow-auto">
                                                    <template x-for="option in options" :key="option">
                                                        <li @click="selected = option; open = false"
                                                            class="cursor-pointer px-4 py-2 hover:bg-base hover:text-heading"
                                                            :class="{ 'bg-brand text-heading': selected === option }">
                                                            <span
                                                                x-text="option.charAt(0).toUpperCase() + option.slice(1)"></span>
                                                        </li>
                                                    </template>
                                                </ul>

                                                <input type="hidden" name="status" :value="selected" />
                                            </div>


                                            <div class="flex justify-end gap-4">
                                                <x-button type="button" @click="open = false"
                                                    variant="secundary">Cancelar</x-button>
                                                <x-button type="submit">Salvar</x-button>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                                <div>
                                    <h3 class="text-2xl font-bold mb-4 text-heading">Compartilhe sua leitura atual</h3>
                                    <p class="mb-6 text-sm text-span">
                                        Inspire outros leitores mostrando o que você está lendo no seu perfil.
                                    </p>

                                    <div class="flex justify-end gap-4">
                                        <x-button type="button" @click="open = false"
                                            variant="secundary">Cancelar</x-button>
                                        <x-button type="button" @click="step = 2">Continuar</x-button>
                                    </div>
                                </div>
                            </template>

                            <template x-if="step === 2">
                                <form action="{{ route('feed.status.store') }}" method="POST" class="space-y-4">
                                    @csrf

                                    <h3 class="text-2xl font-bold mb-4 text-heading">Marque o que você está lendo</h3>

                                    <div>
                                        <label for="book_title"
                                            class="block text-sm font-medium text-heading mb-1">Título do livro</label>
                                        <input id="book_title" name="book_title" type="text" required
                                            placeholder="Digite o título do livro"
                                            class="w-full rounded border border-default px-3 py-2 text-body focus:outline-none focus:ring-2 focus:ring-brand transition" />
                                    </div>

                                    <div x-data="{ selected: '' }">
                                        <select id="genre" name="genre" x-model="selected"
                                            class="w-full rounded border border-default px-3 py-2 text-body focus:outline-none focus:ring-2 focus:ring-brand transition">
                                            <option value="" selected>Selecione um gênero</option>
                                            @foreach ($genres as $genre)
                                                <option value="{{ $genre->name }}">{{ $genre->name }}</option>
                                            @endforeach
                                            <option value="outro">Outro</option>
                                        </select>

                                        <input x-show="selected === 'outro'" type="text" name="custom_genre"
                                            placeholder="Digite outro gênero"
                                            class="mt-2 w-full rounded border border-default px-3 py-2 text-body focus:outline-none focus:ring-2 focus:ring-brand transition" />
                                    </div>


                                    <input type="hidden" name="status" value="lendo" />

                                    <div class="flex justify-end gap-4">
                                        <x-button type="button" @click="open = false"
                                            variant="secundary">Cancelar</x-button>
                                        <x-button type="submit" @click="step = 2">Confirmar</x-button>
                                    </div>
                                </form>
                            </template>
                        </div>
                    </div>
                </div>


            </div>
            <div class="w-28">
                <x-button>Postar</x-button>
            </div>
        </div>

    </div>
</div>
