@extends('layouts.register')

@section('content')
    @php
        $currentStep = 4;
    @endphp

    <section class="min-h-screen relative flex flex-col items-center justify-center px-4 pb-20 text-center">
        <div class="flex flex-col items-center">
            <div class="mb-6">
                <img src="{{ asset('image/complete.png') }}" alt="Conta criada com sucesso" class="mx-auto">
            </div>
            <h1 class="text-2xl font-bold text-primary mb-2 text-heading">
                Conta criada com sucesso!
            </h1>
            <p class="max-w-md mb-10 text-span">
                Bem-vindo, usuário! Agora você pode explorar nossos livros, receber recomendações
                personalizadas e muito mais.
            </p>
            <x-button>Começar a explorar</x-button>
        </div>
        <div class="w-full py-6 flex justify-center space-x-4 absolute bottom-0 left-0">
            @for ($i = 1; $i <= 4; $i++)
                <div
                    class="{{ $currentStep == $i ? 'bg-brand' : 'bg-elevated' }}
                {{ $currentStep == $i ? 'w-16' : ($currentStep > $i ? 'w-12' : 'w-8') }}
                h-2 rounded transition-all duration-300">
                </div>
            @endfor
        </div>
    </section>
@endsection
