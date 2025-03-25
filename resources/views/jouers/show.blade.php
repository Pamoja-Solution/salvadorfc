@extends("entete.base")
@section("titre", $jouer->nom)
@section("contenus")

    <!-- Contenu principal -->
    <div class="container mx-auto p-4 flex justify-center items-center min-h-screen">
        <div class="max-w-3xl w-full bg-gray-900/50 backdrop-blur-lg border border-gray-700 rounded-2xl shadow-2xl overflow-hidden transform transition-all hover:scale-[1.02]">
            
            <!-- En-tête -->
            <div class="bg-gradient-to-r from-purple-600 to-blue-500 p-6 text-center">
                <h1 class="text-2xl md:text-3xl font-bold text-white">{{ $jouer->nom }}</h1>
                <p class="text-gray-300 mt-2 text-sm md:text-base">Informations détaillées du joueur</p>
            </div>

            <!-- Corps -->
            <div class="p-4 md:p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                    <!-- Photo du joueur -->
                    <div class="flex justify-center items-center">
                        @if ($jouer->photo)
                        <img src="{{ asset('storage/' . $jouer->photo) }}" 
                             alt="{{ $jouer->nom }}" 
                             class="w-48 h-48 md:w-64 md:h-64 rounded-lg object-cover border-2 border-purple-500 shadow-lg transform transition-all hover:scale-110">
                        @else
                        <div class="w-48 h-48 md:w-64 md:h-64 flex justify-center items-center bg-gray-800 rounded-lg border-2 border-purple-500 shadow-lg transform transition-all hover:scale-110">
                            <svg class="w-16 h-16 md:w-24 md:h-24 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        @endif
                    </div>

                    <!-- Détails du joueur -->
                    <div class="space-y-3 md:space-y-4 text-white">
                        <div>
                            <h2 class="text-lg md:text-xl font-semibold text-purple-400">Âge</h2>
                            <p class="text-gray-300">{{ \Carbon\Carbon::parse($jouer->date_de_naissance)->age }} ans</p>
                        </div>

                        <div>
                            <h2 class="text-lg md:text-xl font-semibold text-purple-400">Date de naissance</h2>
                            <p class="text-gray-300">Le {{ \Carbon\Carbon::parse($jouer->date_de_naissance)->translatedFormat('j F Y') }}</p>
                        </div>

                        <div>
                            <h2 class="text-lg md:text-xl font-semibold text-purple-400">Poste</h2>
                            <p class="text-gray-300">{{ $jouer->post->nom }}</p>
                        </div>

                        <div>
                            <h2 class="text-lg md:text-xl font-semibold text-purple-400">Club actuel</h2>
                            <p class="text-gray-300">{{ 'FC Salvador' }}</p>
                        </div>

                        <div>
                            <h2 class="text-lg md:text-xl font-semibold text-purple-400">Nombre de buts</h2>
                            <p class="text-gray-300">{{ $jouer->but }}</p>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="mt-6">
                    <!-- Grille responsive pour les statistiques -->
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3 mb-4">
                        <div class="border-2 border-purple-500 shadow-lg py-2 px-3 rounded-lg">
                            <h2 class="text-lg md:text-xl font-semibold text-purple-400">Match</h2>
                            <p class="text-gray-300 font-bold">{{ $jouer->matches }}</p>
                        </div>

                        <div class="border-2 border-purple-500 shadow-lg py-2 px-3 rounded-lg">
                            <h2 class="text-lg md:text-xl font-semibold text-purple-400">Passe D.</h2>
                            <p class="text-gray-300 font-bold">{{ $jouer->passe }}</p>
                        </div>

                        <div class="border-2 border-purple-500 shadow-lg py-2 px-3 rounded-lg">
                            <h2 class="text-lg md:text-xl font-semibold text-purple-400">Nationalité</h2>
                            <p class="text-gray-300">{{ $jouer->nationnalite }}</p>
                        </div>

                        <div class="border-2 border-purple-500 shadow-lg py-2 px-3 rounded-lg">
                            <h2 class="text-lg md:text-xl font-semibold text-purple-400">Dorsale</h2>
                            <p class="text-gray-300">{{ $jouer->dorsale }}</p>
                        </div>

                        <div class="border-2 border-purple-500 shadow-lg py-2 px-3 rounded-lg">
                            <h2 class="text-lg md:text-xl font-semibold text-purple-400">Poids</h2>
                            <p class="text-gray-300">{{ $jouer->poids }} KG</p>
                        </div>

                        <div class="border-2 border-purple-500 shadow-lg py-2 px-3 rounded-lg">
                            <h2 class="text-lg md:text-xl font-semibold text-purple-400">Taille</h2>
                            <p class="text-gray-300">{{ $jouer->taille / 100 }} m</p>
                        </div>
                    </div>

                    <!-- Description du joueur -->
                    <h2 class="text-lg md:text-xl font-semibold text-purple-400">Description</h2>
                    <p class="text-gray-300 mt-2 text-sm md:text-base">{!! $jouer->historique !!}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Animation de fond -->
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-gray-950 to-gray-900"></div>
        <div class="absolute inset-0 flex justify-center items-center opacity-20">
            <div class="w-[300px] h-[300px] md:w-[600px] md:h-[600px] bg-purple-500 rounded-full blur-[100px] md:blur-[200px]"></div>
        </div>
    </div>
    @include("entete.footer")

@endsection