@extends('layouts.app')

@section('content')
    <section class="flex items-center justify-center">
        <div class="flex items-start mt-8 justify-between w-full max-w-screen-xl">
            <div>
                <h1 class="text-3xl font-bold mb-4">Faça login</h1>
                <p class="text-zinc-500">Acesse sua conta e continue participando das discussões sobre seus livros favoritos.</p>
            </div>

            <form method="POST" action="{{ route('login') }}"
                class="space-y-4 md:space-y-6 w-full max-w-md bg-zinc-900 p-6 rounded-lg" action="#">
                @csrf
                <div>
                    <input type="email" name="email" id="email"
                        class="bg-zinc-950 border border-zinc-800 text-zinc-200 text-sm rounded-lg focus:ring-zinc-600 focus:border-zinc-600 block w-full p-2.5"
                        placeholder="Insira seu E-mail" required>
                </div>

                <div>
                    <input type="password" name="password" id="password" placeholder="Insira sua senha"
                        class="bg-zinc-950 border border-zinc-800 text-zinc-200 text-sm rounded-lg focus:ring-zinc-600 focus:border-zinc-600 block w-full p-2.5"
                        required>
                </div>

                <x-button type="submit" variant='gradient' class="w-full">Criar nova conta</x-button>

                <p class="text-sm text-center font-light text-zinc-400">
                    Ainda não tem uma conta? <a href="#" class="underline text-zinc-300">Crie
                        uma</a>
                </p>
            </form>
        </div>
    </section>
@endsection
