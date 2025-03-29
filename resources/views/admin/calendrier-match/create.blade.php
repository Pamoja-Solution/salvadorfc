<x-app-layout>
    @section('titre', $match->exists ? 'Modifier un match' : 'Créer un match')

    <div class="max-w-2xl mx-auto mt-6 mb-10 bg-gray-800 text-white p-6 rounded-lg shadow-lg border border-gray-700">
        <h2 class="text-2xl font-bold text-center text-purple-400 mb-6">
            {{ $match->exists ? 'Modifier le match' : 'Ajouter un nouveau match' }}
        </h2>

        @if ($errors->any())
        <div class="mb-6 p-4 bg-red-900/20 border border-red-500 rounded-lg">
            <h3 class="text-red-400 font-medium mb-2">Erreurs dans le formulaire :</h3>
            <ul class="list-disc list-inside text-red-300 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="{{ route($match->exists ? 'admin.calendrier-match.update' : 'admin.calendrier-match.store', $match) }}" method="POST" class="space-y-6">
            @csrf
            @if($match->exists)
                @method('PUT')
            @endif

            <!-- Section Compétition et Journée -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Compétition -->
                <div class="space-y-2">
                    <label for="competition_id" class="block text-sm font-medium text-gray-300">Compétition *</label>
                    <select name="competition_id" id="competition_id" 
                            class="w-full p-3 rounded bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition
                                   @error('competition_id') border-red-500 @enderror">
                        <option value="">Sélectionnez une compétition</option>
                        @foreach ($competition as $com)
                            <option value="{{ $com->id }}" 
                                @selected(old('competition_id', $match->competition_id) == $com->id)>
                                {{ $com->nom }}
                            </option>
                        @endforeach
                    </select>
                    @error('competition_id')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Journée -->
                <div class="space-y-2">
                    <label for="journee" class="block text-sm font-medium text-gray-300">Journée</label>
                    <input type="text" name="journee" id="journee" 
                           class="w-full p-3 rounded bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition
                                  @error('journee') border-red-500 @enderror"
                           value="{{ old('journee', $match->journee) }}"
                           placeholder="Ex: J12, Quart, Demi">
                    @error('journee')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Section Date et Heure -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Date du match -->
                <div class="space-y-2">
                    <label for="date_match" class="block text-sm font-medium text-gray-300">Date du match *</label>
                    <input type="date" name="date_match" id="date_match" 
                           class="w-full p-3 rounded bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition
                                  @error('date_match') border-red-500 @enderror"
                           value="{{ old('date_match', $match->date_match?->format('Y-m-d')) }}"
                           min="{{ now()->format('Y-m-d') }}">
                    @error('date_match')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Heure du match -->
                <div class="space-y-2">
                    <label for="heure_match" class="block text-sm font-medium text-gray-300">Heure du match *</label>
                    <input type="time" name="heure_match" id="heure_match" 
                           class="w-full p-3 rounded bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition
                                  @error('heure_match') border-red-500 @enderror"
                           value="{{ old('heure_match', $match->heure_match?->format('H:i')) }}">
                    @error('heure_match')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Section Adversaire et Stade -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Adversaire -->
                <div class="space-y-2">
                    <label for="adversaire" class="block text-sm font-medium text-gray-300">Adversaire *</label>
                    <input type="text" name="adversaire" id="adversaire" 
                           class="w-full p-3 rounded bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition
                                  @error('adversaire') border-red-500 @enderror"
                           value="{{ old('adversaire', $match->adversaire) }}"
                           placeholder="Nom de l'équipe adverse">
                    @error('adversaire')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Stade -->
                <div class="space-y-2">
                    <label for="stade" class="block text-sm font-medium text-gray-300">Stade</label>
                    <input type="text" name="stade" id="stade" 
                           class="w-full p-3 rounded bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition
                                  @error('stade') border-red-500 @enderror"
                           value="{{ old('stade', $match->stade) }}"
                           placeholder="Nom du stade">
                    @error('stade')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Statut -->
            <div class="space-y-2">
                <label for="statut" class="block text-sm font-medium text-gray-300">Statut *</label>
                <select name="statut" id="statut" 
                        class="w-full p-3 rounded bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition
                               @error('statut') border-red-500 @enderror">
                    <option value="domicile" @selected(old('statut', $match->statut) == 'domicile')>Domicile</option>
                    <option value="exterieur" @selected(old('statut', $match->statut) == 'exterieur')>Extérieur</option>
                </select>
                @error('statut')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            

            <!-- Boutons -->
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-4">
                <a href="{{ route('admin.calendrier-match.index') }}" 
                   class="w-full sm:w-auto px-6 py-3 text-center text-gray-300 hover:text-white border border-gray-600 hover:bg-gray-700 rounded-lg transition">
                    Annuler
                </a>
                <button type="submit" 
                        class="w-full sm:w-auto px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white font-medium rounded-lg shadow-md transition-all">
                    {{ $match->exists ? 'Mettre à jour' : 'Créer le match' }}
                </button>
            </div>
        </form>
    </div>

    @push('scripts')
    <script>
        // Validation côté client pour les dates futures
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('date_match');
            if (dateInput) {
                dateInput.addEventListener('change', function() {
                    const selectedDate = new Date(this.value);
                    const today = new Date();
                    today.setHours(0, 0, 0, 0);
                    
                    if (selectedDate < today) {
                        alert('La date du match ne peut pas être dans le passé');
                        this.value = '';
                    }
                });
            }
        });
    </script>
    @endpush
</x-app-layout>