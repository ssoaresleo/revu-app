@extends('layouts.register')

@section('content')
    @php
        $currentStep = 3;
        $nomeCompleto = 'João Silva';
        $inicial = strtoupper(substr($nomeCompleto, 0, 1));
    @endphp

    <section class="min-h-screen relative flex flex-col items-center px-4 pb-20">
        <div class="flex-grow flex items-center justify-center w-full max-w-md text-center mt-8">
            <div class="w-full">

                <div class="mb-6">
                    <h1 class="text-3xl font-bold mb-2 text-heading">Configurações do seu perfil</h1>
                    <p class="text-span">Defina como deseja ser chamado e personalize seu perfil.</p>
                </div>

                <form method="POST" enctype="multipart/form-data" class="w-full">
                    @csrf

                    <div class="flex flex-col items-center mb-6">
                        <div class="w-28 h-28 rounded-full bg-elevated text-heading text-4xl font-bold flex items-center justify-center shadow mb-2"
                            id="avatarContainer">
                            {{ $inicial }}
                        </div>

                        <label for="profile_picture" class="block mb-1 text-sm font-medium text-brand cursor-pointer">Editar
                            foto</label>
                        <input type="file" name="profile_picture" id="profile_picture" accept="image/*" class="hidden">
                    </div>

                    <div class="text-left mb-4">
                        <label for="username" class="block mb-1 text-sm font-medium text-zinc-200">Como deseja ser
                            chamado?</label>
                        <input type="text" name="username" id="username"
                            class="bg-zinc-950 border border-default text-zinc-200 text-sm rounded-lg block w-full p-2.5"
                            placeholder="Insira seu username" required>
                    </div>

                    <div class="text-left mb-4">
                        <label for="username" class="block mb-1 text-sm font-medium text-zinc-200">Bio</label>
                        <textarea name="bio" id="bio" rows="3"
                            class="bg-zinc-950 border border-default text-zinc-200 text-sm rounded-lg block w-full p-2.5"
                            placeholder="Conte um pouco sobre você..."></textarea>
                    </div>

                    <x-button type="submit" class="w-full">
                        Concluir
                    </x-button>
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
