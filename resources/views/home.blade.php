@extends('layouts.app')

@section('content')
    <section class="flex items-center justify-center" style="min-height: calc(100vh - 80px)">
        <div class="text-center max-w-5xl">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 text-heading">
                Explore um Mundo de Leitura e Descubra Novos Livros <span
                    class="text-brand">Incríveis</span>!
            </h1>
            <div class="max-w-3xl m-auto">
                <p class="text-lg text-zinc-500 mb-6">
                    Está em busca de uma nova leitura? Nossa plataforma conecta você a uma comunidade de amantes de livros,
                    com recomendações personalizadas e avaliações de diferentes gêneros.
                </p>
            </div>
            <x-button>Começar agora mesmo!</x-button>
        </div>
    </section>
@endsection
