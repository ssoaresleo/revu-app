@extends('layouts.register')

@section('content')
    @php
        $currentStep = 3;
        $account = session('form_data_account');
        $email = $account['email'] ?? 'email@exemplo.com';
        $nomeCompleto = $account['name'];
        $inicial = strtoupper(substr($nomeCompleto, 0, 1));
    @endphp

    <section class="min-h-screen flex items-center justify-center px-4 pb-20">
        <div class="w-full max-w-4xl flex flex-col md:flex-row gap-10 items-start">
            <form method="POST" action="{{ route('register.profile-settings') }}" enctype="multipart/form-data"
                class="flex w-full flex-col md:flex-row gap-10 items-start">
                @csrf

                <div class="flex flex-col items-center gap-2">
                    <div class="w-28 h-28 rounded-full bg-elevated text-heading text-4xl font-bold flex items-center justify-center shadow"
                        id="avatarContainer">
                        {{ $inicial }}
                    </div>

                    <label for="profile_picture" class="text-sm text-brand cursor-pointer hover:underline">
                        Alterar foto
                    </label>
                    <input type="file" name="profile_picture" id="profile_picture" accept="image/*" class="hidden">
                </div>

                <div class="flex-1 space-y-6">
                    <div>
                        <label for="name" class="block mb-1 text-sm font-medium text-zinc-200">Nome completo</label>
                        <input type="text" disabled name="name" id="name" readonly
                            value="{{ old('name', $nomeCompleto) }}"
                            class="bg-elevated text-span text-sm rounded-lg w-full p-2.5 cursor-not-allowed">
                    </div>
                    <div>
                        <label for="email" class="block mb-1 text-sm font-medium text-zinc-200">Email</label>
                        <input type="email" disabled name="email" id="email" readonly
                            value="{{ old('email', $email) }}"
                            class="bg-elevated text-span text-sm rounded-lg w-full p-2.5 cursor-not-allowed">
                    </div>
                    <div>
                        <label for="username" class="block mb-1 text-sm font-medium text-zinc-200">Como deseja ser
                            chamado?</label>
                        <input type="text" name="username" id="username"
                            value="{{ old('username', \Illuminate\Support\Str::slug($nomeCompleto, '_')) }}"
                            class="bg-zinc-950 border border-default text-zinc-200 text-sm rounded-lg w-full p-2.5"
                            required>
                    </div>
                    <div>
                        <label for="bio" class="block mb-1 text-sm font-medium text-zinc-200">Bio</label>
                        <textarea name="bio" id="bio" rows="3"
                            class="bg-zinc-950 border border-default text-zinc-200 text-sm rounded-lg w-full p-2.5"
                            placeholder="Conte um pouco sobre você...">{{ old('bio') }}</textarea>
                    </div>
                    <div class="flex w-full items-center justify-end gap-2">
                        <x-button type="submit" variant="secoundary">
                            Voltar
                        </x-button>
                        <x-button type="submit">
                            Finalizar
                        </x-button>
                    </div>
                </div>
            </form>
        </div>

        <div class="w-full py-6 flex justify-center space-x-4 absolute bottom-0 left-0">
            @for ($i = 1; $i <= 4; $i++)
                <div
                    class="{{ $currentStep == $i ? 'bg-brand' : 'bg-elevated' }} {{ $currentStep == $i ? 'w-16' : ($currentStep > $i ? 'w-12' : 'w-8') }} h-2 rounded transition-all duration-300">
                </div>
            @endfor
        </div>
    </section>

    <script>
        document.getElementById('profile_picture').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();

            reader.onload = function(e) {
                const avatarContainer = document.getElementById('avatarContainer');
                avatarContainer.innerHTML = '';
                const img = document.createElement('img');
                img.src = e.target.result;
                img.alt = "Avatar Preview";
                img.classList.add('w-full', 'h-full', 'object-cover', 'rounded-full');
                avatarContainer.appendChild(img);
            };

            reader.readAsDataURL(file);
        });
    </script>
@endsection
