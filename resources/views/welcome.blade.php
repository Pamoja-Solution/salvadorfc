<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

       
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
        <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/sort@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
        <script src="https://cdn.tailwindcss.com"></script>
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        
    @else
   

    @endif
    <style>
                    
        @font-face {
          font-family: 'Google';
          src: url('{{asset('ProductSans-Light.ttf')}}');
          font-weight: 500;
          
      }
      body{
          font-family: 'Google';
      }
      </style>
        <style>
            /* Animation pour le texte */
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .animate-fadeIn {
                animation: fadeIn 1.5s ease-out;
            }
        </style>
    </head>
    @php
    $route = request()->route() ? request()->route()->getName() : 'route_inconnue';
  @endphp

    
<body class="backdrop-blur-md bg-opacity-70 bg-gray-900 text-white ">
    <!-- Header Sticky -->
    <nav class=" shadow-lg sticky top-0 z-50 backdrop-blur-md bg-opacity-70 bg-gray-900 ">

        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <!-- Logo -->

            <a href="{ {route('index')}}" class="flex items-center space-x-3 rtl:space-x-reverse group">
                <div class="relative">
                    <img src="{{ asset('logo.png') }}" alt="Club Logo" class="h-12 md:h-16">
                </div>
                <span class="self-center text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500 hover:from-cyan-300 hover:to-blue-400 transition-all duration-300">Salvador F.C</span>
    
            </a>
            
            <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-cyan-400 rounded-lg md:hidden hover:bg-gray-800/50 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                <span class="sr-only">Menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
              </button>
          
              <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium rounded-lg md:space-x-4 rtl:space-x-reverse md:flex-row md:mt-0">
                  <li>
                    <a href="{ {route('index')}}" class="block py-2 px-3 text-cyan-400 rounded hover:bg-gray-800/50 hover:text-cyan-300 transition-colors duration-300">Actualités</a>
                  </li>
                  @if (str_contains($route, 'user'))
                  <li>
                    <a href="{{route('user.newpost')}}" class="block py-2 px-3 text-cyan-400 rounded hover:bg-gray-800/50 hover:text-cyan-300 transition-colors duration-300">Calendrier</a>
                  </li>
                  @endif
                  
                  <li>
                    <a href="{ {route('user.accueil')}}" class="block py-2 px-3 text-cyan-400 rounded hover:bg-gray-800/50 hover:text-cyan-300 transition-colors duration-300">Résultats</a>
                  </li>
                  <li>
                    <a href="{ {route('user.accueil')}}" class="block py-2 px-3 text-cyan-400 rounded hover:bg-gray-800/50 hover:text-cyan-300 transition-colors duration-300">Jouers</a>
                  </li>
                  <li>
                    <a href="{ {route('user.accueil')}}" class="block py-2 px-3 text-cyan-400 rounded hover:bg-gray-800/50 hover:text-cyan-300 transition-colors duration-300">Photos</a>
                  </li>
                  <li>
                    <a href="{ { route('news') }}" class="block py-2 px-3 text-cyan-400 rounded hover:bg-gray-800/50 hover:text-cyan-300 transition-colors duration-300">Classement</a>
                  </li>
                  <li>
                    <a href="{ {route('user.accueil')}}" class="block py-2 px-3 text-cyan-400 rounded hover:bg-gray-800/50 hover:text-cyan-300 transition-colors duration-300">Palmares</a>
                  </li>
                  <li class="relative">
                    <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-400 hover:to-blue-400 focus:ring-4 focus:ring-cyan-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center transition-all duration-300" type="button">
                      Compte
                     @if (Auth::user())
                        @if(Auth::user()->image)
                          <img src="{{Auth::user()->imageUrls()}}" class="w-3.5 h-3.5 ms-3 rounded-full"> <!-- Image plus grande -->
                        @else
                          <svg class="w-3.5 h-3.5 ms-3 text-cyan-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>
                          </svg>
                      @endif
                     @else
                     <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                     @endif
                    </button>
                    
                    <div id="dropdownInformation" class="z-10 hidden backdrop-blur-md bg-gray-900/90 divide-y divide-gray-700/50 rounded-lg shadow-lg shadow-cyan-500/20 min-w-[250px]"> <!-- Augmentation de la largeur minimale -->
                      <div class="px-4 py-4 text-sm text-cyan-400"> <!-- Augmentation du padding -->
                        @auth
                          <div>
                            <ul class="text-sm text-cyan-400" aria-labelledby="dropdownInformationButton">
                              <li class="flex items-center px-1 py-2 hover:bg-gray-800/50 rounded transition-colors duration-300"> <!-- Augmentation du padding vertical -->
                                @if(Auth::user()->image)
                                  <img src="{{Auth::user()->imageUrls()}}" class="w-8 h-8 me-3 rounded-full"> <!-- Image plus grande -->
                                @else
                                  <svg class="w-8 h-8 me-3 text-cyan-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>
                                  </svg>
                                @endif
                                <span class="text-base">{{Str::limit(Auth::user()->name,15)}}</span> <!-- Texte plus grand -->
                              </li>
                            </ul>
                          </div>
                          <div class="text-cyan-400 truncate mt-2 text-base">{{Auth::user()->email}}</div> <!-- Email plus grand -->
                        @endauth
                        @guest
                          <div class="space-y-3"> <!-- Ajout d'espacement entre les boutons -->
                            <a href="{{route('login')}}" class="flex items-center justify-between w-full p-3 font-medium text-cyan-400 hover:text-cyan-300 hover:bg-gray-800/50 rounded transition-all duration-300">
                              <span class="text-base">Se Connecter</span> <!-- Texte plus grand -->
                              <svg class="w-5 h-5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                              </svg>
                            </a>
                            <a href="{{route('register')}}" class="flex items-center justify-between w-full p-3 font-medium text-cyan-400 hover:text-cyan-300 hover:bg-gray-800/50 rounded transition-all duration-300">
                              <span class="text-base">Créer un Compte</span> <!-- Texte plus grand -->
                              <svg class="w-5 h-5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                              </svg>
                            </a>
                          </div>
                        @endguest
                      </div>
                      @auth
                        <ul class="py-2 text-sm text-cyan-400">
                          <li>
                            <a href="{{route('dashboard')}}" class="block px-4 py-3 text-base hover:bg-gray-800/50 transition-colors duration-300">{{__("Mon Compte")}}</a> <!-- Padding et texte plus grands -->
                          </li>
                          @auth
                            @if (Auth::user()->role==0)
                            <li>
                              <a href="{{route('dashboard')}}" class="block px-4 py-3 text-base hover:bg-gray-800/50 transition-colors duration-300">{{__("Dashboard")}}</a> <!-- Padding et texte plus grands -->
                            </li>
                              
                            @endif
                          @endauth
          
                          <li>
                            <a href="{ {route('user.newpost')}}" class="block px-4 py-3 text-base hover:bg-gray-800/50 transition-colors duration-300">Nouveau Post</a> <!-- Padding et texte plus grands -->
                          </li>
                        </ul>
                        <div class="py-2">
                          <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="block px-4 py-3 text-base text-red-400 hover:bg-gray-800/50 transition-colors duration-300" href="{{route('logout')}}" 
                               onclick="event.preventDefault(); this.closest('form').submit();">
                              {{ __('Se Déconnecter') }}
                            </a>
                          </form>
                        </div>
                      @endauth
                    </div>
          
          
          
                  </li>
                </ul>
              </div>
        </div>
    </nav>

    
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
                        <img src="{{ $jouer->imageUrl() }}" alt="Joueur 1" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                        @else
                        <img src="{{ asset('logo.jpg') }}" alt="Joueur 1" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">

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
                        <p class="text-gray-400">Capitaine & Milieu de terrain</p>
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

        <!-- Bannière événement principal avec compte à rebours -->
        <div class="relative mb-12 rounded-xl overflow-hidden shadow-2xl opacity-0 transform translate-y-10 transition-all duration-1000 ease-out" id="featured-event">
            <div class="relative h-[400px] w-full overflow-hidden group">
                <img src="{{ asset('img/1740169349422.jpg') }}" alt="Match à venir" class="w-full h-full object-cover brightness-75 transform transition-transform duration-700 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                <div class="absolute inset-0 flex flex-col justify-center items-center p-6 text-center">
                    <span class="px-4 py-1 bg-gradient-to-r from-purple-500 to-blue-500 text-white text-sm rounded-full mb-4 animate-pulse">Match à venir</span>
                    <h3 class="text-3xl md:text-4xl font-bold text-white mb-2">FC Salvador vs. FC Kinshasa</h3>
                    <p class="text-gray-200 mb-6">Championnat régional - Demi-finale</p>
                    
                    <!-- Compte à rebours -->
                    <div class="grid grid-cols-4 gap-4 mb-6">
                        <div class="bg-black/50 backdrop-blur-sm p-3 rounded-lg text-center w-20">
                            <div class="text-2xl font-bold text-white countdown-days">15</div>
                            <div class="text-xs text-gray-300">JOURS</div>
                        </div>
                        <div class="bg-black/50 backdrop-blur-sm p-3 rounded-lg text-center w-20">
                            <div class="text-2xl font-bold text-white countdown-hours">08</div>
                            <div class="text-xs text-gray-300">HEURES</div>
                        </div>
                        <div class="bg-black/50 backdrop-blur-sm p-3 rounded-lg text-center w-20">
                            <div class="text-2xl font-bold text-white countdown-minutes">45</div>
                            <div class="text-xs text-gray-300">MINUTES</div>
                        </div>
                        <div class="bg-black/50 backdrop-blur-sm p-3 rounded-lg text-center w-20">
                            <div class="text-2xl font-bold text-white countdown-seconds">30</div>
                            <div class="text-xs text-gray-300">SECONDES</div>
                        </div>
                    </div>
                    
                    <a href="#" class="px-6 py-3 bg-gradient-to-r from-purple-500 to-blue-500 text-white font-semibold rounded-full shadow-lg transform transition-transform hover:scale-105">
                        Plus d'informations
                    </a>
                </div>
            </div>
        </div>

        <!-- Filtres d'actualités -->
        <div class="flex flex-wrap justify-center gap-4 mb-12 opacity-0 transform translate-y-10 transition-all duration-1000 ease-out delay-100" id="news-filters">
            <button class="px-5 py-2 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-full shadow-md news-filter active" data-filter="all">
                Tous
            </button>
            <button class="px-5 py-2 bg-gray-800 text-gray-300 rounded-full shadow-md hover:bg-gray-700 transition-all news-filter" data-filter="matches">
                Matchs
            </button>
            <button class="px-5 py-2 bg-gray-800 text-gray-300 rounded-full shadow-md hover:bg-gray-700 transition-all news-filter" data-filter="training">
                Entraînements
            </button>
            <button class="px-5 py-2 bg-gray-800 text-gray-300 rounded-full shadow-md hover:bg-gray-700 transition-all news-filter" data-filter="club">
                Vie du club
            </button>
            <button class="px-5 py-2 bg-gray-800 text-gray-300 rounded-full shadow-md hover:bg-gray-700 transition-all news-filter" data-filter="media">
                Médias
            </button>
        </div>

        <!-- Grille d'actualités -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12" id="news-grid">
            <!-- Article d'actualité 1 -->
            <article class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-xl overflow-hidden group transform transition-all duration-300 hover:-translate-y-2 opacity-0 translate-y-10 transition-opacity ease-out news-item" data-category="matches">
                <div class="relative h-56 overflow-hidden">
                    <span class="absolute top-3 left-3 z-10 px-3 py-1 bg-gradient-to-r from-purple-500 to-blue-500 text-white text-xs rounded-full">Match</span>
                    <img src="{{ asset('img/1740169797146.jpg') }}" alt="Victoire éclatante" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <div class="absolute bottom-3 left-3 bg-black/60 backdrop-blur-sm text-white px-2 py-1 rounded text-sm">12 Fév 2025</div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-2">Victoire éclatante pour nos U17</h3>
                    <p class="text-gray-300 mb-4">Une performance remarquable de notre équipe qui s'impose 3-0 face à l'équipe de Matete. Jean Kabasele a brillé avec un doublé.</p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-r from-purple-500 to-blue-500 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z" />
                                </svg>
                            </div>
                            <span class="text-gray-400 text-sm">86 vues</span>
                        </div>
                        <a href="#" class="text-blue-400 hover:text-blue-300 transition-colors flex items-center">
                            Lire plus
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Article d'actualité 2 -->
            <article class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-xl overflow-hidden group transform transition-all duration-300 hover:-translate-y-2 opacity-0 translate-y-10 transition-opacity ease-out news-item" data-category="training">
                <div class="relative h-56 overflow-hidden">
                    <span class="absolute top-3 left-3 z-10 px-3 py-1 bg-gradient-to-r from-purple-500 to-blue-500 text-white text-xs rounded-full">Entraînement</span>
                    <img src="{{ asset('img/1740169523721.jpg') }}" alt="Nouvelle méthode d'entraînement" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <div class="absolute bottom-3 left-3 bg-black/60 backdrop-blur-sm text-white px-2 py-1 rounded text-sm">5 Fév 2025</div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-2">Nouvelle méthode d'entraînement</h3>
                    <p class="text-gray-300 mb-4">Notre coach a introduit une approche innovante pour améliorer la condition physique et la cohésion d'équipe.</p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-r from-purple-500 to-blue-500 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z" />
                                </svg>
                            </div>
                            <span class="text-gray-400 text-sm">64 vues</span>
                        </div>
                        <a href="#" class="text-blue-400 hover:text-blue-300 transition-colors flex items-center">
                            Lire plus
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Article d'actualité 3 -->
            <article class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-xl overflow-hidden group transform transition-all duration-300 hover:-translate-y-2 opacity-0 translate-y-10 transition-opacity ease-out news-item" data-category="club">
                <div class="relative h-56 overflow-hidden">
                    <span class="absolute top-3 left-3 z-10 px-3 py-1 bg-gradient-to-r from-purple-500 to-blue-500 text-white text-xs rounded-full">Vie du club</span>
                    <img src="{{ asset('img/1740169349422.jpg') }}" alt="Nouveaux équipements" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <div class="absolute bottom-3 left-3 bg-black/60 backdrop-blur-sm text-white px-2 py-1 rounded text-sm">28 Jan 2025</div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-2">Nouveaux équipements pour la saison</h3>
                    <p class="text-gray-300 mb-4">Grâce à notre nouveau partenariat, l'équipe a reçu un ensemble complet d'équipements de qualité professionnelle.</p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-r from-purple-500 to-blue-500 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z" />
                                </svg>
                            </div>
                            <span class="text-gray-400 text-sm">105 vues</span>
                        </div>
                        <a href="#" class="text-blue-400 hover:text-blue-300 transition-colors flex items-center">
                            Lire plus
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Article d'actualité 4 -->
            <article class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-xl overflow-hidden group transform transition-all duration-300 hover:-translate-y-2 opacity-0 translate-y-10 transition-opacity ease-out news-item" data-category="media">
                <div class="relative h-56 overflow-hidden">
                    <span class="absolute top-3 left-3 z-10 px-3 py-1 bg-gradient-to-r from-purple-500 to-blue-500 text-white text-xs rounded-full">Médias</span>
                    <img src="{{ asset('img/1740169797146.jpg') }}" alt="Reportage" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <div class="absolute bottom-3 left-3 bg-black/60 backdrop-blur-sm text-white px-2 py-1 rounded text-sm">20 Jan 2025</div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-2">Reportage spécial sur notre académie</h3>
                    <p class="text-gray-300 mb-4">La chaîne nationale a diffusé un reportage complet sur notre centre de formation et nos méthodes de développement des jeunes talents.</p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-r from-purple-500 to-blue-500 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z" />
                                </svg>
                            </div>
                            <span class="text-gray-400 text-sm">132 vues</span>
                        </div>
                        <a href="#" class="text-blue-400 hover:text-blue-300 transition-colors flex items-center">
                            Lire plus
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Article d'actualité 5 -->
            <article class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-xl overflow-hidden group transform transition-all duration-300 hover:-translate-y-2 opacity-0 translate-y-10 transition-opacity ease-out news-item" data-category="matches">
                <div class="relative h-56 overflow-hidden">
                    <span class="absolute top-3 left-3 z-10 px-3 py-1 bg-gradient-to-r from-purple-500 to-blue-500 text-white text-xs rounded-full">Match</span>
                    <img src="{{ asset('img/1740169523721.jpg') }}" alt="Analyse tactique" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <div class="absolute bottom-3 left-3 bg-black/60 backdrop-blur-sm text-white px-2 py-1 rounded text-sm">15 Jan 2025</div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-2">Analyse tactique de notre dernier match</h3>
                    <p class="text-gray-300 mb-4">Notre coach décortique les points forts et les axes d'amélioration suite au dernier match disputé contre FC Bandal.</p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-r from-purple-500 to-blue-500 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z" />
                                </svg>
                            </div>
                            <span class="text-gray-400 text-sm">78 vues</span>
                        </div>
                        <a href="#" class="text-blue-400 hover:text-blue-300 transition-colors flex items-center">
                            Lire plus
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Article d'actualité 6 -->
            <article class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-xl overflow-hidden group transform transition-all duration-300 hover:-translate-y-2 opacity-0 translate-y-10 transition-opacity ease-out news-item" data-category="training">
                <div class="relative h-56 overflow-hidden">
                    <span class="absolute top-3 left-3 z-10 px-3 py-1 bg-gradient-to-r from-purple-500 to-blue-500 text-white text-xs rounded-full">Entraînement</span>
                    <img src="{{ asset('img/1740169349422.jpg') }}" alt="Préparation mentale" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <div class="absolute bottom-3 left-3 bg-black/60 backdrop-blur-sm text-white px-2 py-1 rounded text-sm">8 Jan 2025</div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-2">Séance de préparation mentale</h3>
                    <p class="text-gray-300 mb-4">Un psychologue sportif a rejoint l'équipe pour une session spéciale sur la gestion du stress et la concentration.</p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-r from-purple-500 to-blue-500 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z" />
                                </svg>
                            </div>
                            <span class="text-gray-400 text-sm">59 vues</span>
                        </div>
                        <a href="#" class="text-blue-400 hover:text-blue-300 transition-colors flex items-center">
                            Lire plus
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </article>
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
            button.addEventListener('click', function() {
                // Retirer la classe active de tous les boutons
                filterButtons.forEach(btn => {
                    btn.classList.remove('active');
                    btn.classList.remove('bg-gradient-to-r', 'from-purple-500', 'to-blue-500');
                    btn.classList.add('bg-gray-800', 'text-gray-300', 'hover:bg-gray-700');
                });
                
                // Ajouter la classe active au bouton cliqué
                this.classList.add('active');
                this.classList.add('bg-gradient-to-r', 'from-purple-500', 'to-blue-500', 'text-white');
                this.classList.remove('bg-gray-800', 'hover:bg-gray-700', 'text-gray-300');
                
                const filter = this.getAttribute('data-filter');
                
                // Filtrer les articles
                newsItems.forEach(item => {
                    if (filter === 'all' || item.getAttribute('data-category') === filter) {
                        item.style.display = 'block';
                        // Réinitialiser l'animation pour les éléments qui réapparaissent
                        if (!isElementInViewport(item)) {
                            item.classList.add('opacity-0', 'translate-y-10');
                        }
                    } else {
                        item.style.display = 'none';
                    }
                });
                
                // Réanimer les éléments visibles après filtrage
                setTimeout(animateVisibleElements, 100);
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
        updateCountdown();
        setInterval(updateCountdown, 1000);
        
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
<section id="players" class="py-16 bg-gradient-to-br from-gray-900 to-gray-800 overflow-hidden">
    <div class="container mx-auto px-4">
        <!-- Titre de la section avec animation -->
        <!-- Titre de la section avec animation -->
        <h2 class="text-4xl md:text-5xl font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-12 opacity-0 transform translate-y-10 transition-all duration-1000 ease-out" id="news-title">
            Nos Joueurs FC Salvador
        </h2>

        <!-- Carrousel des joueurs -->
        <div class="relative">
            <!-- Conteneur du carrousel -->
            <div class="overflow-hidden">
                <div class="flex transition-transform duration-500 ease-in-out" id="players-carousel">
                    <!-- Carte Joueur 1 -->
                    <div class="min-w-full md:min-w-[50%] lg:min-w-[33.33%] px-4">
                        <div class="relative h-96 rounded-xl overflow-hidden group">
                            <img src="{{ asset('img/1740169349422.jpg') }}" alt="Joueur 1" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                            <!-- Informations du joueur (apparaissent au survol) -->
                            <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/90 to-transparent transform translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out">
                                <h3 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-2">Jean Kabasele</h3>
                                <p class="text-gray-300 mb-2">Attaquant - 25 ans</p>
                                <p class="text-gray-400 text-sm">Jean est un attaquant rapide et technique, connu pour ses dribbles et ses finsitions précises.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Carte Joueur 2 -->
                    <div class="min-w-full md:min-w-[50%] lg:min-w-[33.33%] px-4">
                        <div class="relative h-96 rounded-xl overflow-hidden group">
                            <img src="{{ asset('img/1740169797146.jpg') }}" alt="Joueur 2" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                            <!-- Informations du joueur (apparaissent au survol) -->
                            <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/90 to-transparent transform translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out">
                                <h3 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-2">Paul Mbenza</h3>
                                <p class="text-gray-300 mb-2">Milieu de terrain - 28 ans</p>
                                <p class="text-gray-400 text-sm">Paul est un milieu de terrain créatif, capable de distribuer des passes décisives et de contrôler le rythme du jeu.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Carte Joueur 3 -->
                    <div class="min-w-full md:min-w-[50%] lg:min-w-[33.33%] px-4">
                        <div class="relative h-96 rounded-xl overflow-hidden group">
                            <img src="{{ asset('img/1740169349422.jpg') }}" alt="Joueur 3" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                            <!-- Informations du joueur (apparaissent au survol) -->
                            <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/90 to-transparent transform translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out">
                                <h3 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-2">Samuel Kalala</h3>
                                <p class="text-gray-300 mb-2">Gardien de but - 30 ans</p>
                                <p class="text-gray-400 text-sm">Samuel est un gardien de but expérimenté, connu pour ses réflexes rapides et sa capacité à organiser la défense.</p>
                            </div>
                        </div>
                    </div>

                     <!-- Carte Joueur 3 -->
                     <div class="min-w-full md:min-w-[50%] lg:min-w-[33.33%] px-4">
                        <div class="relative h-96 rounded-xl overflow-hidden group">
                            <img src="{{ asset('img/1740169349422.jpg') }}" alt="Joueur 3" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                            <!-- Informations du joueur (apparaissent au survol) -->
                            <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/90 to-transparent transform translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out">
                                <h3 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-2">Samuel Kalala</h3>
                                <p class="text-gray-300 mb-2">Gardien de but - 30 ans</p>
                                <p class="text-gray-400 text-sm">Samuel est un gardien de but expérimenté, connu pour ses réflexes rapides et sa capacité à organiser la défense.</p>
                            </div>
                        </div>
                    </div>

                     <!-- Carte Joueur 3 -->
                     <div class="min-w-full md:min-w-[50%] lg:min-w-[33.33%] px-4">
                        <div class="relative h-96 rounded-xl overflow-hidden group">
                            <img src="{{ asset('img/1740169797146.jpg') }}" alt="Joueur 3" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                            <!-- Informations du joueur (apparaissent au survol) -->
                            <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/90 to-transparent transform translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out">
                                <h3 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-2">Samuel Kalala</h3>
                                <p class="text-gray-300 mb-2">Gardien de but - 30 ans</p>
                                <p class="text-gray-400 text-sm">Samuel est un gardien de but expérimenté, connu pour ses réflexes rapides et sa capacité à organiser la défense.</p>
                            </div>
                        </div>
                    </div>


                     <!-- Carte Joueur 3 -->
                     <div class="min-w-full md:min-w-[50%] lg:min-w-[33.33%] px-4">
                        <div class="relative h-96 rounded-xl overflow-hidden group">
                            <img src="{{ asset('img/1740169349422.jpg') }}" alt="Joueur 3" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                            <!-- Informations du joueur (apparaissent au survol) -->
                            <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/90 to-transparent transform translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out">
                                <h3 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-2">Samuel Kalala</h3>
                                <p class="text-gray-300 mb-2">Gardien de but - 30 ans</p>
                                <p class="text-gray-400 text-sm">Samuel est un gardien de but expérimenté, connu pour ses réflexes rapides et sa capacité à organiser la défense.</p>
                            </div>
                        </div>
                    </div>


                     <!-- Carte Joueur 3 -->
                     <div class="min-w-full md:min-w-[50%] lg:min-w-[33.33%] px-4">
                        <div class="relative h-96 rounded-xl overflow-hidden group">
                            <img src="{{ asset('img/1740169797146.jpg') }}" alt="Joueur 3" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                            <!-- Informations du joueur (apparaissent au survol) -->
                            <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/90 to-transparent transform translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out">
                                <h3 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-2">Samuel Kalala</h3>
                                <p class="text-gray-300 mb-2">Gardien de but - 30 ans</p>
                                <p class="text-gray-400 text-sm">Samuel est un gardien de but expérimenté, connu pour ses réflexes rapides et sa capacité à organiser la défense.</p>
                            </div>
                        </div>
                    </div>


                     <!-- Carte Joueur 3 -->
                     <div class="min-w-full md:min-w-[50%] lg:min-w-[33.33%] px-4">
                        <div class="relative h-96 rounded-xl overflow-hidden group">
                            <img src="{{ asset('img/1740169349422.jpg') }}" alt="Joueur 3" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                            <!-- Informations du joueur (apparaissent au survol) -->
                            <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/90 to-transparent transform translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out">
                                <h3 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-2">Samuel Kalala</h3>
                                <p class="text-gray-300 mb-2">Gardien de but - 30 ans</p>
                                <p class="text-gray-400 text-sm">Samuel est un gardien de but expérimenté, connu pour ses réflexes rapides et sa capacité à organiser la défense.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Ajoutez d'autres joueurs ici -->
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


<!-- Section Stories : Stories comme Facebook avec support d'images et vidéos -->
<section id="stories" class="py-16 bg-gradient-to-br from-gray-900 to-gray-800 overflow-hidden">
    <div class="container mx-auto px-4">
        <!-- Titre de la section avec animation -->
       <!-- Titre de la section avec animation -->
       <h2 class="text-4xl md:text-5xl font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-12 opacity-0 transform translate-y-10 transition-all duration-1000 ease-out" id="news-title">
            Stories FC Salvador
        </h2>

        <!-- Conteneur du carrousel des stories -->
        <div class="relative">
            <!-- Bouton précédent -->
            <button class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-black/50 backdrop-blur-sm text-white p-3 rounded-full shadow-lg hover:bg-black/70 transition-colors z-10" id="prev-story">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </button>

            <!-- Bouton suivant -->
            <button class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-black/50 backdrop-blur-sm text-white p-3 rounded-full shadow-lg hover:bg-black/70 transition-colors z-10" id="next-story">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </button>

            <!-- Liste des stories -->
            <div class="overflow-hidden">
                <div class="flex space-x-4 transition-transform duration-500 ease-in-out" id="stories-carousel">
                    <!-- Story 1 : Image -->
                    <div class="min-w-[200px] md:min-w-[300px] lg:min-w-[400px] relative rounded-xl overflow-hidden group">
                        <img src="{{ asset('img/story1.jpg') }}" alt="Story 1" class="w-full h-96 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 text-white text-sm">12 Fév 2025</div>
                        <div class="absolute top-4 right-4 bg-black/50 backdrop-blur-sm text-white px-2 py-1 rounded-full text-xs">Nouveau</div>
                    </div>

                    <!-- Story 2 : Vidéo -->
                    <div class="min-w-[200px] md:min-w-[300px] lg:min-w-[400px] relative rounded-xl overflow-hidden group">
                        <video class="w-full h-96 object-cover" controls>
                            <source src="{{ asset('video/story2.mp4') }}" type="video/mp4">
                            Votre navigateur ne supporte pas la vidéo.
                        </video>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 text-white text-sm">10 Fév 2025</div>
                    </div>

                    <!-- Story 3 : Image -->
                    <div class="min-w-[200px] md:min-w-[300px] lg:min-w-[400px] relative rounded-xl overflow-hidden group">
                        <img src="{{ asset('img/story3.jpg') }}" alt="Story 3" class="w-full h-96 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 text-white text-sm">8 Fév 2025</div>
                    </div>

                    <!-- Story 4 : Vidéo -->
                    <div class="min-w-[200px] md:min-w-[300px] lg:min-w-[400px] relative rounded-xl overflow-hidden group">
                        <video class="w-full h-96 object-cover" controls>
                            <source src="{{ asset('video/story4.mp4') }}" type="video/mp4">
                            Votre navigateur ne supporte pas la vidéo.
                        </video>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 text-white text-sm">5 Fév 2025</div>
                    </div>

                    <!-- Ajoutez d'autres stories ici -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Script pour le carrousel des stories -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const carousel = document.getElementById('stories-carousel');
        const prevButton = document.getElementById('prev-story');
        const nextButton = document.getElementById('next-story');
        const storyWidth = document.querySelector('.min-w-[200px]').offsetWidth + 16; // 16px pour l'espace entre les stories
        let currentIndex = 0;

        // Fonction pour déplacer le carrousel
        function moveCarousel(index) {
            const offset = -index * storyWidth;
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

    <!-- Équipe Section -->
    <section id="team" class="py-20 bg-gray-900">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-8">Notre Équipe</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold mb-4">Joueur 1</h3>
                    <p class="text-gray-300">Description du joueur 1.</p>
                </div>
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold mb-4">Joueur 2</h3>
                    <p class="text-gray-300">Description du joueur 2.</p>
                </div>
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold mb-4">Joueur 3</h3>
                    <p class="text-gray-300">Description du joueur 3.</p>
                </div>
            </div>
        </div>
    </section>


    

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
    
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    

</body>
    <!--body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" alt="Laravel background" />
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2">
                            <svg class="h-12 w-auto text-white lg:h-16 lg:text-[#FF2D20]" viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5084 63.8215 24.456 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.20192 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319084 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257786 12.8015 0.211853 12.9765 0.211853C13.1515 0.211853 13.3234 0.257786 13.475 0.345059L25.4531 7.2415H25.4556C25.4955 7.26643 25.5292 7.29759 25.5653 7.32626C25.5977 7.35119 25.6339 7.37362 25.6625 7.40104C25.6974 7.43719 25.7224 7.47832 25.7523 7.51821C25.7735 7.54812 25.8021 7.5743 25.8196 7.6067C25.8483 7.65656 25.8645 7.70891 25.8844 7.76126C25.8944 7.78993 25.9118 7.8161 25.9193 7.84602C25.9423 7.93096 25.954 8.01853 25.9542 8.10652V33.7317L35.9355 27.9844V14.8846C35.9355 14.7973 35.948 14.7088 35.9704 14.6253C35.9792 14.5954 35.9954 14.5692 36.0053 14.5405C36.0253 14.4882 36.0427 14.4346 36.0702 14.386C36.0888 14.3536 36.1163 14.3274 36.1375 14.2975C36.1674 14.2576 36.1923 14.2165 36.2272 14.1816C36.2559 14.1529 36.292 14.1317 36.3244 14.1068C36.3618 14.0769 36.3942 14.0445 36.4341 14.0208L48.4147 7.12434C48.5663 7.03694 48.7383 6.99094 48.9133 6.99094C49.0883 6.99094 49.2602 7.03694 49.4118 7.12434L61.3899 14.0208C61.4323 14.0457 61.4647 14.0769 61.5021 14.1055C61.5333 14.1305 61.5694 14.1529 61.5981 14.1803C61.633 14.2165 61.6579 14.2576 61.6878 14.2975C61.7103 14.3274 61.7377 14.3536 61.7551 14.386C61.7838 14.4346 61.8 14.4882 61.8199 14.5405C61.8312 14.5692 61.8474 14.5954 61.8548 14.6253ZM59.893 27.9844V16.6121L55.7013 19.0252L49.9104 22.3593V33.7317L59.8942 27.9844H59.893ZM47.9149 48.5566V37.1768L42.2187 40.4299L25.953 49.7133V61.2003L47.9149 48.5566ZM1.99677 9.83281V48.5566L23.9562 61.199V49.7145L12.4841 43.2219L12.4804 43.2194L12.4754 43.2169C12.4368 43.1945 12.4044 43.1621 12.3682 43.1347C12.3371 43.1097 12.3009 43.0898 12.2735 43.0624L12.271 43.0586C12.2386 43.0275 12.2162 42.9888 12.1887 42.9539C12.1638 42.9203 12.1339 42.8916 12.114 42.8567L12.1127 42.853C12.0903 42.8156 12.0766 42.7707 12.0604 42.7283C12.0442 42.6909 12.023 42.656 12.013 42.6161C12.0005 42.5688 11.998 42.5177 11.9931 42.4691C11.9881 42.4317 11.9781 42.3943 11.9781 42.3569V15.5801L6.18848 12.2446L1.99677 9.83281ZM12.9777 2.36177L2.99764 8.10652L12.9752 13.8513L22.9541 8.10527L12.9752 2.36177H12.9777ZM18.1678 38.2138L23.9574 34.8809V9.83281L19.7657 12.2459L13.9749 15.5801V40.6281L18.1678 38.2138ZM48.9133 9.14105L38.9344 14.8858L48.9133 20.6305L58.8909 14.8846L48.9133 9.14105ZM47.9149 22.3593L42.124 19.0252L37.9323 16.6121V27.9844L43.7219 31.3174L47.9149 33.7317V22.3593ZM24.9533 47.987L39.59 39.631L46.9065 35.4555L36.9352 29.7145L25.4544 36.3242L14.9907 42.3482L24.9533 47.987Z" fill="currentColor"/></svg>
                        </div>
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </header>

                    <main class="mt-6">
                        <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                            <a
                                href="https://laravel.com/docs"
                                id="docs-card"
                                class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                            >
                                <div id="screenshot-container" class="relative flex w-full flex-1 items-stretch">
                                    <img
                                        src="https://laravel.com/assets/img/welcome/docs-light.svg"
                                        alt="Laravel documentation screenshot"
                                        class="aspect-video h-full w-full flex-1 rounded-[10px] object-top object-cover drop-shadow-[0px_4px_34px_rgba(0,0,0,0.06)] dark:hidden"
                                        onerror="
                                            document.getElementById('screenshot-container').classList.add('!hidden');
                                            document.getElementById('docs-card').classList.add('!row-span-1');
                                            document.getElementById('docs-card-content').classList.add('!flex-row');
                                            document.getElementById('background').classList.add('!hidden');
                                        "
                                    />
                                    <img
                                        src="https://laravel.com/assets/img/welcome/docs-dark.svg"
                                        alt="Laravel documentation screenshot"
                                        class="hidden aspect-video h-full w-full flex-1 rounded-[10px] object-top object-cover drop-shadow-[0px_4px_34px_rgba(0,0,0,0.25)] dark:block"
                                    />
                                    <div
                                        class="absolute -bottom-16 -left-16 h-40 w-[calc(100%_+_8rem)] bg-gradient-to-b from-transparent via-white to-white dark:via-zinc-900 dark:to-zinc-900"
                                    ></div>
                                </div>

                                <div class="relative flex items-center gap-6 lg:items-end">
                                    <div id="docs-card-content" class="flex items-start gap-6 lg:flex-col">
                                        <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                            <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><path fill="#FF2D20" d="M23 4a1 1 0 0 0-1.447-.894L12.224 7.77a.5.5 0 0 1-.448 0L2.447 3.106A1 1 0 0 0 1 4v13.382a1.99 1.99 0 0 0 1.105 1.79l9.448 4.728c.14.065.293.1.447.1.154-.005.306-.04.447-.105l9.453-4.724a1.99 1.99 0 0 0 1.1-1.789V4ZM3 6.023a.25.25 0 0 1 .362-.223l7.5 3.75a.251.251 0 0 1 .138.223v11.2a.25.25 0 0 1-.362.224l-7.5-3.75a.25.25 0 0 1-.138-.22V6.023Zm18 11.2a.25.25 0 0 1-.138.224l-7.5 3.75a.249.249 0 0 1-.329-.099.249.249 0 0 1-.033-.12V9.772a.251.251 0 0 1 .138-.224l7.5-3.75a.25.25 0 0 1 .362.224v11.2Z"/><path fill="#FF2D20" d="m3.55 1.893 8 4.048a1.008 1.008 0 0 0 .9 0l8-4.048a1 1 0 0 0-.9-1.785l-7.322 3.706a.506.506 0 0 1-.452 0L4.454.108a1 1 0 0 0-.9 1.785H3.55Z"/></svg>
                                        </div>

                                        <div class="pt-3 sm:pt-5 lg:pt-0">
                                            <h2 class="text-xl font-semibold text-black dark:text-white">Documentation</h2>

                                            <p class="mt-4 text-sm/relaxed">
                                                Laravel has wonderful documentation covering every aspect of the framework. Whether you are a newcomer or have prior experience with Laravel, we recommend reading our documentation from beginning to end.
                                            </p>
                                        </div>
                                    </div>

                                    <svg class="size-6 shrink-0 stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                                </div>
                            </a>

                            <a
                                href="https://laracasts.com"
                                class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                            >
                                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                    <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><g fill="#FF2D20"><path d="M24 8.25a.5.5 0 0 0-.5-.5H.5a.5.5 0 0 0-.5.5v12a2.5 2.5 0 0 0 2.5 2.5h19a2.5 2.5 0 0 0 2.5-2.5v-12Zm-7.765 5.868a1.221 1.221 0 0 1 0 2.264l-6.626 2.776A1.153 1.153 0 0 1 8 18.123v-5.746a1.151 1.151 0 0 1 1.609-1.035l6.626 2.776ZM19.564 1.677a.25.25 0 0 0-.177-.427H15.6a.106.106 0 0 0-.072.03l-4.54 4.543a.25.25 0 0 0 .177.427h3.783c.027 0 .054-.01.073-.03l4.543-4.543ZM22.071 1.318a.047.047 0 0 0-.045.013l-4.492 4.492a.249.249 0 0 0 .038.385.25.25 0 0 0 .14.042h5.784a.5.5 0 0 0 .5-.5v-2a2.5 2.5 0 0 0-1.925-2.432ZM13.014 1.677a.25.25 0 0 0-.178-.427H9.101a.106.106 0 0 0-.073.03l-4.54 4.543a.25.25 0 0 0 .177.427H8.4a.106.106 0 0 0 .073-.03l4.54-4.543ZM6.513 1.677a.25.25 0 0 0-.177-.427H2.5A2.5 2.5 0 0 0 0 3.75v2a.5.5 0 0 0 .5.5h1.4a.106.106 0 0 0 .073-.03l4.54-4.543Z"/></g></svg>
                                </div>

                                <div class="pt-3 sm:pt-5">
                                    <h2 class="text-xl font-semibold text-black dark:text-white">Laracasts</h2>

                                    <p class="mt-4 text-sm/relaxed">
                                        Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                                    </p>
                                </div>

                                <svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                            </a>

                            <a
                                href="https://laravel-news.com"
                                class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                            >
                                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                    <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><g fill="#FF2D20"><path d="M8.75 4.5H5.5c-.69 0-1.25.56-1.25 1.25v4.75c0 .69.56 1.25 1.25 1.25h3.25c.69 0 1.25-.56 1.25-1.25V5.75c0-.69-.56-1.25-1.25-1.25Z"/><path d="M24 10a3 3 0 0 0-3-3h-2V2.5a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2V20a3.5 3.5 0 0 0 3.5 3.5h17A3.5 3.5 0 0 0 24 20V10ZM3.5 21.5A1.5 1.5 0 0 1 2 20V3a.5.5 0 0 1 .5-.5h14a.5.5 0 0 1 .5.5v17c0 .295.037.588.11.874a.5.5 0 0 1-.484.625L3.5 21.5ZM22 20a1.5 1.5 0 1 1-3 0V9.5a.5.5 0 0 1 .5-.5H21a1 1 0 0 1 1 1v10Z"/><path d="M12.751 6.047h2a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-2A.75.75 0 0 1 12 7.3v-.5a.75.75 0 0 1 .751-.753ZM12.751 10.047h2a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-2A.75.75 0 0 1 12 11.3v-.5a.75.75 0 0 1 .751-.753ZM4.751 14.047h10a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-10A.75.75 0 0 1 4 15.3v-.5a.75.75 0 0 1 .751-.753ZM4.75 18.047h7.5a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-7.5A.75.75 0 0 1 4 19.3v-.5a.75.75 0 0 1 .75-.753Z"/></g></svg>
                                </div>

                                <div class="pt-3 sm:pt-5">
                                    <h2 class="text-xl font-semibold text-black dark:text-white">Laravel News</h2>

                                    <p class="mt-4 text-sm/relaxed">
                                        Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.
                                    </p>
                                </div>

                                <svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                            </a>

                            <div class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                    <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <g fill="#FF2D20">
                                            <path
                                                d="M16.597 12.635a.247.247 0 0 0-.08-.237 2.234 2.234 0 0 1-.769-1.68c.001-.195.03-.39.084-.578a.25.25 0 0 0-.09-.267 8.8 8.8 0 0 0-4.826-1.66.25.25 0 0 0-.268.181 2.5 2.5 0 0 1-2.4 1.824.045.045 0 0 0-.045.037 12.255 12.255 0 0 0-.093 3.86.251.251 0 0 0 .208.214c2.22.366 4.367 1.08 6.362 2.118a.252.252 0 0 0 .32-.079 10.09 10.09 0 0 0 1.597-3.733ZM13.616 17.968a.25.25 0 0 0-.063-.407A19.697 19.697 0 0 0 8.91 15.98a.25.25 0 0 0-.287.325c.151.455.334.898.548 1.328.437.827.981 1.594 1.619 2.28a.249.249 0 0 0 .32.044 29.13 29.13 0 0 0 2.506-1.99ZM6.303 14.105a.25.25 0 0 0 .265-.274 13.048 13.048 0 0 1 .205-4.045.062.062 0 0 0-.022-.07 2.5 2.5 0 0 1-.777-.982.25.25 0 0 0-.271-.149 11 11 0 0 0-5.6 2.815.255.255 0 0 0-.075.163c-.008.135-.02.27-.02.406.002.8.084 1.598.246 2.381a.25.25 0 0 0 .303.193 19.924 19.924 0 0 1 5.746-.438ZM9.228 20.914a.25.25 0 0 0 .1-.393 11.53 11.53 0 0 1-1.5-2.22 12.238 12.238 0 0 1-.91-2.465.248.248 0 0 0-.22-.187 18.876 18.876 0 0 0-5.69.33.249.249 0 0 0-.179.336c.838 2.142 2.272 4 4.132 5.353a.254.254 0 0 0 .15.048c1.41-.01 2.807-.282 4.117-.802ZM18.93 12.957l-.005-.008a.25.25 0 0 0-.268-.082 2.21 2.21 0 0 1-.41.081.25.25 0 0 0-.217.2c-.582 2.66-2.127 5.35-5.75 7.843a.248.248 0 0 0-.09.299.25.25 0 0 0 .065.091 28.703 28.703 0 0 0 2.662 2.12.246.246 0 0 0 .209.037c2.579-.701 4.85-2.242 6.456-4.378a.25.25 0 0 0 .048-.189 13.51 13.51 0 0 0-2.7-6.014ZM5.702 7.058a.254.254 0 0 0 .2-.165A2.488 2.488 0 0 1 7.98 5.245a.093.093 0 0 0 .078-.062 19.734 19.734 0 0 1 3.055-4.74.25.25 0 0 0-.21-.41 12.009 12.009 0 0 0-10.4 8.558.25.25 0 0 0 .373.281 12.912 12.912 0 0 1 4.826-1.814ZM10.773 22.052a.25.25 0 0 0-.28-.046c-.758.356-1.55.635-2.365.833a.25.25 0 0 0-.022.48c1.252.43 2.568.65 3.893.65.1 0 .2 0 .3-.008a.25.25 0 0 0 .147-.444c-.526-.424-1.1-.917-1.673-1.465ZM18.744 8.436a.249.249 0 0 0 .15.228 2.246 2.246 0 0 1 1.352 2.054c0 .337-.08.67-.23.972a.25.25 0 0 0 .042.28l.007.009a15.016 15.016 0 0 1 2.52 4.6.25.25 0 0 0 .37.132.25.25 0 0 0 .096-.114c.623-1.464.944-3.039.945-4.63a12.005 12.005 0 0 0-5.78-10.258.25.25 0 0 0-.373.274c.547 2.109.85 4.274.901 6.453ZM9.61 5.38a.25.25 0 0 0 .08.31c.34.24.616.561.8.935a.25.25 0 0 0 .3.127.631.631 0 0 1 .206-.034c2.054.078 4.036.772 5.69 1.991a.251.251 0 0 0 .267.024c.046-.024.093-.047.141-.067a.25.25 0 0 0 .151-.23A29.98 29.98 0 0 0 15.957.764a.25.25 0 0 0-.16-.164 11.924 11.924 0 0 0-2.21-.518.252.252 0 0 0-.215.076A22.456 22.456 0 0 0 9.61 5.38Z"
                                            />
                                        </g>
                                    </svg>
                                </div>

                                <div class="pt-3 sm:pt-5">
                                    <h2 class="text-xl font-semibold text-black dark:text-white">Vibrant Ecosystem</h2>

                                    <p class="mt-4 text-sm/relaxed">
                                        Laravel's robust library of first-party tools and libraries, such as <a href="https://forge.laravel.com" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white dark:focus-visible:ring-[#FF2D20]">Forge</a>, <a href="https://vapor.laravel.com" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Vapor</a>, <a href="https://nova.laravel.com" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Nova</a>, <a href="https://envoyer.io" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Envoyer</a>, and <a href="https://herd.laravel.com" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Herd</a> help you take your projects to the next level. Pair them with powerful open source libraries like <a href="https://laravel.com/docs/billing" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Cashier</a>, <a href="https://laravel.com/docs/dusk" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Dusk</a>, <a href="https://laravel.com/docs/broadcasting" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Echo</a>, <a href="https://laravel.com/docs/horizon" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Horizon</a>, <a href="https://laravel.com/docs/sanctum" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Sanctum</a>, <a href="https://laravel.com/docs/telescope" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Telescope</a>, and more.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </main>

                    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </footer>
                </div>
            </div>
        </div>
    </body-->
</html>
