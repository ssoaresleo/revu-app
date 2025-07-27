@extends('layouts.register')

@section('content')
    @php
        $hasLoginError = session()->has('status');
    @endphp

    <section class="min-h-screen relative flex flex-col items-center px-4 pb-20">
        <div class="flex flex-col items-center justify-center flex-grow max-w-md w-full space-y-10">

            <div class="text-center max-w-2xl flex flex-col items-center justify-center">
                <img src="{{ asset('image/revuapp.svg') }}" alt="Ícone" class="mb-4">
                <div>
                    <h1 class="text-3xl text-heading font-bold mb-4">Bem-vindo de volta!</h1>
                    <p class="text-span">
                        Entre com sua conta para continuar explorando livros e discussões literárias.
                    </p>
                </div>
            </div>


            <form method="POST" action="{{ route('login') }}" class="space-y-4 md:space-y-6 w-full p-6 rounded-lg">
                @csrf

                @if ($hasLoginError)
                    <div class="bg-red-950/25 border border-red-400 rounded-lg py-2.5 px-4 text-center">
                        <span class="text-red-400">{{ session('status') }}</span>
                    </div>
                @endif

                <div>
                    <label for="email" class="block mb-1 text-sm font-medium text-zinc-200">E-mail</label>
                    <input type="email" @class([
                        'bg-zinc-950 text-zinc-200 text-sm rounded-lg block w-full p-2.5 outline-none focus:ring-0 focus:border-brand',
                        'border border-default' => !$hasLoginError,
                        'border border-red-400' => $hasLoginError,
                    ]) name="email" value="{{ old('email') }}"
                        placeholder="Insira seu E-mail">
                </div>

                <div>
                    <label for="password" class="block mb-1 text-sm font-medium text-zinc-200">Senha</label>
                    <input type="password" @class([
                        'bg-zinc-950 text-zinc-200 text-sm rounded-lg block w-full p-2.5 outline-none focus:ring-0 focus:border-brand',
                        'border border-default' => !$hasLoginError,
                        'border border-red-400' => $hasLoginError,
                    ]) name="password" placeholder="Insira sua senha">
                </div>

                <x-button type="submit" variant="primary" class="w-full">Continuar</x-button>

                <p class="text-sm text-center font-light">
                    Não tem uma conta? <a href="#" class="underline text-brand">Crie uma</a>
                </p>
            </form>
        </div>
    </section>
@endsection
