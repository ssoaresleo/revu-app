<div class="flex gap-6 mt-6 mb-4 px-8 py-6 border rounded-3xl border-default bg-elevated">
    <div class="size-12 rounded-full overflow-x-hidden">
        <x-user-avatar :user="auth()->user()" />
    </div>
    <div class="flex-1">
        <textarea name="content" rows="2" placeholder="Avalie e descubra seu próximo livro favorito."
            class="w-full min-h-14 outline-none text-lg text-body bg-transparent resize-none"></textarea>

        <div class="flex justify-between items-center mt-2">
            <div class="flex items-center gap-4">
                <div class="cursor-pointer">
                    <x-bi-image-fill class="size-6" />
                </div>
                <x-feed.post.reading-modal :genres="$genres" />
            </div>
            <div class="w-28">
                <x-button>Postar</x-button>
            </div>
        </div>

    </div>
</div>
