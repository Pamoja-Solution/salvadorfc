@extends('entete.base')
@section("contenus")
     <!-- Première section/Carousel de l'équipe -->
<div id="default-carousel" class="relative w-full z-40" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-96 overflow-hidden rounded-lg md:h-[600px]">
        <!-- Item 1 -->
        <div class="hidden duration-6000 ease-in-out" data-carousel-item>
            <img src="{{ asset('img/1740169349422.jpg') }}" class="absolute object-cover block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Équipe FC Salvador en action">
            <!-- Dégradé sombre et contenu texte -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent flex items-center justify-center text-center animate-fadeIn">
                <div class="max-w-2xl px-4">
                    <h1 class="text-4xl md:text-6xl font-bold text-white mb-4 animate-slideInDown">Bienvenue au FC Salvador</h1>
                    <p class="text-xl md:text-2xl text-purple-200 mb-6 animate-slideInUp">Une équipe jeune, dynamique et prometteuse au cœur de Kinshasa.</p>
                    <a href="#about" class="inline-block bg-purple-600 hover:bg-purple-700 text-white font-semibold px-6 py-3 rounded-lg transition duration-300 animate-fadeIn">
                        Découvrez notre histoire
                    </a>
                </div>
            </div>
        </div>

        <!-- Item 2 -->
        <div class="hidden duration-6000 ease-in-out" data-carousel-item>
            <img src="{{ asset('img/1740169356313.jpg') }}" class="absolute object-cover block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Entraînement intensif">
            <!-- Dégradé sombre et contenu texte -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent flex items-center justify-center text-center animate-fadeIn">
                <div class="max-w-2xl px-4">
                    <h1 class="text-4xl md:text-6xl font-bold text-white mb-4 animate-slideInDown">Notre Passion, Notre Engagement</h1>
                    <p class="text-xl md:text-2xl text-purple-200 mb-6 animate-slideInUp">Chaque entraînement est une étape vers l'excellence.</p>
                    <a href="#training" class="inline-block bg-purple-600 hover:bg-purple-700 text-white font-semibold px-6 py-3 rounded-lg transition duration-300 animate-fadeIn">
                        Voir nos entraînements
                    </a>
                </div>
            </div>
        </div>

        <!-- Item 3 -->
        <div class="hidden duration-6000 ease-in-out" data-carousel-item>
            <img src="{{ asset('img/1740169417088.jpg') }}" class="absolute object-cover block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Match en cours">
            <!-- Dégradé sombre et contenu texte -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent flex items-center justify-center text-center animate-fadeIn">
                <div class="max-w-2xl px-4">
                    <h1 class="text-4xl md:text-6xl font-bold text-white mb-4 animate-slideInDown">Des Matchs Mémorables</h1>
                    <p class="text-xl md:text-2xl text-purple-200 mb-6 animate-slideInUp">Rejoignez-nous pour vivre des moments inoubliables.</p>
                    <a href="#matches" class="inline-block bg-purple-600 hover:bg-purple-700 text-white font-semibold px-6 py-3 rounded-lg transition duration-300 animate-fadeIn">
                        Voir le calendrier
                    </a>
                </div>
            </div>
        </div>

        <!-- Item 4 -->
        <div class="hidden duration-6000 ease-in-out" data-carousel-item>
            <img src="{{ asset('img/1740169523721.jpg') }}" class="absolute object-cover block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Célébration d'une victoire">
            <!-- Dégradé sombre et contenu texte -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent flex items-center justify-center text-center animate-fadeIn">
                <div class="max-w-2xl px-4">
                    <h1 class="text-4xl md:text-6xl font-bold text-white mb-4 animate-slideInDown">Ensemble Vers la Victoire</h1>
                    <p class="text-xl md:text-2xl text-purple-200 mb-6 animate-slideInUp">Chaque victoire est le fruit du travail d'équipe.</p>
                    <a href="#achievements" class="inline-block bg-purple-600 hover:bg-purple-700 text-white font-semibold px-6 py-3 rounded-lg transition duration-300 animate-fadeIn">
                        Nos réalisations
                    </a>
                </div>
            </div>
        </div>

        <!-- Item 5 -->
        <div class="hidden duration-6000 ease-in-out" data-carousel-item>
            <img src="{{ asset('img/1740169797146.jpg') }}" class="absolute object-cover block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Équipe unie">
            <!-- Dégradé sombre et contenu texte -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent flex items-center justify-center text-center animate-fadeIn">
                <div class="max-w-2xl px-4">
                    <h1 class="text-4xl md:text-6xl font-bold text-white mb-4 animate-slideInDown">Rejoignez la Famille FC Salvador</h1>
                    <p class="text-xl md:text-2xl text-purple-200 mb-6 animate-slideInUp">Devenez membre et soutenez notre équipe.</p>
                    <a href="#join" class="inline-block bg-purple-600 hover:bg-purple-700 text-white font-semibold px-6 py-3 rounded-lg transition duration-300 animate-fadeIn">
                        Nous rejoindre
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <button type="button" class="w-3 h-3 rounded-full bg-white/50 hover:bg-white/80 transition duration-300" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full bg-white/50 hover:bg-white/80 transition duration-300" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full bg-white/50 hover:bg-white/80 transition duration-300" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full bg-white/50 hover:bg-white/80 transition duration-300" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full bg-white/50 hover:bg-white/80 transition duration-300" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
    </div>

    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 hover:bg-white/50 transition duration-300">
            <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 hover:bg-white/50 transition duration-300">
            <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>

  <!-- Deuxième section : Présentation de l'équipe -->
<section id="about" class="py-16 bg-gradient-to-br from-gray-900 to-gray-800 overflow-hidden">
    <div class="container mx-auto px-4">
        <!-- Titre de la section avec animation -->
        <h2 class="text-4xl md:text-5xl font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-12 opacity-0 transform translate-y-10 transition-all duration-1000 ease-out" id="team-title">
            Découvrez le FC Salvador
        </h2>

        <!-- Grille de contenu réorganisée -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            <!-- Galerie d'images avec carte interactive -->
            <div class="lg:col-span-6 mb-8 lg:mb-0 opacity-0 transform translate-x-10 transition-all duration-1000 ease-out" id="gallery-container">
                <div class="relative h-[550px] w-full rounded-xl overflow-hidden shadow-2xl bg-gradient-to-r from-purple-500/10 to-blue-500/10 p-2">
                    <!-- Galerie principale -->
                    <div class="relative h-full w-full rounded-lg overflow-hidden group">
                        <!-- Images avec effet carrousel -->
                        <div id="gallery-carousel" class="h-full">
                            <!-- Image 1 -->
                            <div id="image1" class="absolute inset-0 w-full h-full transition-all duration-700 ease-in-out opacity-100">
                                <img src="{{ asset('img/1740169797146.jpg') }}" alt="Photo de l'équipe FC Salvador" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-6">
                                    <span class="text-white text-xl font-semibold bg-gradient-to-r from-purple-500 to-blue-500 px-4 py-2 rounded-full shadow-lg transform transition-transform group-hover:scale-105">Une équipe, une famille</span>
                                </div>
                            </div>
                            <!-- Image 2 -->
                            <div id="image2" class="absolute inset-0 w-full h-full transition-all duration-700 ease-in-out opacity-0">
                                <img src="{{ asset('img/1740169523721.jpg') }}" alt="Photo secondaire 1" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-6">
                                    <span class="text-white text-xl font-semibold bg-gradient-to-r from-purple-500 to-blue-500 px-4 py-2 rounded-full shadow-lg transform transition-transform group-hover:scale-105">Passion et détermination</span>
                                </div>
                            </div>
                            <!-- Image 3 -->
                            <div id="image3" class="absolute inset-0 w-full h-full transition-all duration-700 ease-in-out opacity-0">
                                <img src="{{ asset('img/1740169349422.jpg') }}" alt="Photo secondaire 2" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-6">
                                    <span class="text-white text-xl font-semibold bg-gradient-to-r from-purple-500 to-blue-500 px-4 py-2 rounded-full shadow-lg transform transition-transform group-hover:scale-105">Avançons ensemble</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Contrôles de navigation -->
                        <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-3 z-10">
                            <button onclick="showImage(0)" class="w-3 h-3 rounded-full bg-white/50 transition-all duration-300 hover:bg-white image-dot active"></button>
                            <button onclick="showImage(1)" class="w-3 h-3 rounded-full bg-white/50 transition-all duration-300 hover:bg-white image-dot"></button>
                            <button onclick="showImage(2)" class="w-3 h-3 rounded-full bg-white/50 transition-all duration-300 hover:bg-white image-dot"></button>
                        </div>
                        
                        <!-- Flèches de navigation -->
                        <button class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white w-10 h-10 rounded-full flex items-center justify-center transition-all" onclick="prevImage()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </button>
                        <button class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white w-10 h-10 rounded-full flex items-center justify-center transition-all" onclick="nextImage()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Contenu texte -->
            <div class="lg:col-span-6 space-y-6">
                <!-- Histoire de l'équipe -->
                <div class="bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg shadow-lg border border-gray-700/30 opacity-0 transform translate-y-10 transition-all duration-1000 ease-out" id="history-section">
                    <h3 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-4">Notre Histoire</h3>
                    <p class="text-gray-100 leading-relaxed">
                        Fondé en 2020 au cœur de Kinshasa, le FC Salvador est bien plus qu'une équipe de football. 
                        C'est une famille de jeunes talents déterminés à repousser leurs limites et à représenter 
                        fièrement leur ville. Avec un esprit d'équipe inébranlable et une passion pour le jeu, 
                        nous nous efforçons de devenir une référence dans le football congolais.
                    </p>
                </div>

                <!-- Valeurs de l'équipe -->
                <div class="bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg shadow-lg border border-gray-700/30 opacity-0 transform translate-y-10 transition-all duration-1000 ease-out delay-100" id="values-section">
                    <h3 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-4">Nos Valeurs</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex items-center space-x-3 bg-gray-900/50 p-3 rounded-lg transition-all duration-300 hover:bg-gray-900/70 hover:translate-y-[-2px]">
                            <div class="bg-gradient-to-r from-purple-500 to-blue-500 rounded-full p-2 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                                </svg>
                            </div>
                            <div>
                                <span class="font-medium text-white">Esprit d'équipe</span>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 bg-gray-900/50 p-3 rounded-lg transition-all duration-300 hover:bg-gray-900/70 hover:translate-y-[-2px]">
                            <div class="bg-gradient-to-r from-purple-500 to-blue-500 rounded-full p-2 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                                </svg>
                            </div>
                            <div>
                                <span class="font-medium text-white">Persévérance</span>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 bg-gray-900/50 p-3 rounded-lg transition-all duration-300 hover:bg-gray-900/70 hover:translate-y-[-2px]">
                            <div class="bg-gradient-to-r from-purple-500 to-blue-500 rounded-full p-2 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                                </svg>
                            </div>
                            <div>
                                <span class="font-medium text-white">Respect</span>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 bg-gray-900/50 p-3 rounded-lg transition-all duration-300 hover:bg-gray-900/70 hover:translate-y-[-2px]">
                            <div class="bg-gradient-to-r from-purple-500 to-blue-500 rounded-full p-2 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25" />
                                </svg>
                            </div>
                            <div>
                                <span class="font-medium text-white">Ambition</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Réalisations -->
                <div class="bg-gray-800/250 backdrop-blur-sm p-6 rounded-lg shadow-lg border border-gray-700/30 opacity-0 transform translate-y-10 transition-all duration-1000 ease-out delay-200" id="achievements-section">
                    <h3 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-4">Nos Réalisations</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-gradient-to-r from-purple-500 to-blue-500 p-4 rounded-lg shadow-lg text-center transform transition-all duration-300 hover:scale-105">
                            <span class="text-3xl font-bold text-white">3</span>
                            <p class="text-gray-100">Titres locaux</p>
                        </div>
                        <div class="bg-gradient-to-br from-gray-700 to-gray-800 p-4 rounded-lg shadow-lg text-center transform transition-all duration-300 hover:scale-105">
                            <span class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500">50+</span>
                            <p class="text-gray-100">Matchs joués</p>
                        </div>
                        <div class="bg-gradient-to-br from-gray-700 to-gray-800 p-4 rounded-lg shadow-lg text-center transform transition-all duration-300 hover:scale-105">
                            <span class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500">10+</span>
                            <p class="text-gray-100">Talents formés</p>
                        </div>
                        <div class="bg-gradient-to-r from-purple-500 to-blue-500 p-4 rounded-lg shadow-lg text-center transform transition-all duration-300 hover:scale-105">
                            <span class="text-3xl font-bold text-white">100%</span>
                            <p class="text-gray-100">Passion</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Membres clés de l'équipe -->
        <div class="mt-16 opacity-0 transform translate-y-10 transition-all duration-1000 ease-out delay-300" id="key-members">
            <h3 class="text-3xl font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-8">Les Piliers de l'Équipe</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($jouers as $jouer )
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-2xl overflow-hidden group transform transition-all duration-300 hover:-translate-y-2">
                    <div class="relative h-56 overflow-hidden">
                        @if ($jouer->photo)
                        <img src="{{ $jouer->imageUrl() }}" alt="{{ $jouer->nom }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                        @else
                        <img src="{{ asset('logo.jpg') }}" alt="{{ $jouer->nom }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">

                        @endif  
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                    </div>
                    <div class="relative p-6 -mt-6 bg-gradient-to-t from-gray-900 via-gray-900 to-transparent">
                        <div class="absolute -top-8 right-6 bg-gradient-to-r from-purple-500 to-blue-500 rounded-full p-2 shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mt-2">{{ $jouer->nom }}</h4>
                        <p class="text-gray-400">{{ $jouer->poste }}</p>
                        <p class="text-gray-300 mt-2">Leader charismatique, Jean inspire ses coéquipiers par son travail acharné et sa vision du jeu.</p>
                    </div>
                </div>
                @empty
                    <!-- Membre 1 -->
                    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-2xl overflow-hidden group transform transition-all duration-300 hover:-translate-y-2">
                        <div class="relative h-56 overflow-hidden">
                            <img src="{{ asset('img/1740169523721.jpg') }}" alt="Joueur 1" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        </div>
                        <div class="relative p-6 -mt-6 bg-gradient-to-t from-gray-900 via-gray-900 to-transparent">
                            <div class="absolute -top-8 right-6 bg-gradient-to-r from-purple-500 to-blue-500 rounded-full p-2 shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                                </svg>
                            </div>
                            <h4 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500">Jean Kabasele</h4>
                            <p class="text-gray-400">Capitaine & Milieu de terrain</p>
                            <p class="text-gray-300 mt-2">Leader charismatique, Jean inspire ses coéquipiers par son travail acharné et sa vision du jeu.</p>
                        </div>
                    </div>

                    <!-- Membre 2 -->
                    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-2xl overflow-hidden group transform transition-all duration-300 hover:-translate-y-2">
                        <div class="relative h-56 overflow-hidden">
                            <img src="{{ asset('img/1740169797146.jpg') }}" alt="Joueur 2" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        </div>
                        <div class="relative p-6 -mt-6 bg-gradient-to-t from-gray-900 via-gray-900 to-transparent">
                            <div class="absolute -top-8 right-6 bg-gradient-to-r from-purple-500 to-blue-500 rounded-full p-2 shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                                </svg>
                            </div>
                            <h4 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500">Sarah Mbuyi</h4>
                            <p class="text-gray-400">Attaquante</p>
                            <p class="text-gray-300 mt-2">Sarah est une buteuse née, avec un sens aigu du placement et une finition redoutable.</p>
                        </div>
                    </div>

                    <!-- Membre 3 -->
                    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-2xl overflow-hidden group transform transition-all duration-300 hover:-translate-y-2">
                        <div class="relative h-56 overflow-hidden">
                            <img src="{{ asset('img/1740169349422.jpg') }}" alt="Joueur 3" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        </div>
                        <div class="relative p-6 -mt-6 bg-gradient-to-t from-gray-900 via-gray-900 to-transparent">
                            <div class="absolute -top-8 right-6 bg-gradient-to-r from-purple-500 to-blue-500 rounded-full p-2 shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0l2.77-.693a9 9 0 016.208.682l.108.054a9 9 0 006.086.71l3.114-.732a48.524 48.524 0 01-.005-10.499l-3.11.732a9 9 0 01-6.085-.711l-.108-.054a9 9 0 00-6.208-.682L3 4.5M3 15V4.5" />
                                </svg>
                            </div>
                            <h4 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500">Patrick Nkulu</h4>
                            <p class="text-gray-400">Défenseur central</p>
                            <p class="text-gray-300 mt-2">Patrick est le roc de la défense, toujours prêt à tout sacrifier pour son équipe.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<!-- Script pour le carousel et les animations -->
<script>
    // Variables pour le carrousel
    let currentImageIndex = 0;
    const totalImages = 3;
    
    // Fonction pour afficher une image spécifique
    function showImage(index) {
        // Masquer toutes les images
        for (let i = 0; i < totalImages; i++) {
            const image = document.getElementById(`image${i+1}`);
            image.style.opacity = "0";
        }
        
        // Afficher l'image sélectionnée
        const selectedImage = document.getElementById(`image${index+1}`);
        selectedImage.style.opacity = "1";
        
        // Mettre à jour les points de navigation
        const dots = document.querySelectorAll('.image-dot');
        dots.forEach((dot, i) => {
            if (i === index) {
                dot.classList.add('active');
                dot.style.backgroundColor = 'white';
                dot.style.transform = 'scale(1.2)';
            } else {
                dot.classList.remove('active');
                dot.style.backgroundColor = 'rgba(255, 255, 255, 0.5)';
                dot.style.transform = 'scale(1)';
            }
        });
        
        // Mettre à jour l'index courant
        currentImageIndex = index;
    }
    
    // Fonction pour l'image suivante
    function nextImage() {
        const nextIndex = (currentImageIndex + 1) % totalImages;
        showImage(nextIndex);
    }
    
    // Fonction pour l'image précédente
    function prevImage() {
        const prevIndex = (currentImageIndex - 1 + totalImages) % totalImages;
        showImage(prevIndex);
    }
    
    // Démarrer le carousel automatique
    let carouselInterval = setInterval(nextImage, 5000);
    
    // Réinitialiser le timer lors d'une interaction manuelle
    document.querySelectorAll('.image-dot, #gallery-carousel button').forEach(element => {
        element.addEventListener('click', () => {
            clearInterval(carouselInterval);
            carouselInterval = setInterval(nextImage, 5000);
        });
    });
    
    // Animation d'apparition des éléments lors du défilement
    document.addEventListener('DOMContentLoaded', function() {
        const elements = [
            document.getElementById('team-title'),
            document.getElementById('gallery-container'),
            document.getElementById('history-section'),
            document.getElementById('values-section'),
            document.getElementById('achievements-section'),
            document.getElementById('key-members')
        ];
        
        // Fonction pour vérifier si un élément est visible dans la fenêtre
        function isElementInViewport(el) {
            const rect = el.getBoundingClientRect();
            return (
                rect.top <= (window.innerHeight || document.documentElement.clientHeight) * 0.85
            );
        }
        
        // Fonction pour animer les éléments visibles
        function animateVisibleElements() {
            elements.forEach(element => {
                if (element && isElementInViewport(element) && element.classList.contains('opacity-0')) {
                    element.classList.remove('opacity-0');
                    element.classList.remove('translate-y-10');
                    element.classList.remove('translate-x-10');
                }
            });
        }
        
        // Vérifier les éléments visibles immédiatement et lors du défilement
        animateVisibleElements();
        window.addEventListener('scroll', animateVisibleElements);
    });
</script>




<!-- Section d'actualité  -->
 <!-- Section Actualités : News et événements de l'équipe -->
<section id="news" class="py-16 bg-gradient-to-br from-gray-900 to-gray-800 overflow-hidden">
    <div class="container mx-auto px-4">
        <!-- Titre de la section avec animation -->
        <h2 class="text-4xl md:text-5xl font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-12 opacity-0 transform translate-y-10 transition-all duration-1000 ease-out" id="news-title">
            Actualités FC Salvador
        </h2>

        @if ($dernier)

        <!-- Bannière événement principal avec compte à rebours -->
        <div class="relative mb-12 rounded-xl overflow-hidden shadow-2xl opacity-0 transform translate-y-10 transition-all duration-1000 ease-out" id="featured-event">
            <div class="relative h-[400px] w-full overflow-hidden group">
                @if ($dernier->image)
                <img src="{{ $post->imageUrl() }}" alt="{{ $dernier->type->nom }}" class="w-full h-full object-cover brightness-75 transform transition-transform duration-700 group-hover:scale-105">
                
            @else
                <img src="{{ asset('img/1740169349422.jpg') }}" alt="{{ $dernier->type->nom }}" class="w-full h-full object-cover brightness-75 transform transition-transform duration-700 group-hover:scale-105">
                
            @endif
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                <div class="absolute inset-0 flex flex-col justify-center items-center p-6 text-center">
                    <span class="px-4 py-1 bg-gradient-to-r from-purple-500 to-blue-500 text-white text-sm rounded-full mb-4 animate-pulse">{{ $dernier->type->nom }}</span>
                    <h3 class="text-3xl md:text-4xl font-bold text-white mb-2">{{ $dernier->titre }}</h3>
                    <p class="text-gray-200 mb-6">{{Str::limit($dernier->description,60) }}</p>
                    
                    <!-- Compte à rebours -->
                    <div class="mb-6 flex justify-center">
                        <div class="bg-black/60 backdrop-blur-lg px-6 py-4 rounded-xl shadow-lg text-center">
                            <span id="countdown" class="text-4xl font-extrabold text-white tracking-wider"></span>
                        </div>
                    </div>
                    
                    
                    
                    <a href="#" class="px-6 py-3 bg-gradient-to-r from-purple-500 to-blue-500 text-white font-semibold rounded-full shadow-lg transform transition-transform hover:scale-105">
                        Plus d'informations
                    </a>
                </div>
            </div>
        </div>

        <script>
            var countDownDate = new Date("{{ \Carbon\Carbon::parse($dernier->date_debut)->format('M d, Y H:i:s') }}").getTime();
        
            var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
        
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("countdown").innerHTML = "✅ Événement terminé";
                    return;
                }
        
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
                document.getElementById("countdown").innerHTML = 
                    `${days}j ${hours}h ${minutes}m ${seconds}s`;
            }, 1000);
        </script>
        
        @endif

        <!-- Filtres d'actualités -->
        <div class="flex flex-wrap justify-center gap-4 mb-12 opacity-0 transform translate-y-10 transition-all duration-1000 ease-out delay-100" id="news-filters">
            <button class="px-5 py-2 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-full shadow-md news-filter active" data-filter="all">
                Tous
            </button>
            @foreach($categories as $category)
                <button class="px-5 py-2 bg-gray-800 text-gray-300 rounded-full shadow-md hover:bg-gray-700 transition-all news-filter" data-filter="{{ $category->slug }}">
                    {{ $category->name }}
                </button>
            @endforeach
        </div>

        <!-- Grille d'actualités -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12" id="news-grid">
            @foreach($posts as $post)
            <article class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-xl overflow-hidden group transform transition-all duration-300 hover:-translate-y-2 opacity-0 translate-y-10 transition-opacity ease-out news-item" data-category="{{ $post->category->slug }}">
                    <div class="relative h-56 overflow-hidden">
                        <span class="absolute top-3 left-3 z-10 px-3 py-1 bg-gradient-to-r from-purple-500 to-blue-500 text-white text-xs rounded-full">{{ $post->category->name }}</span>
                            @if ($post->image)
                        <img src="{{  $post->imageUrl()}}" alt="{{ $post->titre }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                                
                            @else
                        <img src="{{ asset('logo.png') }}" alt="{{ $post->titre }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                                
                            @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                        <div class="absolute bottom-3 left-3 bg-black/60 backdrop-blur-sm text-white px-2 py-1 rounded text-sm">{{ $post->created_at->diffForHumans() }}</div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-2">{{ $post->titre }}</h3>
                        <p class="text-gray-300 mb-4">{{ Str::limit($post->contenus, 100) }}</p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-2">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-r from-purple-500 to-blue-500 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z" />
                                    </svg>
                                </div>
                                <span class="text-gray-400 text-sm">{{ $post->views }} vues</span>
                            </div>
                            <a href="{ { route('posts.show', $post->id) }}" class="text-blue-400 hover:text-blue-300 transition-colors flex items-center">
                                Lire plus
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- Bouton "Charger plus" avec animation -->
        <div class="flex justify-center opacity-0 transform translate-y-10 transition-all duration-1000 ease-out delay-300" id="load-more-container">
            <button id="load-more" class="px-8 py-3 bg-gradient-to-r from-purple-500 to-blue-500 text-white font-semibold rounded-full shadow-lg transform transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">
                <span class="flex items-center">
                    <span>Voir plus d'actualités</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 ml-2 animate-bounce">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3" />
                    </svg>
                </span>
            </button>
        </div>

        <!-- Abonnement à la newsletter -->
        <div class="mt-20 bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-2xl overflow-hidden opacity-0 transform translate-y-10 transition-all duration-1000 ease-out delay-400" id="newsletter-container">
            <div class="grid grid-cols-1 lg:grid-cols-5">
                <div class="lg:col-span-3 p-8 lg:p-12">
                    <h3 class="text-2xl md:text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-4">Restez informé !</h3>
                    <p class="text-gray-300 mb-6">Inscrivez-vous à notre newsletter pour ne rien manquer des dernières actualités, résultats et événements du FC Salvador.</p>
                    
                    <form class="space-y-4">
                        <div class="flex flex-col sm:flex-row gap-4">
                            <input type="text" placeholder="Votre nom" class="bg-gray-700/50 text-white border border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 w-full">
                            <input type="email" placeholder="Votre email" class="bg-gray-700/50 text-white border border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 w-full">
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="newsletter-consent" class="rounded text-purple-500 focus:ring-purple-500">
                            <label for="newsletter-consent" class="ml-2 text-gray-300 text-sm">J'accepte de recevoir les actualités du FC Salvador par email</label>
                        </div>
                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-purple-500 to-blue-500 text-white font-semibold rounded-lg shadow-lg transform transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 w-full sm:w-auto">
                            S'abonner
                        </button>
                    </form>
                </div>
                <div class="lg:col-span-2 hidden lg:block relative">
                    <img src="{{ asset('img/1740169797146.jpg') }}" alt="Newsletter" class="absolute inset-0 h-full w-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-r from-gray-900 to-transparent"></div>
                </div>
            </div>
        </div>

        <!-- Statistiques du site -->
        <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-6 opacity-0 transform translate-y-10 transition-all duration-1000 ease-out delay-500" id="stats-container">
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-lg shadow-lg p-6 text-center transform transition-all duration-300 hover:scale-105">
                <div class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 counter" data-target="183">0</div>
                <p class="text-gray-300 mt-2">Articles publiés</p>
            </div>
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-lg shadow-lg p-6 text-center transform transition-all duration-300 hover:scale-105">
                <div class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 counter" data-target="37">0</div>
                <p class="text-gray-300 mt-2">Matchs couverts</p>
            </div>
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-lg shadow-lg p-6 text-center transform transition-all duration-300 hover:scale-105">
                <div class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 counter" data-target="520">0</div>
                <p class="text-gray-300 mt-2">Abonnés</p>
            </div>
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-lg shadow-lg p-6 text-center transform transition-all duration-300 hover:scale-105">
                <div class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 counter" data-target="15623">0</div>
                <p class="text-gray-300 mt-2">Visites totales</p>
            </div>
        </div>
    </div>
</section>

<!-- Script pour l'animation et le filtrage -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animation des éléments au scroll
        const animateElements = [
            document.getElementById('news-title'),
            document.getElementById('featured-event'),
            document.getElementById('news-filters'),
            document.getElementById('load-more-container'),
            document.getElementById('newsletter-container'),
            document.getElementById('stats-container')
        ];
        
        // Animation et affichage des articles
        const newsItems = document.querySelectorAll('.news-item');
        
        // Vérifier si un élément est visible dans la fenêtre
        function isElementInViewport(el) {
            const rect = el.getBoundingClientRect();
            return (
                rect.top <= (window.innerHeight || document.documentElement.clientHeight) * 0.85
            );
        }
        
        // Animer les éléments visibles
        function animateVisibleElements() {
            // Animer les conteneurs principaux
            animateElements.forEach(element => {
                if (element && isElementInViewport(element) && element.classList.contains('opacity-0')) {
                    element.classList.remove('opacity-0');
                    element.classList.remove('translate-y-10');
                }
            });
            
            // Animer les articles avec un délai progressif
            newsItems.forEach((item, index) => {
                if (isElementInViewport(item) && item.classList.contains('opacity-0')) {
                    setTimeout(() => {
                        item.classList.remove('opacity-0');
                        item.classList.remove('translate-y-10');
                    }, index * 150); // Délai progressif selon l'index
                }
            });
        }
        
        // Système de filtrage des actualités
        const filterButtons = document.querySelectorAll('.news-filter');
        
        filterButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Retirer la classe active de tous les boutons
            filterButtons.forEach(btn => {
                btn.classList.remove('active', 'bg-gradient-to-r', 'from-purple-500', 'to-blue-500', 'text-white');
                btn.classList.add('bg-gray-800', 'text-gray-300', 'hover:bg-gray-700');
            });

            // Ajouter la classe active au bouton cliqué
            this.classList.add('active', 'bg-gradient-to-r', 'from-purple-500', 'to-blue-500', 'text-white');
            this.classList.remove('bg-gray-800', 'hover:bg-gray-700', 'text-gray-300');

            const filter = this.getAttribute('data-filter');

            // Filtrer les articles
            newsItems.forEach(item => {
                const category = item.getAttribute('data-category');

                if (filter === 'all' || category === filter) {
                    item.style.display = 'block'; // Afficher l'article
                } else {
                    item.style.display = 'none'; // Masquer l'article
                }
            });
        });
    });
        // Animation des compteurs
        function animateCounter(el) {
            const target = parseInt(el.getAttribute('data-target'));
            const count = +el.innerText;
            const speed = target / 100; // Plus la cible est grande, plus l'animation est rapide
            
            if (count < target) {
                el.innerText = Math.ceil(count + speed);
                setTimeout(() => animateCounter(el), 20);
            } else {
                el.innerText = target;
            }
        }
        
        const counters = document.querySelectorAll('.counter');
        
        function startCountersIfVisible() {
            counters.forEach(counter => {
                if (isElementInViewport(counter) && counter.innerText === "0") {
                    animateCounter(counter);
                }
            });
        }
        
        // Compte à rebours pour l'événement
        function updateCountdown() {
            const now = new Date();
            const eventDate = new Date(now);
            eventDate.setDate(now.getDate() + 15); // Date 15 jours dans le futur
            
            const diff = eventDate - now;
            
            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((diff % (1000 * 60)) / 1000);
            
            document.querySelector('.countdown-days').innerText = days.toString().padStart(2, '0');
            document.querySelector('.countdown-hours').innerText = hours.toString().padStart(2, '0');
            document.querySelector('.countdown-minutes').innerText = minutes.toString().padStart(2, '0');
            document.querySelector('.countdown-seconds').innerText = seconds.toString().padStart(2, '0');
        }
        
        // Mise à jour du compte à rebours
        //updateCountdown();
        //setInterval(updateCountdown, 1000);
        
        // Vérifier les éléments visibles au chargement et au défilement
        animateVisibleElements();
        startCountersIfVisible();
        window.addEventListener('scroll', () => {
            animateVisibleElements();
            startCountersIfVisible();
        });
        
        // Simuler le chargement de plus d'articles
        document.getElementById('load-more').addEventListener('click', function() {
            this.innerHTML = `
                <span class="flex items-center">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Chargement...</span>
                </span>
            `;
            
            // Simuler un délai de chargement
            setTimeout(() => {
                this.innerHTML = `
                    <span class="flex items-center">
                        <span>Voir plus d'actualités</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 ml-2 animate-bounce">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3" />
                        </svg>
                    </span>
                `;
                
                // Afficher un message d'alerte (à remplacer par le chargement réel d'articles)
                alert('Fonctionnalité de chargement d\'articles supplémentaires à implémenter selon votre système de gestion de contenu.');
            }, 1500);
        });
    });
</script>



 <!-- Section Joueurs : Présentation des joueurs de l'équipe avec animation au survol -->
<section id="players" class="py-16  bg-gradient-to-br from-gray-900 to-gray-800 overflow-hidden   ">
    <div class="container mx-auto px-4    bg-gray-800/250 backdrop-blur-sm p-6 rounded-lg shadow-lg border border-gray-700/30 transform transition-all duration-1000 ease-out delay-200">
        <!-- Titre de la section avec animation -->
        <!-- Titre de la section avec animation -->
        <h4 class="text-3xl font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-8" >
            Nos Joueurs FC Salvador
        </h4>

        <!-- Carrousel des joueurs -->
        <div class="relative">
            <!-- Conteneur du carrousel -->
            <div class="overflow-hidden">
                <div class="flex transition-transform duration-500 ease-in-out" id="players-carousel">
                    <!-- Carte Joueur 1 -->
                    @forelse ($tousjouers as $j )
                        <div class="min-w-full md:min-w-[50%] lg:min-w-[33.33%] px-4">
                            <div class="relative h-96 rounded-xl overflow-hidden group">
                                <img src="{{ asset('img/1740169349422.jpg') }}" alt="Joueur 1" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                                <!-- Informations du joueur (apparaissent au survol) -->
                                <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/90 to-transparent transform translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out">
                                    <h3 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-2">{{ $j->nom }}</h3>
                                    <p class="text-gray-300 mb-2">{{ $j->poste }} - {{ \Carbon\Carbon::parse($j->date_de_naissance)->age }} ans</p>
                                    <p class="text-gray-400 text-sm">{{ Str::limit($j->historique, 150) }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        
                    @endforelse
                    

                    
                </div>
            </div>

            <!-- Boutons de navigation du carrousel -->
            <button class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-black/50 backdrop-blur-sm text-white p-3 rounded-full shadow-lg hover:bg-black/70 transition-colors" id="prev-player">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </button>
            <button class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-black/50 backdrop-blur-sm text-white p-3 rounded-full shadow-lg hover:bg-black/70 transition-colors" id="next-player">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </button>
        </div>
    </div>
</section>

<!-- Script pour le carrousel des joueurs -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const carousel = document.getElementById('players-carousel');
        const prevButton = document.getElementById('prev-player');
        const nextButton = document.getElementById('next-player');
        const playerWidth = document.querySelector('.min-w-full').offsetWidth;
        let currentIndex = 0;

        // Fonction pour déplacer le carrousel
        function moveCarousel(index) {
            const offset = -index * playerWidth;
            carousel.style.transform = `translateX(${offset}px)`;
        }

        // Bouton précédent
        prevButton.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                moveCarousel(currentIndex);
            }
        });

        // Bouton suivant
        nextButton.addEventListener('click', () => {
            const maxIndex = carousel.children.length - 1;
            if (currentIndex < maxIndex) {
                currentIndex++;
                moveCarousel(currentIndex);
            }
        });
    });
</script>


<!-- Section Stories : Stories inspirées des réseaux sociaux -->
<section id="stories" class="py-16 bg-gradient-to-br from-gray-900 to-gray-800 overflow-hidden">
    <div class="container mx-auto px-4">
        <!-- Titre de la section avec animation -->
        <h2 class="text-4xl md:text-5xl font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-12 opacity-0 transform translate-y-10 transition-all duration-1000 ease-out" id="stories-title">
            Stories FC Salvador
        </h2>

        <!-- Section Stories moderne -->
        <div class="relative opacity-0 transform translate-y-10 transition-all duration-1000 ease-out" id="stories-container">
            <!-- Layout principal des stories -->
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                <!-- Story 1 -->
                <div class="story-item cursor-pointer group relative" data-story-id="1" data-story-type="image">
                    <div class="relative h-60 md:h-72 rounded-xl overflow-hidden">
                        <!-- Bordure animée autour de la story pour indiquer qu'elle est non vue -->
                        <div class="absolute inset-0 rounded-xl p-[2px] bg-gradient-to-br from-purple-500 via-blue-500 to-purple-500 animate-border-rotate">
                            <div class="absolute inset-0 rounded-xl overflow-hidden bg-gray-900">
                                <img src="{{ asset('img/1740169349422.jpg') }}" alt="Entraînement intensif" class="w-full h-full object-cover brightness-90 group-hover:brightness-100 group-hover:scale-105 transition-all duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                            </div>
                        </div>
                        <!-- Badge de type de contenu -->
                        <div class="absolute top-3 right-3 z-10 bg-purple-500 rounded-full p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                        </div>
                        <!-- Infos de la story -->
                        <div class="absolute bottom-3 left-0 right-0 px-4 z-10">
                            <div class="flex items-center space-x-2 mb-1">
                                <div class="w-8 h-8 rounded-full overflow-hidden border-2 border-purple-500">
                                    <img src="{{ asset('img/1740169797146.jpg') }}" alt="Profil" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="text-white text-sm font-semibold">Jean Kabasele</p>
                                </div>
                            </div>
                            <p class="text-gray-200 text-xs">Aujourd'hui, 10:30</p>
                        </div>
                    </div>
                    <div class="mt-2 text-center">
                        <p class="text-gray-300 text-sm font-medium">Entraînement intensif</p>
                    </div>
                </div>

                <!-- Story 2 -->
                <div class="story-item cursor-pointer group relative" data-story-id="2" data-story-type="video">
                    <div class="relative h-60 md:h-72 rounded-xl overflow-hidden">
                        <!-- Bordure animée autour de la story -->
                        <div class="absolute inset-0 rounded-xl p-[2px] bg-gradient-to-br from-purple-500 via-blue-500 to-purple-500 animate-border-rotate">
                            <div class="absolute inset-0 rounded-xl overflow-hidden bg-gray-900">
                                <img src="{{ asset('img/1740169797146.jpg') }}" alt="But magnifique" class="w-full h-full object-cover brightness-90 group-hover:brightness-100 group-hover:scale-105 transition-all duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                            </div>
                        </div>
                        <!-- Badge de type de contenu -->
                        <div class="absolute top-3 right-3 z-10 bg-blue-500 rounded-full p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                            </svg>
                        </div>
                        <!-- Infos de la story -->
                        <div class="absolute bottom-3 left-0 right-0 px-4 z-10">
                            <div class="flex items-center space-x-2 mb-1">
                                <div class="w-8 h-8 rounded-full overflow-hidden border-2 border-blue-500">
                                    <img src="{{ asset('img/1740169349422.jpg') }}" alt="Profil" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="text-white text-sm font-semibold">Sarah Mbuyi</p>
                                </div>
                            </div>
                            <p class="text-gray-200 text-xs">Hier, 16:45</p>
                        </div>
                    </div>
                    <div class="mt-2 text-center">
                        <p class="text-gray-300 text-sm font-medium">But magnifique</p>
                    </div>
                </div>

                <!-- Story 3 -->
                <div class="story-item cursor-pointer group relative" data-story-id="3" data-story-type="image">
                    <div class="relative h-60 md:h-72 rounded-xl overflow-hidden">
                        <!-- Bordure animée autour de la story -->
                        <div class="absolute inset-0 rounded-xl p-[2px] bg-gradient-to-br from-purple-500 via-blue-500 to-purple-500 animate-border-rotate">
                            <div class="absolute inset-0 rounded-xl overflow-hidden bg-gray-900">
                                <img src="{{ asset('img/1740169523721.jpg') }}" alt="Préparation tactique" class="w-full h-full object-cover brightness-90 group-hover:brightness-100 group-hover:scale-105 transition-all duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                            </div>
                        </div>
                        <!-- Badge de type de contenu -->
                        <div class="absolute top-3 right-3 z-10 bg-purple-500 rounded-full p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                        </div>
                        <!-- Infos de la story -->
                        <div class="absolute bottom-3 left-0 right-0 px-4 z-10">
                            <div class="flex items-center space-x-2 mb-1">
                                <div class="w-8 h-8 rounded-full overflow-hidden border-2 border-purple-500">
                                    <img src="{{ asset('img/1740169523721.jpg') }}" alt="Profil" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="text-white text-sm font-semibold">Coach Patrick</p>
                                </div>
                            </div>
                            <p class="text-gray-200 text-xs">Il y a 2 jours</p>
                        </div>
                    </div>
                    <div class="mt-2 text-center">
                        <p class="text-gray-300 text-sm font-medium">Préparation tactique</p>
                    </div>
                </div>

                <!-- Story 4 -->
                <div class="story-item cursor-pointer group relative" data-story-id="4" data-story-type="video">
                    <div class="relative h-60 md:h-72 rounded-xl overflow-hidden">
                        <!-- Bordure animée autour de la story -->
                        <div class="absolute inset-0 rounded-xl p-[2px] bg-gradient-to-br from-purple-500 via-blue-500 to-purple-500 animate-border-rotate">
                            <div class="absolute inset-0 rounded-xl overflow-hidden bg-gray-900">
                                <img src="{{ asset('img/1740169349422.jpg') }}" alt="Séance d'étirements" class="w-full h-full object-cover brightness-90 group-hover:brightness-100 group-hover:scale-105 transition-all duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                            </div>
                        </div>
                        <!-- Badge de type de contenu -->
                        <div class="absolute top-3 right-3 z-10 bg-blue-500 rounded-full p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                            </svg>
                        </div>
                        <!-- Infos de la story -->
                        <div class="absolute bottom-3 left-0 right-0 px-4 z-10">
                            <div class="flex items-center space-x-2 mb-1">
                                <div class="w-8 h-8 rounded-full overflow-hidden border-2 border-blue-500">
                                    <img src="{{ asset('img/1740169797146.jpg') }}" alt="Profil" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="text-white text-sm font-semibold">Équipe fitness</p>
                                </div>
                            </div>
                            <p class="text-gray-200 text-xs">Il y a 3 jours</p>
                        </div>
                    </div>
                    <div class="mt-2 text-center">
                        <p class="text-gray-300 text-sm font-medium">Séance d'étirements</p>
                    </div>
                </div>

                <!-- Story 5 -->
                <div class="story-item cursor-pointer group relative" data-story-id="5" data-story-type="image">
                    <div class="relative h-60 md:h-72 rounded-xl overflow-hidden">
                        <!-- Bordure animée autour de la story -->
                        <div class="absolute inset-0 rounded-xl p-[2px] bg-gradient-to-br from-purple-500 via-blue-500 to-purple-500 animate-border-rotate">
                            <div class="absolute inset-0 rounded-xl overflow-hidden bg-gray-900">
                                <img src="{{ asset('img/1740169523721.jpg') }}" alt="Victoire derby" class="w-full h-full object-cover brightness-90 group-hover:brightness-100 group-hover:scale-105 transition-all duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                            </div>
                        </div>
                        <!-- Badge de type de contenu -->
                        <div class="absolute top-3 right-3 z-10 bg-purple-500 rounded-full p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                        </div>
                        <!-- Infos de la story -->
                        <div class="absolute bottom-3 left-0 right-0 px-4 z-10">
                            <div class="flex items-center space-x-2 mb-1">
                                <div class="w-8 h-8 rounded-full overflow-hidden border-2 border-purple-500">
                                    <img src="{{ asset('img/1740169349422.jpg') }}" alt="Profil" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="text-white text-sm font-semibold">FC Salvador</p>
                                </div>
                            </div>
                            <p class="text-gray-200 text-xs">Il y a 4 jours</p>
                        </div>
                    </div>
                    <div class="mt-2 text-center">
                        <p class="text-gray-300 text-sm font-medium">Victoire dans le derby</p>
                    </div>
                </div>

                <!-- Story 6 -->
                <div class="story-item cursor-pointer group relative" data-story-id="6" data-story-type="image">
                    <div class="relative h-60 md:h-72 rounded-xl overflow-hidden">
                        <!-- Bordure animée autour de la story -->
                        <div class="absolute inset-0 rounded-xl p-[2px] bg-gradient-to-br from-purple-500 via-blue-500 to-purple-500 animate-border-rotate">
                            <div class="absolute inset-0 rounded-xl overflow-hidden bg-gray-900">
                                <img src="{{ asset('img/1740169797146.jpg') }}" alt="Préparation équipe" class="w-full h-full object-cover brightness-90 group-hover:brightness-100 group-hover:scale-105 transition-all duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                            </div>
                        </div>
                        <!-- Badge de type de contenu -->
                        <div class="absolute top-3 right-3 z-10 bg-purple-500 rounded-full p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                        </div>
                        <!-- Infos de la story -->
                        <div class="absolute bottom-3 left-0 right-0 px-4 z-10">
                            <div class="flex items-center space-x-2 mb-1">
                                <div class="w-8 h-8 rounded-full overflow-hidden border-2 border-purple-500">
                                    <img src="{{ asset('img/1740169523721.jpg') }}" alt="Profil" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="text-white text-sm font-semibold">Team Manager</p>
                                </div>
                            </div>
                            <p class="text-gray-200 text-xs">Il y a 5 jours</p>
                        </div>
                    </div>
                    <div class="mt-2 text-center">
                        <p class="text-gray-300 text-sm font-medium">Préparation équipe</p>
                    </div>
                </div>
            </div>

            <!-- Bouton pour ajouter une story (uniquement pour démo) -->
            <div class="mt-8 flex justify-center">
                <button class="flex items-center space-x-2 bg-gradient-to-r from-purple-500 to-blue-500 text-white px-6 py-3 rounded-full shadow-lg hover:shadow-purple-500/20 transition-all duration-300 hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    <span>Ajouter une story</span>
                </button>
            </div>
        </div>

        <!-- Modal de story plein écran (initialement caché) -->
        <div id="story-modal" class="fixed inset-0 z-50 bg-black/90 hidden flex items-center justify-center">
            <div class="relative w-full max-w-screen-md">
                <!-- Header du modal -->
                <div class="absolute top-4 left-0 right-0 flex items-center justify-between z-10 px-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-purple-500">
                            <img id="story-profile-pic" src="" alt="Profil" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <p id="story-username" class="text-white font-semibold">Username</p>
                            <p id="story-timestamp" class="text-gray-300 text-xs">Timestamp</p>
                        </div>
                    </div>
                    <button id="close-story" class="p-2 bg-gray-800/80 rounded-full text-white hover:bg-gray-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Contenu de la story -->
                <div class="h-screen max-h-[80vh] md:max-h-[90vh] overflow-hidden rounded-lg">
                    <!-- Barres de progression -->
                    <div id="story-progress-container" class="absolute top-16 left-0 right-0 flex space-x-1 px-4 z-10">
                        <!-- Les barres de progression seront ajoutées dynamiquement ici -->
                    </div>

                    <!-- Conteneur pour l'image ou la vidéo -->
                    <div id="story-content-container" class="w-full h-full">
                        <!-- L'image ou la vidéo sera chargée ici -->
                    </div>

                    <!-- Caption de la story (optionnel) -->
                    <div id="story-caption" class="absolute bottom-8 left-0 right-0 px-6 py-4 text-white text-center bg-black/30 backdrop-blur-sm mx-4 rounded-lg">
                        <!-- Le texte de la story sera affiché ici -->
                    </div>

                    <!-- Navigation des stories -->
                    <div class="absolute inset-y-0 left-0 w-1/4 z-20 cursor-pointer" id="prev-story-nav"></div>
                    <div class="absolute inset-y-0 right-0 w-1/4 z-20 cursor-pointer" id="next-story-nav"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Styles supplémentaires -->
<style>
    @keyframes border-rotate {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }

    .animate-border-rotate {
        background-size: 300% 300%;
        animation: border-rotate 4s ease infinite;
    }

    .story-progress-bar {
        height: 3px;
        background-color: rgba(255, 255, 255, 0.3);
        border-radius: 3px;
        overflow: hidden;
    }

    .story-progress-fill {
        height: 100%;
        background-color: white;
        width: 0%;
        border-radius: 3px;
        transition: width linear;
    }

    .story-item.viewed .animate-border-rotate {
        background: rgba(255, 255, 255, 0.3);
        animation: none;
    }

    body.story-open {
        overflow: hidden;
    }
</style>

<!-- Script pour la gestion des stories -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Données des stories (à remplacer par des données réelles)
        const storiesData = [
            {
                id: 1,
                type: 'image',
                username: 'Jean Kabasele',
                profilePic: "{{ asset('img/1740169797146.jpg') }}",
                content: "{{ asset('img/1740169349422.jpg') }}",
                caption: "Séance d'entraînement intensive pour préparer la demi-finale! 💪⚽ #FCSalvador",
                timestamp: "Aujourd'hui, 10:30"
            },
            {
                id: 2,
                type: 'video',
                username: 'Sarah Mbuyi',
                profilePic: "{{ asset('img/1740169349422.jpg') }}",
                content: "{{ asset('video/story2.mp4') }}",
                caption: "Ce but incroyable lors de notre dernier match! 🔥⚽ #ScoreDeFolie",
                timestamp: "Hier, 16:45"
            },
            {
                id: 3,
                type: 'image',
                username: 'Coach Patrick',
                profilePic: "{{ asset('img/1740169523721.jpg') }}",
                content: "{{ asset('img/1740169523721.jpg') }}",
                caption: "Préparation tactique pour le prochain match. L'équipe est prête! 📊⚽",
                timestamp: "Il y a 2 jours"
            },
            {
                id: 4,
                type: 'video',
                username: 'Équipe fitness',
                profilePic: "{{ asset('img/1740169797146.jpg') }}",
                content: "{{ asset('video/story4.mp4') }}",
                caption: "Séance d'étirements post-entraînement. La récupération est essentielle! 🧘‍♂️",
                timestamp: "Il y a 3 jours"
            },
            {
                id: 5,
                type: 'image',
                username: 'FC Salvador',
                profilePic: "{{ asset('img/1740169349422.jpg') }}",
                content: "{{ asset('img/1740169523721.jpg') }}",
                caption: "Victoire 3-1 dans le derby! Merci à tous nos supporters! 🏆🎉",
                timestamp: "Il y a 4 jours"
            },
            {
                id: 6,
                type: 'image',
                username: 'Team Manager',
                profilePic: "{{ asset('img/1740169523721.jpg') }}",
                content: "{{ asset('img/1740169797146.jpg') }}",
                caption: "Nouveaux équipements pour notre équipe! Prêts pour briller sur le terrain! ✨",
                timestamp: "Il y a 5 jours"
            }
        ];

        // Éléments DOM
        const storyModal = document.getElementById('story-modal');
        const storyContentContainer = document.getElementById('story-content-container');
        const storyProfilePic = document.getElementById('story-profile-pic');
        const storyUsername = document.getElementById('story-username');
        const storyTimestamp = document.getElementById('story-timestamp');
        const storyCaption = document.getElementById('story-caption');
        const storyProgressContainer = document.getElementById('story-progress-container');
        const closeStoryBtn = document.getElementById('close-story');
        const prevStoryNav = document.getElementById('prev-story-nav');
        const nextStoryNav = document.getElementById('next-story-nav');
        const storyItems = document.querySelectorAll('.story-item');

        // Variables
        let currentStoryIndex = 0;
        let storyDuration = 30000; // 30 secondes
        let progressInterval = null;
        let autoProgressTimeout = null;
        let storyStartTime = 0;
        let remainingTime = storyDuration;
        let isPaused = false;

        // Animation des éléments au scroll
        function isElementInViewport(el) {
            const rect = el.getBoundingClientRect();
            return (
                rect.top <= (window.innerHeight || document.documentElement.clientHeight) * 0.85
            );
        }

        function animateVisibleElements() {
            const storiesTitle = document.getElementById('stories-title');
            const storiesContainer = document.getElementById('stories-container');

            if (storiesTitle && isElementInViewport(storiesTitle) && storiesTitle.classList.contains('opacity-0')) {
                storiesTitle.classList.remove('opacity-0');
                storiesTitle.classList.remove('translate-y-10');
            }

            if (storiesContainer && isElementInViewport(storiesContainer) && storiesContainer.classList.contains('opacity-0')) {
                storiesContainer.classList.remove('opacity-0');
                storiesContainer.classList.remove('translate-y-10');
            }
        }

        // Ouvrir la modal de story
        function openStoryModal(storyId) {
            // Trouver l'index de la story cliquée
            currentStoryIndex = storiesData.findIndex(story => story.id === storyId);

            if (currentStoryIndex < 0) {
                currentStoryIndex = 0;
            }

            // Créer les barres de progression
            createProgressBars();

            // Afficher la story
            showCurrentStory();

            // Afficher la modal
            storyModal.classList.remove('hidden');
            storyModal.classList.add('flex');
            document.body.classList.add('story-open');

            // Marquer la story comme vue
            const storyItem = document.querySelector(`.story-item[data-story-id="${storyId}"]`);
            if (storyItem) {
                storyItem.classList.add('viewed');
            }
        }

        // Fermer la modal de story
        function closeStoryModal() {
            // Arrêter toutes les progressions et timeouts
            clearInterval(progressInterval);
            clearTimeout(autoProgressTimeout);

            // Cacher la modal
            storyModal.classList.add('hidden');
            storyModal.classList.remove('flex');
            document.body.classList.remove('story-open');

            // Vider le contenu de la story
            storyContentContainer.innerHTML = '';
            storyProgressContainer.innerHTML = '';

            // Réinitialiser les variables
            isPaused = false;
        }

        // Créer les barres de progression
        function createProgressBars() {
            storyProgressContainer.innerHTML = '';
            
            storiesData.forEach((_, index) => {
                const progressBarWrapper = document.createElement('div');
                progressBarWrapper.className = 'story-progress-bar flex-1';

                const progressBarFill = document.createElement('div');
                progressBarFill.className = 'story-progress-fill';
                
                // Si c'est une story déjà vue, la marquer comme complétée
                if (index < currentStoryIndex) {
                    progressBarFill.style.width = '100%';
                }
                
                progressBarWrapper.appendChild(progressBarFill);
                storyProgressContainer.appendChild(progressBarWrapper);
            });
        }

        // Afficher la story actuelle
        function showCurrentStory() {
            const story = storiesData[currentStoryIndex];
            storyContentContainer.innerHTML = '';
            
            // Mettre à jour les infos de profil
            storyProfilePic.src = story.profilePic;
            storyUsername.textContent = story.username;
            storyTimestamp.textContent = story.timestamp;
            storyCaption.textContent = story.caption;
            
            // Créer le contenu de la story selon le type
            if (story.type === 'image') {
                const img = document.createElement('img');
                img.src = story.content;
                img.className = 'w-full h-full object-contain';
                storyContentContainer.appendChild(img);
            } else if (story.type === 'video') {
                const video = document.createElement('video');
                video.src = story.content;
                video.className = 'w-full h-full object-contain';
                video.autoplay = true;
                video.muted = false;
                video.controls = false;
                video.playsInline = true;
                
                // Événements pour les vidéos
                video.addEventListener('play', () => {
                    isPaused = false;
                    continueStoryProgress();
                });
                
                video.addEventListener('pause', () => {
                    isPaused = true;
                    pauseStoryProgress();
                });
                
                storyContentContainer.appendChild(video);
            }
            
            // Réinitialiser la progression
            clearInterval(progressInterval);
            clearTimeout(autoProgressTimeout);
            
            // Démarrer la progression
            startStoryProgress();
        }

        // Démarrer la progression de la story
        function startStoryProgress() {
            const progressBars = storyProgressContainer.querySelectorAll('.story-progress-fill');
            const currentProgressBar = progressBars[currentStoryIndex];
            
            // Réinitialiser le temps
            storyStartTime = Date.now();
            remainingTime = storyDuration;
            
            // Animer la barre de progression
            currentProgressBar.style.transition = `width ${storyDuration}ms linear`;
            currentProgressBar.style.width = '100%';
            
            // Programmer le passage à la story suivante
            autoProgressTimeout = setTimeout(() => {
                nextStory();
            }, storyDuration);
        }

        // Mettre en pause la progression
        function pauseStoryProgress() {
            if (isPaused) return;
            
            // Calculer le temps restant
            const elapsedTime = Date.now() - storyStartTime;
            remainingTime = Math.max(0, storyDuration - elapsedTime);
            
            // Arrêter la progression
            clearInterval(progressInterval);
            clearTimeout(autoProgressTimeout);
            
            // Figer la barre de progression
            const progressBars = storyProgressContainer.querySelectorAll('.story-progress-fill');
            const currentProgressBar = progressBars[currentStoryIndex];
            const progress = (elapsedTime / storyDuration) * 100;
            
            currentProgressBar.style.transition = 'none';
            currentProgressBar.style.width = `${progress}%`;
        }

        // Continuer la progression
        function continueStoryProgress() {
            if (!isPaused) return;
            
            // Mettre à jour le temps de début
            storyStartTime = Date.now() - (storyDuration - remainingTime);
            
            // Reprendre la progression
            const progressBars = storyProgressContainer.querySelectorAll('.story-progress-fill');
            const currentProgressBar = progressBars[currentStoryIndex];
            
            currentProgressBar.style.transition = `width ${remainingTime}ms linear`;
            currentProgressBar.style.width = '100%';
            
            // Programmer la prochaine story
            autoProgressTimeout = setTimeout(() => {
                nextStory();
            }, remainingTime);
        }

        // Passer à la story suivante
        function nextStory() {
            // Marquer la story actuelle comme terminée
            const progressBars = storyProgressContainer.querySelectorAll('.story-progress-fill');
            const currentProgressBar = progressBars[currentStoryIndex];
            currentProgressBar.style.transition = 'none';
            currentProgressBar.style.width = '100%';
            
            // Marquer comme vue dans la grille
            const storyItem = document.querySelector(`.story-item[data-story-id="${storiesData[currentStoryIndex].id}"]`);
            if (storyItem) {
                storyItem.classList.add('viewed');
            }
            
            // Passer à la suivante ou fermer si c'est la dernière
            if (currentStoryIndex < storiesData.length - 1) {
                currentStoryIndex++;
                showCurrentStory();
            } else {
                closeStoryModal();
            }
        }

        // Passer à la story précédente
        function prevStory() {
            // Marquer la story actuelle comme non terminée
            const progressBars = storyProgressContainer.querySelectorAll('.story-progress-fill');
            const currentProgressBar = progressBars[currentStoryIndex];
            currentProgressBar.style.transition = 'none';
            currentProgressBar.style.width = '0%';
            
            // Passer à la précédente ou rester sur la première
            if (currentStoryIndex > 0) {
                currentStoryIndex--;
                
                // Marquer la story précédente comme non terminée
                const prevProgressBar = progressBars[currentStoryIndex];
                prevProgressBar.style.transition = 'none';
                prevProgressBar.style.width = '0%';
                
                showCurrentStory();
            } else {
                // Redémarrer la story actuelle
                showCurrentStory();
            }
        }

        // Événements pour les éléments de story
        storyItems.forEach(item => {
            item.addEventListener('click', () => {
                const storyId = parseInt(item.getAttribute('data-story-id'));
                openStoryModal(storyId);
            });
        });

        // Événement pour fermer la modal
        closeStoryBtn.addEventListener('click', closeStoryModal);

        // Événements pour naviguer entre les stories
        prevStoryNav.addEventListener('click', prevStory);
        nextStoryNav.addEventListener('click', nextStory);

        // Fermer avec Escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !storyModal.classList.contains('hidden')) {
                closeStoryModal();
            }
        });

        // Mettre en pause en quittant la page
        document.addEventListener('visibilitychange', () => {
            if (document.hidden && !storyModal.classList.contains('hidden')) {
                isPaused = true;
                pauseStoryProgress();
            } else if (!document.hidden && !storyModal.classList.contains('hidden') && isPaused) {
                isPaused = false;
                continueStoryProgress();
            }
        });

        // Animer les éléments au chargement et au défilement
        animateVisibleElements();
        window.addEventListener('scroll', animateVisibleElements);
        
        // Ajouter événement au bouton "Ajouter une story" (pour démo)
        document.querySelector('button').addEventListener('click', () => {
            alert('Fonctionnalité pour ajouter une story à implémenter selon votre système de gestion de contenu.');
        });
    });
</script>

    


    

    <!-- Événements Section -->
    <section id="events" class="py-20 bg-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-8">Événements</h2>
            <p class="text-lg text-center text-gray-300 max-w-2xl mx-auto">
                Participez à nos prochains événements et rencontrez notre communauté.
            </p>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gray-900">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-8">Contactez-nous</h2>
            <form class="max-w-2xl mx-auto">
                <div class="mb-6">
                    <label for="name" class="block text-gray-300 mb-2">Nom</label>
                    <input type="text" id="name" class="w-full p-3 bg-gray-800 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                </div>
                <div class="mb-6">
                    <label for="email" class="block text-gray-300 mb-2">Email</label>
                    <input type="email" id="email" class="w-full p-3 bg-gray-800 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                </div>
                <div class="mb-6">
                    <label for="message" class="block text-gray-300 mb-2">Message</label>
                    <textarea id="message" class="w-full p-3 bg-gray-800 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" rows="5"></textarea>
                </div>
                <button type="submit" class="w-full bg-purple-600 text-white py-3 rounded-lg hover:bg-purple-700 transition duration-300">Envoyer</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-blue-900 to-purple-900 py-6">
        <div class="container mx-auto text-center">
            <p class="text-gray-300">&copy; 2023 Club Name. Tous droits réservés.</p>
        </div>
    </footer>

    <!-- Script pour le menu burger -->
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const navMenu = document.getElementById('nav-menu');

        menuToggle.addEventListener('click', () => {
            navMenu.classList.toggle('hidden');
        });
    </script>
    
@endsection