@extends('layouts.app')

@section('content')
    <section class="flex-1">
        <x-feed.post.create-post :genres="$genres" />
        <x-feed.post.home :posts="$posts" />
    </section>
@endsection
