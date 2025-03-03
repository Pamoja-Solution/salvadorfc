<x-app-layout>
<div class="container mx-auto px-4 my-6">
    <h1 class="text-2xl text-white font-bold mb-4">Calendrier des matchs</h1>
    @session('success')
        <div class="flex items-center p-4 mb-4 text-sm text-green-800 bg-green-50 rounded-lg dark:bg-gray-800 dark:text-green-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Message de succès!</span> {{ session('success') }}.
            </div>
        </div>
    @endsession
    <a href="{{ route('admin.calendrier-match.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Ajouter un match</a>
    <div class="mt-6">
        @foreach ($calendriers as $calendrier)
            <div class="bg-gray-800 text-white p-4 rounded-lg mb-4">
                <h2 class="text-xl font-semibold">{{ $calendrier->competition->nom }}</h2>
                <p>{{ $calendrier->equipe_domicile }} vs {{ $calendrier->equipe_exterieur }}</p>
                <p>{{ $calendrier->date_match }} à {{ $calendrier->heure_match }}</p>
                <p>Stade: {{ $calendrier->stade }}</p>
                <p>Statut: {{ $calendrier->statut }}</p>
                <div class="mt-2">
                    <a href="{{ route('admin.calendrier-match.edit', $calendrier->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Modifier</a>
                    <form action="{{ route('admin.calendrier-match.destroy', $calendrier->id) }}" method="POST" class="inline">
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
