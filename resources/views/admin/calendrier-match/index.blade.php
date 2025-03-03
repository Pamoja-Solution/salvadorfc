<x-app-layout>
<div class="container mx-auto px-4 my-6">
    <h1 class="text-2xl text-white font-bold mb-4">Calendrier des matchs</h1>
    <a href="{{ route('admin.calendrier-match.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Ajouter un match</a>
    <div class="mt-6">
        @foreach ($calendriers as $calendrier)
            <div class="bg-gray-800 p-4 rounded-lg mb-4">
                <h2 class="text-xl font-semibold">{{ $calendrier->competition }}</h2>
                <p>{{ $calendrier->equipe_domicile }} vs {{ $calendrier->equipe_exterieur }}</p>
                <p>{{ $calendrier->date_match }} à {{ $calendrier->heure_match }}</p>
                <p>Stade: {{ $calendrier->stade }}</p>
                <p>Statut: {{ $calendrier->statut }}</p>
                <div class="mt-2">
                    <a href="{{ route('calendrier.edit', $calendrier->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Modifier</a>
                    <form action="{{ route('calendrier.destroy', $calendrier->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Supprimer</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
</x-app-layout>
