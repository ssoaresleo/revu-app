@extends('layouts.app')

@php
    $posts = auth()->user()->posts()->latest()->get();
@endphp

@section('content')
    <section class="flex-1 overflow-y-auto">
        <div
            class="flex items-center gap-4 px-4 py-3 border rounded-3xl border-default sticky top-0 z-40 bg-elevated mt-6 mb-4">
            <a href="{{ url()->previous() }}" class="text-brand-light">
                <x-heroicon-o-arrow-left class="w-5 h-5" />
            </a>
            <div class="flex flex-col items-start">
                <span class="font-semibold text-heading">{{ auth()->user()->name }}</span>
                <span class="text-sm text-gray-500">
                    0 posts
                </span>
            </div>
            <div class="w-5 h-5"></div>
        </div>
        <div class="w-full h-48 border-2 border-dashed border-default bg-muted/20 rounded-3xl"></div>
        <div class="relative px-6">
            <div class="absolute -top-16">
                <div class="w-32 h-32 rounded-full overflow-hidden shadow-md">
                    <x-user-profile-picture :user="auth()->user()" />
                </div>
            </div>
            <div class="absolute right-6 top-4">
                <x-button size="sm">Editar perfil</x-button>
            </div>
        </div>
        <div class="pt-20">
            <h2 class="text-2xl font-bold text-heading">{{ auth()->user()->name }}</h2>
            <p class="text-gray-500 text-sm">{{ '@' . auth()->user()->username }}</p>

            <p class="text-sm text-body leading-relaxed pt-2">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto illo aut temporibus quas ex eaque,
                laudantium animi quos, et quisquam nostrum accusamus porro nulla. Hic incidunt sapiente eos inventore
                minima.
            </p>
        </div>
        <div class="flex space-x-6 mt-4 text-sm text-gray-600">
            <div>
                <span class="font-bold text-heading">0</span> Seguidores
            </div>
            <div>
                <span class="font-bold text-heading">0</span> Seguindo
            </div>
            <div>
                <span class="font-bold text-heading">0</span> Posts
            </div>
        </div>
        <div class="border-b border-brand-light text-center text-brand-light pt-6 pb-4 font-semibold">
            Posts
        </div>
        <div>
            @foreach ($posts as $post)
                <x-feed.post.post-item :post="$post" />
            @endforeach
        </div>
    </section>
@endsection
