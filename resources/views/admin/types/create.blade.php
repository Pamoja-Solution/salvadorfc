<x-app-layout>
   @section('titre', $types->exists ? "Modifier ce Type d\'évènement" : " Créer un Type d\'évènement")
    <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
        <h1 class="text-2xl text-white font-bold my-4">{{ $types->exists ? "Modifier ce Type d\'évènement" : " Créer un Type d'évènement" }}</h1>
        <form id="blogForm" action="{{ route($types->exists ? 'admin.types.update': 'admin.types.store', $types) }}"  method="POST" >
            @if($types->exists)
            @method('PATCH')
        @endif
            @csrf

            <!-- nom -->
            <div class="mb-6">
                <label for="nom" class="block text-sm font-medium text-gray-200">Nom</label>
                <input type="text" name="nom" value="{{ old("nom", $types->nom) }}" id="nom" class="mt-1 block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:ring-blue-500 focus:border-blue-500">
                @error("nom")
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            
            <!-- Bouton de soumission -->
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    {{ $types->exists ? "Mettre à  Jours" : " Créer" }}
                </button>
            </div>
        </form>
    </div>

  

</x-app-layout>