<x-app-layout>
    @section('titre', $competition->exists ?"Modifier - $competition->nom":'Creer une competition ' )
<div class="container mx-auto px-4 my-5 text-white">
    <h1 class="text-2xl  font-bold mb-4">{{ $competition->exists ? 'Modifier' : 'Ajouter' }} une Compétition</h1>
    <form action="{{ route($competition->exists ? 'admin.competitions.update': 'admin.competitions.store', $competition) }} " method="POST">
        @csrf
        @if (($competition->exists))
            @method('PUT')
        @endif
        <div class="mb-4">
            <label for="competition" class="block text-sm font-medium text-gray-300">Nom</label>
            <input type="text" name="nom" value="{{ old('nom', $competition->nom) }}" id="nom" value="{{ $competition->exists ? $competition->competition : old('competition') }}" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white">
            @error("nom")
                                    <div class="p-2 mb-2 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-100 dark:text-red-400" role="alert">
                                        <span class="font-medium">Erreur alert!</span> {{ $message }}.
                                    </div>
                                @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-300">Description</label>
            <textarea name="description" id="" rows="5" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white" >{{ old('description', $competition->description) }}</textarea>
            @error("description")
                                    <div class="p-2 mb-2 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-100 dark:text-red-400" role="alert">
                                        <span class="font-medium">Erreur alert!</span> {{ $message }}.
                                    </div>
                                @enderror
        </div>
        <!-- Ajoutez les autres champs du formulaire ici -->
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">{{ ($competition->exists) ? 'Mettre à jour' : 'Ajouter' }}</button>
    </form>
</div>
</x-app-layout>