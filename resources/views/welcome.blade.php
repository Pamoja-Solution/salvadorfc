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

        <!-- Bannière événement principal avec compte à rebours -->
        <div class="relative mb-12 rounded-xl overflow-hidden shadow-2xl opacity-0 transform translate-y-10 transition-all duration-1000 ease-out" id="featured-event">
            <div class="relative h-[400px] w-full overflow-hidden group">
                <img src="{{ asset('img/1740169349422.jpg') }}" alt="{{ $dernier->type->nom }}" class="w-full h-full object-cover brightness-75 transform transition-transform duration-700 group-hover:scale-105">
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
    
</html>
