<x-app-layout>
    @section('titre','Creer ')
<div class="max-w-2xl mx-auto mt-10 bg-gray-900 text-white p-8 rounded-lg shadow-lg">
    <h2 class="text-3xl font-bold text-center text-purple-400 mb-6">Ajouter un Match</h2>

    <form action="{{ route($match->exists ? 'admin.calendrier-match.update': 'admin.calendrier-match.store', $match) }} " method="POST">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Compétition -->
            <div>
                <label class="block text-sm font-medium">Compétition</label>

                <select name="competition_id" class="w-full p-3 rounded bg-gray-800 border border-gray-700 focus:ring focus:ring-purple-500">
                <option value="">Choisir une compétition</option>
                @foreach ($competition as $com )
                <option value="{{ $com->id }}" @if ($match->exists)
                    {{ $com->id === $match->competition->id ? 'selected' : '' }}
                    
                @endif >{{ $com->nom }}</option>
                    
                @endforeach
                </select>
  
                @error('competition_id') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Journée -->
            <div>
                <label class="block text-sm font-medium">Journée</label>
                <input type="text" name="journee" class="w-full p-3 rounded bg-gray-800 border border-gray-700 focus:ring focus:ring-purple-500" value="{{ old('journee',$match->journee) }}" >
                @error('journee') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
            <!-- Date du match -->
            <div>
                <label class="block text-sm font-medium">Date du Match</label>
                <input type="date" name="date_match" class="w-full p-3 rounded bg-gray-800 border border-gray-700 focus:ring focus:ring-purple-500" value="{{ old('date_match',$match->date_match) }}" >
                @error('date_match') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Heure du match -->
            <div>
                <label class="block text-sm font-medium">Heure du Match</label>
                <input type="time" name="heure_match" class="w-full p-3 rounded bg-gray-800 border border-gray-700 focus:ring focus:ring-purple-500" value="{{ old('heure_match',$match->heure_match) }}" >
                @error('heure_match') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
            <!-- Équipe Domicile -->
            <div>
                <label class="block text-sm font-medium">Adversaire</label>
                <input type="text" name="adversaire" class="w-full p-3 rounded bg-gray-800 border border-gray-700 focus:ring focus:ring-purple-500" value="{{ old('adversaire',$match->adversaire) }}" >
                @error('adversaire') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Équipe Extérieur -->
            <div>
               <!-- Stade -->
            <label class="block text-sm font-medium">Stade</label>
            <input type="text" name="stade" class="w-full p-3 rounded bg-gray-800 border border-gray-700 focus:ring focus:ring-purple-500" value="{{ old('stade',$match->stade) }}" >
            @error('stade') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
        </div>
        </div>

        <div class="mt-4">
             </div>

        <div class="mt-4">
            <!-- Statut (domicile / extérieur) -->
            <label class="block text-sm font-medium">Statut</label>
            <select name="statut" class="w-full p-3 rounded bg-gray-800 border border-gray-700 focus:ring focus:ring-purple-500">
                <option value="domicile" {{ old('statut',$match->statut) == 'domicile' ? 'selected' : '' }}>Domicile</option>
                <option value="exterieur" {{ old('statut',$match->statut) == 'exterieur' ? 'selected' : '' }}>Extérieur</option>
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