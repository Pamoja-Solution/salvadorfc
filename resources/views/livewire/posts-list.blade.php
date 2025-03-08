<div>
   
    <div class="container mx-auto px-4 py-8">
        <div class="mb-6 bg-white dark:bg-gray-800/80 rounded-xl shadow-lg p-6">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                
                <!-- Barre de recherche -->
                <div class="w-full md:w-1/3">
                    <label for="search" class="sr-only">Rechercher</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input wire:model.live.debounce.300ms="search" id="search" type="text" placeholder="Rechercher un article..." 
                               class="pl-10 block w-full mb-6 rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/60 shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 dark:text-white transition">
                    </div>
                </div>
        
                <!-- Catégorie -->
                <div class="w-full md:w-1/4">
                    <label for="categorie" class="sr-only">Catégorie</label>
                    <select wire:model.live="categorieId" id="categorie" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Toutes les catégories</option>
                        @foreach($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                        @endforeach
                    </select>
                </div>
        
                <!-- Trier par -->
                <div class="w-full md:w-1/4">
                    <label for="orderBy" class="sr-only">Trier par</label>
                    <select wire:model.live="orderBy" id="orderBy" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="created_at">Date de publication</option>
                        <option value="titre">Titre</option>
                        <option value="temps">Temps de lecture</option>
                    </select>
                </div>
        
                <!-- Bouton de tri -->
                <div class="w-full md:w-auto">
                    <button wire:click="$set('orderDirection', '{{ $orderDirection === 'asc' ? 'desc' : 'asc' }}')" 
                            class="inline-flex mb-6 items-center justify-center w-full md:w-auto px-4 py-2 border border-gray-300 dark:border-gray-600 text-sm font-semibold rounded-lg text-gray-700 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                        {{ $orderDirection === 'asc' ? 'Croissant' : 'Décroissant' }}
                        <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            @if($orderDirection === 'asc')
                                <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                            @else
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            @endif
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($posts as $post)
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-sm overflow-hidden transition-transform duration-300 hover:shadow-md hover:-translate-y-1">
                    <a href="{{ route('posts.show', $post->slug) }}" class="block">
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->titre }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <svg class="h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6.5 20H21a2 2 0 002-2V6a2 2 0 00-2-2H6.5a2.5 2.5 0 000 5H20v10a2 2 0 01-2 2H6.5a2.5 2.5 0 000 5z" />
                                </svg>
                            </div>
                        @endif
                    </a>
                    
                    <div class="p-4">
                        <div class="flex items-center justify-between mb-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 dark:text-green-800 dark:text-gray-200">
                                {{ $post->categorie->name }}
                            </span>
                            
                            @if($post->temps)
                                <span class="text-xs text-gray-500 dark:text-gray-200 flex items-center">
                                    <svg class="h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                    {{ $post->temps }} min
                                </span>
                            @endif
                        </div>
                        
                        <a href="{{ route('posts.show', $post->slug) }}" class="block">
                            <h3 class="text-lg font-medium font-bold dark:text-gray-100 hover:text-indigo-600 mb-2">{{ Str::limit($post->titre,30) }}</h3>
                        </a>
                        
                        <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-3">
                            {{ Str::limit(strip_tags($post->contenus), 120) }}
                        </p>
                        
                        <div class="mt-4 flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-8 w-8">
                                    <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name) }}&color=7F9CF5&background=EBF4FF" alt="">
                                </div>
                                <div class="ml-2">
                                    <p class="text-xs dark:text-gray-100 font-bold text-gray-700">{{ $post->user->name }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $post->created_at->format('d M Y') }}</p>
                                </div>
                            </div>
                            
                            <a href="{{ route('posts.show', $post->slug) }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-800">
                                Lire plus <span aria-hidden="true">→</span>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="bg-white rounded-lg shadow-sm p-6 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="mt-2 text-lg font-medium text-gray-900">Aucun article trouvé</h3>
                        <p class="mt-1 text-sm text-gray-500">Essayez de modifier vos critères de recherche.</p>
                        <div class="mt-4">
                            <button wire:click="$set('search', ''); $set('categorieId', '')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                                Réinitialiser les filtres
                            </button>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    </div>
    
</div>