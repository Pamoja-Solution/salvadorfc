<div>
    <div class="fixed inset-0 z-[9999] flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm">
        <div class="bg-white p-6 rounded-lg shadow-2xl w-full max-w-3xl transform scale-95 animate-fadeIn">
            <!-- Titre et bouton de fermeture -->
            <div class="flex justify-between items-center border-b pb-3">
                <h3 class="text-xl font-semibold text-gray-800">🔎 Recherche Globale</h3> 
                <button wire:click="toggleModal"
                    class="text-gray-500 hover:text-red-500 transition"> ✖ </button>
            </div> <!-- Barre de recherche -->
            <div class="mt-4 relative"> 
                <input wire:model.live.debounce.300ms="searchTerm" type="text"
                    placeholder="Recherchez un post ou un événement..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                @if ($searchTerm)
                    <button wire:click="$set('searchTerm', '')"
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600"> ✖
                    </button>
                    @endif
            </div> <!-- Résultats -->
            <div class="mt-4 max-h-80 overflow-y-auto space-y-4">
                @if (!empty($results['posts']) || !empty($results['calendriers'])) <!-- Posts -->
                    @if (!empty($results['posts']))
                        <h4 class="text-gray-700 font-semibold">📌 Articles trouvés :</h4>
                        @foreach ($results['posts'] as $post)
                            <a href="{{ route('posts.show', $post->slug) }}"
                                class="block p-3 border rounded-lg hover:bg-gray-100 transition flex items-center"> <img
                                    src="{{ $post->image }}" alt="Image"
                                    class="w-16 h-16 rounded-lg object-cover mr-3">
                                <div>
                                    <h5 class="font-semibold text-gray-800">{{ $post->titre }}</h5>
                                    <p class="text-sm text-gray-500">{{ Str::limit($post->description, 50) }}</p>
                                </div>
                            </a>
                            @endforeach @endif <!-- Calendriers -->
                            @if (!empty($results['calendriers']))
                                <h4 class="text-gray-700 font-semibold mt-4">📅 Événements trouvés :</h4>
                                @foreach ($results['calendriers'] as $calendrier)
                                    <a href="{{ route('calendriers.show', $calendrier->slug) }}"
                                        class="block p-3 border rounded-lg hover:bg-gray-100 transition flex items-center">
                                        <div
                                            class="w-16 h-16 flex items-center justify-center bg-blue-500 text-white rounded-lg mr-3">
                                            {{ \Carbon\Carbon::parse($calendrier->date)->format('d M') }} </div>
                                        <div>
                                            <h5 class="font-semibold text-gray-800">{{ $calendrier->titre }}</h5>
                                            <p class="text-sm text-gray-500">
                                                {{ Str::limit($calendrier->description, 50) }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            @endif
                        @else
                            <p class="text-gray-500 text-center py-6">Aucun résultat trouvé 😕</p>
                        @endif
            </div> <!-- Bouton de fermeture -->
            <div class="mt-4 flex justify-end"> <button wire:click="toggleModal"
                    class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition"> ❌ Fermer </button>
            </div>
        </div>
    </div>
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.2s ease-out;
        }
    </style>
</div>
