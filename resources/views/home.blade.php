@extends('layouts.app')

@section('content')
    <section class="flex items-center justify-center" style="min-height: calc(100vh - 80px)">
        <div class="text-center max-w-5xl">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                Explore um Mundo de Leitura e Descubra Novos Livros <span
                    class="bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 bg-clip-text text-transparent">Incríveis</span>!
            </h1>
            <div class="max-w-3xl m-auto">
                <p class="text-lg text-zinc-500 mb-6">
                    Está em busca de uma nova leitura? Nossa plataforma conecta você a uma comunidade de amantes de livros,
                    com recomendações personalizadas e avaliações de diferentes gêneros.
                </p>
            </div>
            <a href="#"
                class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Começar
                agora mesmo!</a>
        </div>
    </section>
@endsection
