<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @if(request()->is('actualites/posts/*'))
          <title>{{ $post->titre }}</title>
          <meta name="description" content="{{ $post->description }}" />
          <meta name="author" content="{{ mb_strtoupper($post->users->name, 'UTF-8') }}" />
          <meta name="robots" content="all">
          <meta property="og:locale" content="fr_FR" />
          <meta property="og:site_name" content="FC SALVADOR" />
          <meta name="msvalidate.01" content="F61941C03B23140DCAE7F648A3DEE7E6" />
          <meta name="X-CSRF-TOKEN" content="{{ csrf_token() }}">
          <meta property="og:type" content="article" />
          <meta property="og:title" content="{{ mb_strtoupper($post->titre, 'UTF-8') }}" />
          <meta property="og:description" content="{{ Str::limit($post->contenus) }}" />
          <meta property="og:url" content="{{ route('posts.show', $post) }}" />
          <meta property="og:image" content="{{ $post->imageUrl() ? $post->imageUrl() : asset('logo.png') }}" />
          <meta property="og:image:width" content="1200" />
          <meta property="og:image:height" content="630" />
          <meta property="article:author" content="{{ mb_strtoupper($post->users->name,'UTF-8') }}" />
          <meta property="article:published_time" content="{{ $post->created_at->toIso8601String() }}" />
          <meta property="article:modified_time" content="{{ $post->updated_at->toIso8601String() }}" />
          <meta name="twitter:card" content="summary_large_image" />
          <meta name="twitter:site" content="@Mascodeproduct" />
          <meta name="twitter:creator" content="{{ '@'.$post->users->name }}" />
          <meta name="twitter:title" content="{{ $post->titre }}" />
          <meta name="twitter:description" content="{{ Str::limit($post->contenus) }}" />
          <meta name="twitter:image" content="{{ $post->imageUrl() ? $post->imageUrl() : asset('logo.png') }}" />
          <meta name="apple-mobile-web-app-capable" content="yes">
          <meta name="apple-mobile-web-app-status-bar-style" content="black">
          <meta name="apple-mobile-web-app-title" content="Mas Code Product">
          <meta name="msapplication-TileImage" content="{{ asset('logo.png') }}">
          <meta name="msapplication-TileColor" content="#E11308">
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        @else
        @endif

        @if(request()->is('posts/'))
          <title>{{"Les Posts" }}</title>
          
        @else
        @endif
        @if(request()->is("nosactualite"))
          <title>@yield('titre','Nos Actualités')</title>
         
        @else
        @endif

        <title>@yield('titre','Fc Salvador')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
                
       
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/build/three.min.js"></script>
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
          html, body {
    height: 100%;
    overflow: visible !important;}

            /* Animation pour le texte */
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .animate-fadeIn {
                animation: fadeIn 1.5s ease-out;
            }
        </style>
@livewireStyles

    </head>
    @php
    $route = request()->route() ? request()->route()->getName() : 'route_inconnue';
  @endphp

<body class="bg-white dark:bg-gray-800   ">
    <!-- Header Sticky -->
    <nav class=" shadow-lg sticky top-0 z-50 dark:backdrop-blur-md dark:bg-opacity-70 bg-opacity-100 dark:bg-gray-900 bg-gray-100 ">

        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <!-- Logo -->

            <a href="{{route('index')}}" class="flex items-center space-x-3 rtl:space-x-reverse group">
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
                    <a href="{{ route('home') }}" class="block py-2 px-3 text-cyan-400 rounded hover:bg-gray-800/50 hover:text-cyan-300 transition-colors duration-300">Actualités</a>
                  </li>
                  
                  @if (str_contains($route, 'user'))
                  <li>
                    <a href="{ {route('user.newpost')}}" class="block py-2 px-3 text-cyan-400 rounded hover:bg-gray-800/50 hover:text-cyan-300 transition-colors duration-300">Calendrier</a>
                  </li>
                  @endif
                  
                  <li>
                    <a href="{ {route('user.accueil')}}" class="block py-2 px-3 text-cyan-400 rounded hover:bg-gray-800/50 hover:text-cyan-300 transition-colors duration-300">Résultats</a>
                  </li>
                  <li>
                    <a href="{{route('jouers.index')}}" class="block py-2 px-3 text-cyan-400 rounded hover:bg-gray-800/50 hover:text-cyan-300 transition-colors duration-300">Jouers</a>
                  </li>
                  <li>
                    <a href="{{ route('photos') }}" class="block py-2 px-3 text-cyan-400 rounded hover:bg-gray-800/50 hover:text-cyan-300 transition-colors duration-300">Photos</a>
                  </li>
                  <li>
                    <a href="{{route('calendrier-match.index')}}" class="block py-2 px-3 text-cyan-400 rounded hover:bg-gray-800/50 hover:text-cyan-300 transition-colors duration-300">Classement</a>
                  </li>
                  <li>
                    <a href="{{ route('palmares') }}" class="block py-2 px-3 text-cyan-400 rounded hover:bg-gray-800/50 hover:text-cyan-300 transition-colors duration-300">Palmares</a>
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
                            <a href="{{route('usersmoncompte.index')}}" class="block px-4 py-3 text-base hover:bg-gray-800/50 transition-colors duration-300">{{__("Mon Compte")}}</a> <!-- Padding et texte plus grands -->
                          </li>
                          @auth
                            @if (Auth::user()->role==0)
                            <li>
                              <a href="{{route('dashboard')}}" class="block px-4 py-3 text-base hover:bg-gray-800/50 transition-colors duration-300">{{__("Dashboard")}}</a> <!-- Padding et texte plus grands -->
                            </li>
                              
                            @endif
                          @endauth
          
                          
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

@yield("contenus")
                    
                   
                  
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
    
</html>
