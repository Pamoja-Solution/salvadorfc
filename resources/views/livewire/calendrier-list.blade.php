<div>
    <div class="p-6 dark:bg-gradient-to-br dark:from-gray-900 dark:to-gray-800 dark:text-white rounded-lg shadow-lg border-t-4 border-white">
        <div class="flex justify-between items-center mb-6">
            <div class="relative w-1/3">
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Rechercher..." 
                       class="w-full p-3 pl-10 rounded-lg dark:bg-gray-800/60 border dark:border-gray-700 dark:text-white placeholder-gray-300 focus:ring-2 focus:ring-white outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-3 top-3.5 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            
            <select wire:model.live="selectedType" class="p-3 rounded-lg dark:bg-gray-800/60 border dark:border-gray-700 dark:text-white focus:ring-2 focus:ring-white">
                <option value="">Tous les types</option>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->nom }}</option>
                @endforeach
            </select>
        </div>
    
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse($calendriers as $calendrier)
                <a href="{{ route('calendriers.show', $calendrier) }}" 
                   class="flex flex-col h-full p-5 bg-gradient-to-br from-gray-300/80 to-gray-200/80 hover:from-gray-200 hover:to-gray-300  dark:bg-gradient-to-br dark:from-gray-800/80 dark:to-gray-700/80 dark:hover:from-gray-700 dark:hover:to-gray-600 transition-all duration-300 rounded-lg shadow-md hover:shadow-xl border-l-4 border-white transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-3">
                        <h2 class="text-xl font-bold dark:text-white">{{ $calendrier->titre }}</h2>
                        <span class="px-3 py-1 text-xs font-semibold rounded-full dark:bg-white bg-gray-800 dark:text-gray-800 text-gray-200">
                            {{ $calendrier->type->nom ?? 'Non catégorisé' }}
                        </span>
                    </div>
                    
                    <p class="dark:text-gray-200 text-sm flex-grow mb-4">
                        {!! Str::limit(strip_tags($calendrier->description), 100) !!}
                    </p>
                    
                    <div class="flex justify-between items-center pt-3 border-t border-gray-600/50 mt-auto">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 dark:text-white mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="text-sm text-gray-700 dark:text-white">
                                {{ \Carbon\Carbon::parse($calendrier->date_debut)->translatedFormat('d M Y') }}
                            </span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700 dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </div>
                </a>
            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 p-10 text-center bg-gray-100 dark:bg-gray-800/60 rounded-lg border border-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-700 dark:text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <p class="dark:text-gray-300 text-lg font-medium">Aucun événement trouvé.</p>
                    <p class="text-gray-400 mt-2">Essayez de modifier vos critères de recherche.</p>
                </div>
            @endforelse
        </div>
    
        <div class="mt-6">
            {{ $calendriers->links() }}
        </div>
    </div>
</div>
