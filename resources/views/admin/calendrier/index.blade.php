<x-app-layout>
    @section('titre', "Les Événements")
    <div class="container mx-auto px-4">
    <h1 class="text-2xl text-white font-bold my-4">Calendrier des événements</h1>
    <a href="{{ route('admin.calendrier.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Créer un événement</a>
    <div class="mt-6">
        @foreach ($events as $event)
            <div class="bg-gray-300 shadow-md rounded-lg p-4 mb-4">
                <h2 class="text-xl font-semibold">{{ $event->titre }}</h2>
                <p class="text-gray-600">{!! Str::limit($event->description, 500 )!!}</p>
                Début: {{ \Carbon\Carbon::parse($event->date_debut)->format('d/m/Y H:i') }}  
                <p class="text-gray-600">Fin: {{  \Carbon\Carbon::parse($event->date_fin)->format('d/m/Y H:i') }}</p>
                <p class="text-gray-600">Type: {{ ucfirst($event->type->nom) }}</p>
                <div id="countdown-{{ $event->id }}" class="text-lg font-bold text-blue-600"></div>
                <div class="relative group">
                    @if($event->photo)
                        <img src="{{ $event->imageUrl() }}" 
                             alt="{{ $event->titre }}" 
                             class="w-40 h-40 rounded-full object-cover border-4 border-blue-500/30 group-hover:border-blue-500 transition-all duration-300">
                    @else
                        <div class="w-40 h-40 rounded-full bg-gray-700 flex items-center justify-center text-4xl text-gray-400">
                            {{ strtoupper(substr($event->titre, 0, 2)) }}
                        </div>
                    @endif
                </div>
                <a href="{{ route('admin.calendrier.show', ["slug"=>$event->slug]) }}" class="text-blue-500">Voir plus</a>
            </div>
        @endforeach
    </div>
</div>

<script>
    @foreach ($events as $event)
        (function() {
            var countDownDate = new Date("{{ \Carbon\Carbon::parse($event->date_debut)->format('M d, Y H:i:s') }}").getTime();
            var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.getElementById("countdown-{{ $event->id }}").innerHTML = days + "j " + hours + "h "
                + minutes + "m " + seconds + "s ";
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("countdown-{{ $event->id }}").innerHTML = "Événement terminé";
                }
            }, 1000);
        })();
    @endforeach
</script>
</x-app-layout>
