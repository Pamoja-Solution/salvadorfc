<x-app-layout>
    @section('titre','Creer ')
@dd($competition)
<div class="max-w-2xl mx-auto mt-10 bg-gray-900 text-white p-8 rounded-lg shadow-lg">
    <h2 class="text-3xl font-bold text-center text-purple-400 mb-6">Ajouter un Match</h2>

    <form action="{{ route($match->exists ? 'admin.calendrier-match.update': 'admin.calendrier-match.store', $match) }} " method="POST">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Compétition -->
            <div>
                <label class="block text-sm font-medium">Compétition</label>
                <input type="text" name="competition" class="w-full p-3 rounded bg-gray-800 border border-gray-700 focus:ring focus:ring-purple-500" value="{{ old('competition') }}" required>
                @error('competition') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Journée -->
            <div>
                <label class="block text-sm font-medium">Journée</label>
                <input type="text" name="journee" class="w-full p-3 rounded bg-gray-800 border border-gray-700 focus:ring focus:ring-purple-500" value="{{ old('journee') }}" required>
                @error('journee') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
            <!-- Date du match -->
            <div>
                <label class="block text-sm font-medium">Date du Match</label>
                <input type="date" name="date_match" class="w-full p-3 rounded bg-gray-800 border border-gray-700 focus:ring focus:ring-purple-500" value="{{ old('date_match') }}" required>
                @error('date_match') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Heure du match -->
            <div>
                <label class="block text-sm font-medium">Heure du Match</label>
                <input type="time" name="heure_match" class="w-full p-3 rounded bg-gray-800 border border-gray-700 focus:ring focus:ring-purple-500" value="{{ old('heure_match') }}" required>
                @error('heure_match') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
            <!-- Équipe Domicile -->
            <div>
                <label class="block text-sm font-medium">Équipe Domicile</label>
                <input type="text" name="equipe_domicile" class="w-full p-3 rounded bg-gray-800 border border-gray-700 focus:ring focus:ring-purple-500" value="{{ old('equipe_domicile') }}" required>
                @error('equipe_domicile') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Équipe Extérieur -->
            <div>
                <label class="block text-sm font-medium">Équipe Extérieure</label>
                <input type="text" name="equipe_exterieur" class="w-full p-3 rounded bg-gray-800 border border-gray-700 focus:ring focus:ring-purple-500" value="{{ old('equipe_exterieur') }}" required>
                @error('equipe_exterieur') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="mt-4">
            <!-- Stade -->
            <label class="block text-sm font-medium">Stade</label>
            <input type="text" name="stade" class="w-full p-3 rounded bg-gray-800 border border-gray-700 focus:ring focus:ring-purple-500" value="{{ old('stade') }}" required>
            @error('stade') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mt-4">
            <!-- Statut (domicile / extérieur) -->
            <label class="block text-sm font-medium">Statut</label>
            <select name="statut" class="w-full p-3 rounded bg-gray-800 border border-gray-700 focus:ring focus:ring-purple-500">
                <option value="domicile" {{ old('statut') == 'domicile' ? 'selected' : '' }}>Domicile</option>
                <option value="exterieur" {{ old('statut') == 'exterieur' ? 'selected' : '' }}>Extérieur</option>
            </select>
            @error('statut') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Bouton de soumission -->
        <div class="mt-6 flex justify-center">
            <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition-all">
                Ajouter le Match
            </button>
        </div>
    </form>
</div>

</x-app-layout>