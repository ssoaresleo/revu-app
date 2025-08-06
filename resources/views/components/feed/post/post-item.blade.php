<div class="flex gap-2 p-6 border border-default bg-elevated mb-4 rounded-3xl">
    <div>
        <a href="#">
            <x-user-avatar :user="$post->user" />
        </a>
    </div>
    <div class="flex-1">
        <div class="flex flex-wrap items-center gap-x-3">
            <div class="font-bold text-heading">{{ $post->user->name }}</div>
            <div class="text-span text-xs">
                {{ '@' . $post->user->username }}
            </div>
        </div>
        <div class="py-4">
            {{ $post->content }}
        </div>
        @if ($post->image_path)
            <div class="w-full">
                <img src="{{ $post->image_path }}" alt="#" class="rounded-xl max-h-96 object-cover w-full">
            </div>
        @endif
        <div class="flex mt-6 text-span">
            <div class="flex-1">
                <a href="#">
                    <div class="inline-flex items-center gap-2 cursor-pointer">
                        <x-far-comment class="size-6" />
                        <div class="">{{ $post->likesCount() }}</div>
                    </div>
                </a>
            </div>
            <div class="flex-1">
                <div class="inline-flex items-center gap-2 cursor-pointer">
                    <x-heroicon-o-arrow-path class="size-6" />
                    <div class="">{{ $post->reposts()->count() }}</div>
                </div>
            </div>
            <div class="flex-1">
                <div class="inline-flex items-center gap-2 cursor-pointer">
                    <x-heroicon-o-heart class="size-6" />
                    <div class="">{{ $post->likes()->count() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
