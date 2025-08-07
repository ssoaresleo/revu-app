     <div x-data="{ open: false, step: 1 }" class="inline-block">
         <div class="cursor-pointer" @click="open = true; step = 1">
             <x-fas-book class="size-6" />
         </div>

         <div x-show="open" x-transition.opacity
             class="fixed inset-0 flex items-center justify-center z-50 bg-black/50 p-4 overflow-auto">

             <div @click.away="open = false"
                 class="bg-elevated border border-default rounded-lg p-6 w-full max-w-xl flex flex-col gap-6">

                 <template x-if="step === 1">
                     @php
                         $reading = auth()->user()->userReadings()->latest()->first();
                         $status = $reading->status ?? null;

                     @endphp
                     @if ($status && $status !== 'concluido')
                         <div>
                             <h3 class="text-2xl font-bold text-heading mb-2">Estou lendo</h3>
                             <p class="text-sm text-span mb-4">Gerencie o progresso do seu livro atual.</p>

                             <div class="flex items-start gap-4 border border-default rounded-lg p-4 bg-muted/40">
                                 <x-fas-book class="size-8 text-brand-light flex-shrink-0" />
                                 <div class="flex-1">
                                     <p class="text-lg font-semibold text-body">{{ $reading->book_title }}
                                     </p>
                                     @if ($reading->genre)
                                         <p class="text-sm text-span mb-1">{{ $reading->genre }}</p>
                                     @endif
                                     <p class="text-sm text-span capitalize">
                                         Status atual: <span class="font-medium text-body">{{ $reading->status }}</span>
                                     </p>
                                 </div>
                             </div>

                             <x-feed.post.update-reading-status :reading="$reading" />
                         </div>
                     @endif
                     <div>
                         <h3 class="text-2xl font-bold mb-4 text-heading">Compartilhe sua leitura atual</h3>
                         <p class="mb-6 text-sm text-span">
                             Inspire outros leitores mostrando o que você está lendo no seu perfil.
                         </p>

                         <div class="flex justify-end gap-4">
                             <x-button type="button" @click="open = false" variant="secundary">Cancelar</x-button>
                             <x-button type="button" @click="step = 2">Continuar</x-button>
                         </div>
                     </div>
                 </template>

                 <template x-if="step === 2">
                     <x-feed.post.new-reading :genres="$genres"/>
                 </template>
             </div>
         </div>
     </div>
