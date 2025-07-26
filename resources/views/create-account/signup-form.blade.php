@extends('layouts.register')

@section('content')
    @php
        $currentStep = 1;
    @endphp

    <section class="min-h-screen relative flex flex-col items-center px-4 pb-20">
        <div class="flex flex-col items-center justify-center flex-grow max-w-md w-full space-y-10">

            <div class="text-center max-w-2xl flex flex-col items-center justify-center">
                <img src="{{ asset('image/revuapp.svg') }}" alt="Ícone" class="mb-4">
                <div>
                    <h1 class="text-3xl text-heading font-bold mb-4">Bem-vindo ao Revuapp!</h1>
                    <p class="text-span">
                        Crie uma nova conta.
                    </p>
                </div>
            </div>

            <form method="POST" action="{{ route('create-account.index') }}"
                class="space-y-4 md:space-y-6 w-full p-6 rounded-lg">
                @csrf

                <div>
                    <label for="name" class="block mb-1 text-sm font-medium text-zinc-200">Nome</label>
                    <input type="text" name="name" id="name"
                        class="bg-zinc-950 border border-default text-zinc-200 text-sm rounded-lg block w-full p-2.5"
                        placeholder="Insira seu nome" required>
                </div>

                <div>
                    <label for="email" class="block mb-1 text-sm font-medium text-zinc-200">E-mail</label>
                    <input type="email" name="email" id="email"
                        class="bg-zinc-950 border border-default text-zinc-200 text-sm rounded-lg block w-full p-2.5"
                        placeholder="Insira um E-mail" required>
                </div>

                <div>
                    <label for="password" class="block mb-1 text-sm font-medium text-zinc-200">Senha</label>
                    <input type="password" name="password" id="password" placeholder="Crie uma senha"
                        class="bg-zinc-950 border border-default text-zinc-200 text-sm rounded-lg block w-full p-2.5"
                        required>
                </div>

                <x-button type="submit" variant="primary" class="w-full">Continuar</x-button>

                <p class="text-sm text-center font-light">
                    Já tem uma conta? <a href="{{ route('login') }}" class="underline text-brand">Entrar aqui</a>
                </p>
            </form>

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
