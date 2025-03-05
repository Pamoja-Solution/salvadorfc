@include("components.layouts.app")
<link
  rel="stylesheet"
  href="{{asset('fancybox.css')}}"
/>



<div class="max-w-4xl mx-auto my-8">
    <div class="  dark:bg-gradient-to-br dark:from-gray-900 dark:to-gray-800 dark:text-white rounded-xl shadow-2xl overflow-hidden">
        <!-- Header avec image de couverture et overlay -->
        <div class="relative">
            @if($calendrier->photo)
                <div class="h-64 md:h-80 overflow-hidden">
                        <img data-fancybox src="{{ asset('storage/' . $calendrier->photo) }}" 
                            class="w-full h-full object-cover transform hover:scale-105 transition duration-500" 
                            alt="{{ $calendrier->titre }}">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent opacity-70 pointer-events-none"></div>

                </div>
                <p class="text-sm m-2">Appuyez sur l'image pour la visualiser</p>
            @else
                <div class="h-40 bg-gradient-to-r from-blue-600 to-purple-600"></div>
            @endif

            
            <!-- Badge de type -->
            @if($calendrier->type)
                <div class="absolute top-4 right-4">
                    <span class="px-4 py-1 bg-blue-600 text-white text-sm font-bold rounded-full shadow-lg">
                        {{ $calendrier->type->nom }}
                    </span>
                </div>
            @endif
        </div>
        
        <div class="px-6 py-8 md:px-10">
            <!-- Titre et dates -->
            <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                <h1 class="text-3xl md:text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-500">
                    {{ $calendrier->titre }}
                </h1>
                <div class="mt-3 md:mt-0 flex items-center space-x-2 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <p>{{ \Carbon\Carbon::parse($calendrier->date_debut)->translatedFormat('d M Y') }}
                     <span class="px-2">→</span> 
                     {{ \Carbon\Carbon::parse($calendrier->date_fin)->translatedFormat('d M Y') }}</p>
                </div>
            </div>
            
            <!-- Compte à rebours -->
            <div class="mt-8 p-5 bg-gradient-to-r from-gray-900/40 to-green-800/40 dark:bg-gradient-to-r dark:from-blue-900/40 dark:to-indigo-900/40 rounded-xl border border-blue-800/50 backdrop-blur-sm">
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <div class="flex items-center mb-3 md:mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-gray-900 dark:text-blue-300 font-medium">Compte à rebours:</span>
                    </div>
                    <div id="countdown-wrapper" class="flex space-x-3 justify-center w-full md:w-auto">
                        <div class="flex flex-col items-center">
                            <span id="days" class="text-2xl font-bold text-white">00</span>
                            <span class="text-xs text-gray-900  dark:text-blue-300">Jours</span>
                        </div>
                        <div class="text-xl font-bold text-gray-500 self-start mt-1">:</div>
                        <div class="flex flex-col items-center">
                            <span id="hours" class="text-2xl font-bold text-white">00</span>
                            <span class="text-xs text-gray-900  dark:text-blue-300">Heures</span>
                        </div>
                        <div class="text-xl font-bold text-gray-500 self-start mt-1">:</div>
                        <div class="flex flex-col items-center">
                            <span id="minutes" class="text-2xl font-bold text-white">00</span>
                            <span class="text-xs text-gray-900  dark:text-blue-300">Minutes</span>
                        </div>
                        <div class="text-xl font-bold text-gray-500 self-start mt-1">:</div>
                        <div class="flex flex-col items-center">
                            <span id="seconds" class="text-2xl font-bold text-white">00</span>
                            <span class="text-xs text-gray-900  dark:text-blue-300">Secondes</span>
                        </div>
                    </div>
                </div>
                <div id="event-status" class="hidden text-center mt-3 font-semibold text-green-400"></div>
            </div>
            
            <!-- Lieu (si disponible) -->
            @if(isset($calendrier->lieu) && $calendrier->lieu)
            <div class="mt-6 flex items-center text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>{{ $calendrier->lieu }}</span>
            </div>
            @endif
            
            <!-- Description -->
            <div class="mt-8">
                <h2 class="text-xl font-semibold dark:text-blue-300 text-blue-900 mb-3">À propos de cet événement</h2>
                <div class="prose prose-lg prose-invert max-w-none dark:text-gray-300 text-gray-800 leading-relaxed">
                    {!! $calendrier->description !!}
                </div>
            </div>
            
            <!-- Boutons d'action -->
            <div class="mt-10 flex flex-wrap gap-4">
                <a href="{{ route('home') }}" 
                   class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white font-medium rounded-lg shadow-lg hover:shadow-xl transition duration-200 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Retour à l'accueil
                </a>
                
               
            </div>
        </div>
    </div>
</div>
<script src="{{asset('fancybox.umd.js')}}"></script>

<script>
        Fancybox.bind("[data-fancybox]",{
            trapFocus: true,
    autoFocus: true,
    dragToClose: false,
        });
</script>
<script>
    // Initialisation de Fancybox
  


    // Compte à rebours amélioré
    const countDownDate = new Date("{{ \Carbon\Carbon::parse($calendrier->date_debut)->format('M d, Y H:i:s') }}").getTime();
    const eventEndDate = new Date("{{ \Carbon\Carbon::parse($calendrier->date_fin)->format('M d, Y H:i:s') }}").getTime();
    const now = new Date().getTime();
    
    const daysEl = document.getElementById("days");
    const hoursEl = document.getElementById("hours");
    const minutesEl = document.getElementById("minutes");
    const secondsEl = document.getElementById("seconds");
    const countdownWrapper = document.getElementById("countdown-wrapper");
    const eventStatus = document.getElementById("event-status");
    
    // Si l'événement est déjà terminé
    if (now > eventEndDate) {
        countdownWrapper.classList.add("hidden");
        eventStatus.classList.remove("hidden");
        eventStatus.innerHTML = "✓ Cet événement est terminé";
    } 
    // Si l'événement est en cours
    else if (now > countDownDate && now < eventEndDate) {
        countdownWrapper.classList.add("hidden");
        eventStatus.classList.remove("hidden");
        eventStatus.innerHTML = "✓ Cet événement est en cours";
    } 
    // Sinon, afficher le compte à rebours
    else {
        function updateCountdown() {
            const currentTime = new Date().getTime();
            const distance = countDownDate - currentTime;
            
            if (distance < 0) {
                countdownWrapper.classList.add("hidden");
                eventStatus.classList.remove("hidden");
                eventStatus.innerHTML = "✓ L'événement vient de commencer!";
                return;
            }
            
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            daysEl.innerHTML = days.toString().padStart(2, '0');
            hoursEl.innerHTML = hours.toString().padStart(2, '0');
            minutesEl.innerHTML = minutes.toString().padStart(2, '0');
            secondsEl.innerHTML = seconds.toString().padStart(2, '0');
        }
        
        // Mise à jour initiale
        updateCountdown();
        
        // Mise à jour toutes les secondes
        setInterval(updateCountdown, 1000);
    }
</script>
