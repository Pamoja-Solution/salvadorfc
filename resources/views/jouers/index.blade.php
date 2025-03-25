@extends("entete.base")
@section("contenus")
<section id="players" class="py-16 bg-gradient-to-br from-gray-900 to-gray-800 overflow-hidden">
    <div class="container mx-auto px-4 bg-gray-800/250 backdrop-blur-sm p-6 rounded-lg shadow-lg border border-gray-700/30">
        <!-- Titre -->
        <h4 class="text-3xl font-bold  text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-8">
           FC Salvador, Nos Joueurs
        </h4>

            <h3 class="text-2xl text-center font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-4">Gardiens</h3>
            <!-- Grille des joueurs -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($gardiens as $j)
                <a href="{{ route('joueur.show', ['jouer' => $j->id, 'slug' => Str::slug($j->nom)]) }}" 
                   class="relative block rounded-xl overflow-hidden group bg-gray-900 shadow-lg border border-gray-700 transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg hover:border-blue-500/50">
                    
                    <!-- Image -->
                    <div class="relative h-96">
                        @if ($j->photo)
                            <img src="{{ $j->imageUrl() }}" 
                            alt="{{ $j->nom }}" 
                            class="w-full h-full object-cover">
                            @else
                            <div class="w-full h-full flex justify-center items-center bg-gray-800">
                                <svg class="w-24 h-24 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            @endif
                        <!-- Dégradé foncé -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>

                        <!-- Informations du joueur (glisse au survol) -->
                        <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/90 to-transparent transform translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out">
                            <h3 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-2">
                                {{ $j->nom }}
                            </h3>
                            <p class="text-gray-300 mb-2">{{ $j->post->nom }} - {{ \Carbon\Carbon::parse($j->date_de_naissance)->age }} ans</p>
                            <p class="text-gray-400 text-sm">{{ Str::limit(strip_tags($j->historique), 150) }}</p>
                        </div>
                    </div>
                </a>
            @empty 
                <p class="text-center text-gray-400 col-span-full">Aucun joueur disponible.</p>
            @endforelse
        </div>



                    
            <div class="mt-6"><h3 class="text-2xl text-center font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-4">Défenseurs</h3></div>
                <!-- Grille des joueurs -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($defenseurs as $j)
                    <a href="{{ route('joueur.show',  ['jouer' => $j->id, 'slug' => Str::slug($j->nom)]) }}" 
                    class="relative block rounded-xl overflow-hidden group bg-gray-900 shadow-lg border border-gray-700 transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg hover:border-blue-500/50">
                        
                        <!-- Image -->
                        <div class="relative h-96">
                            @if ($j->photo)
                            <img src="{{ $j->imageUrl() }}" 
                            alt="{{ $j->nom }}" 
                            class="w-full h-full object-cover">
                            @else
                            <div class="w-full h-full flex justify-center items-center bg-gray-800">
                                <svg class="w-24 h-24 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            @endif
                            <!-- Dégradé foncé -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>

                            <!-- Informations du joueur (glisse au survol) -->
                            <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/90 to-transparent transform translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out">
                                <h3 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-2">
                                    {{ $j->nom }}
                                </h3>
                                <p class="text-gray-300 mb-2">{{ $j->post->nom }} - {{ \Carbon\Carbon::parse($j->date_de_naissance)->age }} ans</p>
                                <p class="text-gray-400 text-sm">{{ Str::limit(strip_tags($j->historique, 150)) }}</p>
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="text-center text-gray-400 col-span-full">Aucun joueur disponible.</p>
                @endforelse
            </div>



        <div class="mt-6"><h3 class="text-2xl text-center font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-4">Milieu</h3></div>
        <!-- Grille des joueurs -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($milieux as $j)
            <a href="{{ route('joueur.show',  ['jouer' => $j->id, 'slug' => Str::slug($j->nom)]) }}" 
            class="relative block rounded-xl overflow-hidden group bg-gray-900 shadow-lg border border-gray-700 transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg hover:border-blue-500/50">
                
                <!-- Image -->
                <div class="relative h-96">
                    @if ($j->photo)
                    <img src="{{ $j->imageUrl() }}" 
                    alt="{{ $j->nom }}" 
                    class="w-full h-full object-cover">
                    @else
                    <div class="w-full h-full flex justify-center items-center bg-gray-800">
                        <svg class="w-24 h-24 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    @endif

                    <!-- Dégradé foncé -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>

                    <!-- Informations du joueur (glisse au survol) -->
                    <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/90 to-transparent transform translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out">
                        <h3 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-2">
                            {{ $j->nom }}
                        </h3>
                        <p class="text-gray-300 mb-2">{{ $j->post->nom }} - {{ \Carbon\Carbon::parse($j->date_de_naissance)->age }} ans</p>
                        <p class="text-gray-400 text-sm">{{ Str::limit(strip_tags($j->historique), 150) }}</p>
                    </div>
                </div>
            </a>
        @empty
            <p class="text-center text-gray-400 col-span-full">Aucun joueur disponible.</p>
        @endforelse
    </div>








    <div class="mt-6"><h3 class="text-2xl text-center font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-4">Attaquants</h3></div>
    <!-- Grille des joueurs -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($attaquants as $j)
            <a href="{{ route('joueur.show',  ['jouer' => $j->id, 'slug' => Str::slug($j->nom)]) }}" 
            class="relative block rounded-xl overflow-hidden group bg-gray-900 shadow-lg border border-gray-700 transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg hover:border-blue-500/50">
                
                <!-- Image -->
                <div class="relative h-96">
                    @if ($j->photo)
                    <img src="{{ $j->imageUrl() }}" 
                    alt="{{ $j->nom }}" 
                    class="w-full h-full object-cover">
                    @else
                    <div class="w-full h-full flex justify-center items-center bg-gray-800">
                        <svg class="w-24 h-24 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    @endif
                        
                        
                    <!-- Dégradé foncé -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>

                    <!-- Informations du joueur (glisse au survol) -->
                    <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/90 to-transparent transform translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out">
                        <h3 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-2">
                            {{ $j->nom }}
                        </h3>
                        <p class="text-gray-300 mb-2">{{ $j->post->nom }} - {{ \Carbon\Carbon::parse($j->date_de_naissance)->age }} ans</p>
                        <p class="text-gray-400 text-sm">{{ Str::limit(strip_tags($j->historique, 150)) }}</p>
                    </div>
                </div>
            </a>
        @empty
            <p class="text-center text-gray-400 col-span-full">Aucun joueur disponible.</p>
        @endforelse
    </div>
</div>


</div>


</div>

</section>
@include("entete.footer")

@endsection