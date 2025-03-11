<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('titre','Fc Salvador')</title>

         <link rel="icon" sizes="32x32" type="image/png" href="{{ asset('favicon.ico') }}" />
        <link rel="icon" sizes="16x16" type="image/png" href="{{ asset('favicon.ico') }}" />

        
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

@livewireStyles

    </head>
   

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
            
            
          
              <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium rounded-lg md:space-x-4 rtl:space-x-reverse md:flex-row md:mt-0">
                    
                  <li>
                    <a href="{{ route('home') }}" class="block py-2 px-3 text-cyan-400 rounded hover:bg-gray-800/50 hover:text-cyan-300 transition-colors duration-300">Actualités</a>
                  </li>
                  
                </ul>
              </div>
        </div>
    </nav>
@yield("contenus")
<footer>
    <div class="m-6 mt-20 " id="newsletter-container">
      <div class="grid grid-cols-1 lg:grid-cols-5">
          <div class="lg:col-span-3 p-8 lg:p-12">
              <h3 class="text-2xl md:text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-4">Restez informé !</h3>
              <p class="text-gray-800 dark:text-gray-300 mb-6">Inscrivez-vous à notre newsletter pour ne rien manquer des dernières actualités, résultats et événements du FC Salvador.</p>
              <form class="space-y-4">
                  <div class="flex flex-col sm:flex-row gap-4">
                      <input type="text" placeholder="Votre nom" class="dark:bg-gray-700/50 dark:text-white border border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 w-full">
                      <input type="email" placeholder="Votre email" class="dark:bg-gray-700/50 dark:text-white border border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 w-full">
                  </div>
                  <div class="flex items-center">
                      <input type="checkbox" id="newsletter-consent" class="rounded text-purple-500 focus:ring-purple-500">
                      <label for="newsletter-consent" class="ml-2 dark:text-gray-300 text-gray-800 text-sm">J'accepte de recevoir les actualités du FC Salvador par email</label>
                  </div>
                  <button type="submit" class="px-6 py-3 bg-gradient-to-r from-purple-500 to-blue-500 text-white font-semibold rounded-lg shadow-lg transform transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 w-full sm:w-auto">
                      S'abonner
                  </button>
              </form>
          </div>
          <div class="lg:col-span-2 hidden lg:block relative">
              <img src="{{ asset('img/1740169797146.jpg') }}" alt="Newsletter" class="absolute inset-0 h-full w-full object-cover">
              <div class="absolute inset-0 bg-gradient-to-r from-gray-300 dark:bg-gradient-to-r dark:from-gray-900 to-transparent"></div>
          </div>
      </div>
    </div>
        <footer class="bg-gradient-to-r from-blue-900 to-purple-900 py-6">
            <div class="container mx-auto text-center">
                <p class="dark:text-gray-300 text-gray-200">&copy; {{ date('Y') }} Club Name. Tous droits réservés.</p>
                    </div>
        </footer>
</footer>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>
