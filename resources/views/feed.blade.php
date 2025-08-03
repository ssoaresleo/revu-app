@extends('layouts.app')

@section('content')
    <section class="flex-1 overflow-y-auto">
        <x-feed.post.create-post />
        <x-feed.post.home :posts="$posts" />
    </section>
@endsection
