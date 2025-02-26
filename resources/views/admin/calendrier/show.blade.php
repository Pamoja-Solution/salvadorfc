<x-app-layout>
    @section('titre', Str::limit($calendrier->titre, 10))

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $calendrier->titre }}</h1>
            <div class="relative group">
                @if($calendrier->photo)
                    <img src="{{ $calendrier->imageUrl() }}" 
                         alt="{{ $calendrier->titre }}" 
                         class="w-80 h-80 rounded-full object-cover border-4 border-blue-500/30 group-hover:border-blue-500 transition-all duration-300">
                @else
                    <div class="w-80 h-80 rounded-full bg-gray-700 flex items-center justify-center text-4xl text-gray-400">
                        {{ strtoupper(substr($calendrier->titre, 0, 2)) }}
                    </div>
                @endif
            </div>  
            <p class="text-gray-600 text-lg mb-4">{{ $calendrier->description }}</p>

            <div class="grid grid-cols-2 gap-4 bg-gray-100 p-4 rounded-lg">
                <p class="text-gray-700"><span class="font-semibold">📅 Début :</span> {{ \Carbon\Carbon::parse($calendrier->date_debut)->format('d/m/Y H:i') }}</p>
                <p class="text-gray-700"><span class="font-semibold">⏳ Fin :</span> {{ \Carbon\Carbon::parse($calendrier->date_fin)->format('d/m/Y H:i') }}</p>
                <p class="text-gray-700 col-span-2"><span class="font-semibold">🏷️ Type :</span> {{ ucfirst($calendrier->type->nom) }}</p>
            </div>

            <!-- Compte à rebours -->
            <div class="mt-6 p-4 text-center bg-blue-100 text-blue-700 font-semibold text-lg rounded-lg">
                ⏳ Début dans : <span id="countdown" class="text-blue-600 text-xl"></span>
            </div>

            <div class="flex gap-6 ">
                <!-- Bouton Retour -->
            <div class="mt-6 text-center">
                <a href="{{ route('admin.calendrier.index') }}" class="px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 transition duration-300">
                    ⬅️ Retour à la liste
                </a>
            </div>

            <!-- Bouton Retour -->
            <div class="mt-6 text-center">
                <a href="{{ route('admin.calendrier.edit',["calendrier"=>$calendrier]) }}" class="px-6 flex py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 transition duration-300">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m11.5 11.5 2.071 1.994M4 10h5m11 0h-1.5M12 7V4M7 7V4m10 3V4m-7 13H8v-2l5.227-5.292a1.46 1.46 0 0 1 2.065 2.065L10 17Zm-5 3h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z"/>
                      </svg>
                      
                    Modifier
                </a>
            </div>
            <form action="{{ route('admin.calendrier.destroy', $calendrier) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                
                <div class="mt-6 text-center">
                    <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')"  class="px-6 flex py-2 bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-red-600 transition duration-300">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M20 10H4v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8ZM9 13v-1h6v1a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                            <path d="M2 6a2 2 0 0 1 2-2h16a2 2 0 1 1 0 4H4a2 2 0 0 1-2-2Z"/>
                          </svg>
                          
                        Supprimer
                    </button>
                </div>
            </form>
            
            
              
            </div>
        </div>
    </div>

    <script>
        var countDownDate = new Date("{{ \Carbon\Carbon::parse($calendrier->date_debut)->format('M d, Y H:i:s') }}").getTime();
        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            document.getElementById("countdown").innerHTML = days + "j " + hours + "h " + minutes + "m " + seconds + "s";
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown").innerHTML = "✅ Événement terminé";
            }
        }, 1000);
    </script>
    <script>
        function confirmDelete(id, name) {
        const confirmed = confirm(`Êtes-vous sûr de vouloir supprimer l'utilisateur ${name} ?`);
        if (confirmed) {
            document.getElementById(`delete-form-${id}`).submit();
        }
    }
    </script>
</x-app-layout>
