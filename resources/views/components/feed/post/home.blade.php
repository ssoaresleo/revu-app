@foreach ($posts as $post)
    <x-feed.post.post-item :post="$post" />
@endforeach
