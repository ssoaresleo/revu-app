@extends('layouts.register')

@section('content')
    @php
        $currentStep = 2;
        $genres = [
            ['id' => 1, 'name' => 'Ficção Científica', 'icon' => 'ficcao'],
            ['id' => 2, 'name' => 'Romance', 'icon' => 'romance'],
            ['id' => 3, 'name' => 'Fantasia', 'icon' => 'fantasia'],
            ['id' => 4, 'name' => 'Terror', 'icon' => 'terror'],
            ['id' => 5, 'name' => 'Suspense', 'icon' => 'suspense'],
            ['id' => 6, 'name' => 'Biografia', 'icon' => 'biografia'],
            ['id' => 7, 'name' => 'Drama', 'icon' => 'drama'],
            ['id' => 8, 'name' => 'Autoajuda', 'icon' => 'autoajuda'],
            ['id' => 9, 'name' => 'Mistério', 'icon' => 'misterio'],
            ['id' => 10, 'name' => 'História', 'icon' => 'book'],
            ['id' => 11, 'name' => 'Poesia', 'icon' => 'poesia'],
            ['id' => 12, 'name' => 'Aventura', 'icon' => 'aventura'],
        ];

    @endphp

    <section class="min-h-screen relative flex flex-col items-center px-4 pb-20">
        <div class="flex-grow flex items-center justify-center">
            <div class="w-full max-w-5xl px-4 text-center">
                <h1 class="text-3xl font-bold mb-4 text-heading">Escolha seus gêneros favoritos</h1>
                <p class="text-span mb-8">Selecione os gêneros de livros que você mais gosta para receber recomendações
                    personalizadas e participar de discussões interessantes.</p>

                <form method="POST" action="{{ route('register.select-genres') }}">
                    @csrf

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">
                        @foreach ($genres as $genre)
                            <label class="relative cursor-pointer group">
                                <input type="checkbox" name="genres[]" value="{{ $genre['id'] }}" class="sr-only peer" />
                                <div
                                    class="border border-default rounded-lg p-4 relative flex flex-col items-center text-center transition-all peer-checked:border-brand peer-checked:bg-elevated">
                                    <x-icon-genres :name="$genre['icon']" />
                                    <p class="text-sm font-medium text-zinc-100">{{ $genre['name'] }}</p>
                                </div>
                            </label>
                        @endforeach
                    </div>

                    <div class="flex items-end w-full justify-end gap-4">
                        <x-button type="submit" variant='secondary'>
                            Voltar
                        </x-button>
                        <x-button type="submit">
                            Continuar
                        </x-button>
                    </div>
                </form>
            </div>
        </div>

        <div class="w-full py-6 flex justify-center space-x-4 absolute bottom-0 left-0">
            @for ($i = 1; $i <= 4; $i++)
                <div
                    class="{{ $currentStep == $i ? 'bg-brand' : 'bg-elevated' }}
        {{ $currentStep == $i ? 'w-16' : ($currentStep > $i ? 'w-12' : 'w-8') }} h-2 rounded transition-all duration-300">
                </div>
            @endfor
        </div>

    </section>
@endsection
