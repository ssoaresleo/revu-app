 <form action="{{ route('feed.status.store') }}" method="POST" class="space-y-4">
     @csrf

     <h3 class="text-2xl font-bold mb-4 text-heading">Marque o que você está lendo</h3>

     <div>
         <label for="book_title" class="block text-sm font-medium text-heading mb-1">Título do
             livro</label>
         <input id="book_title" name="book_title" type="text" required placeholder="Digite o título do livro"
             class="w-full rounded border border-default px-3 py-2 text-body focus:outline-none focus:ring-2 focus:ring-brand transition" />
     </div>

     <div x-data="{ selected: '' }">
         <select id="genre" name="genre" x-model="selected"
             class="w-full rounded border border-default px-3 py-2 text-body focus:outline-none focus:ring-2 focus:ring-brand transition">
             <option value="" selected>Selecione um gênero</option>
             @foreach ($genres as $genre)
                 <option value="{{ $genre->name }}">{{ $genre->name }}</option>
             @endforeach
             <option value="outro">Outro</option>
         </select>

         <input x-show="selected === 'outro'" type="text" name="custom_genre" placeholder="Digite outro gênero"
             class="mt-2 w-full rounded border border-default px-3 py-2 text-body focus:outline-none focus:ring-2 focus:ring-brand transition" />
     </div>


     <input type="hidden" name="status" value="lendo" />

     <div class="flex justify-end gap-4">
         <x-button type="button" @click="open = false" variant="secundary">Cancelar</x-button>
         <x-button type="submit" @click="step = 2">Confirmar</x-button>
     </div>
 </form>
