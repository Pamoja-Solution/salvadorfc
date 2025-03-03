<x-app-layout>
    @section('titre','Creer ')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">{{ isset($calendrier) ? 'Modifier' : 'Ajouter' }} un match</h1>
    <form action="{{ isset($calendrier) ? route('calendrier.update', $calendrier->id) : route('calendrier.store') }}" method="POST">
        @csrf
        @if (isset($calendrier))
            @method('PUT')
        @endif
        <div class="mb-4">
            <label for="competition" class="block text-sm font-medium text-gray-300">Compétition</label>
            <input type="text" name="competition" id="competition" value="{{ isset($calendrier) ? $calendrier->competition : old('competition') }}" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white">
        </div>
        <!-- Ajoutez les autres champs du formulaire ici -->
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">{{ isset($calendrier) ? 'Mettre à jour' : 'Ajouter' }}</button>
    </form>
</div>
</x-app-layout>