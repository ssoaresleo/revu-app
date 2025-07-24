@extends('layouts.app')

@section('content')
    <section class="flex items-center justify-center">
        <div class="flex items-start mt-8 justify-between w-full max-w-screen-xl">
            <div>
                <h1 class="text-3xl font-bold mb-4">Crie sua conta!</h1>
                <p class="text-zinc-500 max-w-2xl">Junte-se à comunidade de leitores que avaliam, comentam e discutem sobre seus
                    livros favoritos. Compartilhe suas opiniões e descubra novas leituras através das experiências de outros
                    apaixonados por livros</p>
            </div>

            <form method="POST" action="{{ route('insert-account') }}"
                class="space-y-4 md:space-y-6 w-full max-w-md bg-zinc-900 p-6 rounded-lg" action="#">
                @csrf
                <div>
                    <input type="name" name="name" id="name"
                        class="bg-zinc-950 border border-zinc-800 text-zinc-200 text-sm rounded-lg focus:ring-zinc-600 focus:border-zinc-600 block w-full p-2.5"
                        placeholder="Insira seu nome" required>
                </div>

                <div>
                    <input type="email" name="email" id="email"
                        class="bg-zinc-950 border border-zinc-800 text-zinc-200 text-sm rounded-lg focus:ring-zinc-600 focus:border-zinc-600 block w-full p-2.5"
                        placeholder="Insira um E-mail" required>
                </div>

                <div>
                    <input type="password" name="password" id="password" placeholder="Crie uma senha"
                        class="bg-zinc-950 border border-zinc-800 text-zinc-200 text-sm rounded-lg focus:ring-zinc-600 focus:border-zinc-600 block w-full p-2.5"
                        required>
                </div>

                <x-button type="submit" variant='gradient' class="w-full">Criar nova conta</x-button>

                <p class="text-sm text-center font-light text-zinc-400">
                    Já tem uma conta? <a href="{{ route('login') }}" class="underline text-zinc-300">Entrar aqui</a>
                </p>
            </form>
        </div>
    </section>
@endsection
