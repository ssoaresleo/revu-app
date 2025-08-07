@extends('layouts.app')

@section('content')
    <section class="flex-1">
        <x-feed.post.create-post :genres="$genres" />
        @foreach ($posts as $post)
            <x-feed.post.item :post="$post" />
        @endforeach
    </section>
@endsection
