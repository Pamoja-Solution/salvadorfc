<x-app-layout>
    @php
        $posts = [
            'Gardien',
            'Défenseur central',
            'Défenseur latéral',
            'Milieu défensif',
            'Milieu offensif',
            'Attaquant',
            'Remplaçant',
        ];
    @endphp
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">{{ $jouers->exists ?'Modifier un jouer': "Nouveau Jouer" }}</h1>
    
            <form id="blogForm" action="{{ route($jouers->exists ? 'admin.jouers.update': 'admin.jouers.store', $jouers) }}" method="POST" enctype="multipart/form-data">
                @csrf
    
                <div class="bg-gray-800 text-white p-8 rounded-lg shadow-lg">
                    <h2 class="text-xl font-bold mb-6 text-gray-200">{{ $jouers->exists ? 'Modifier' : 'Créer' }} un Joueur</h2>
    
                    <!-- Deux colonnes pour les champs du formulaire -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Colonne 1 -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-100">Nom</label>
                                <input type="text" value="{{ old('nom', $jouers->nom) }}" name="nom" class="bg-gray-900 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                @error("nom")
                                    <div class="p-2 mb-2 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-100 dark:text-red-400" role="alert">
                                        <span class="font-medium">Erreur alert!</span> {{ $message }}.
                                    </div>
                                @enderror
                            </div>
    
                            <div>
                                <label class="block text-sm font-medium text-gray-100">Nationalité</label>
                                <input type="text" name="nationnalite" value="{{ old('nationnalite', $jouers->nationnalite) }}" class="bg-gray-900 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                @error("nationnalite")
                                    <div class="p-2 mb-2 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-100 dark:text-red-400" role="alert">
                                        <span class="font-medium">Erreur alert!</span> {{ $message }}.
                                    </div>
                                @enderror
                            </div>
    
                            <div>
                                <label class="block text-sm font-medium text-gray-100">Date de Naissance</label>
                                <input type="date" name="date_de_naissance" value="{{ old('date_de_naissance', $jouers->date_de_naissance) }}" class="bg-gray-900 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                @error("date_de_naissance")
                                    <div class="p-2 mb-2 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-100 dark:text-red-400" role="alert">
                                        <span class="font-medium">Erreur alert!</span> {{ $message }}.
                                    </div>
                                @enderror
                            </div>
    
                            <div>
                                <label class="block text-sm font-medium text-gray-100">Photo</label>
                                <input type="file" name="photo"  class="bg-gray-900 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                @error("photo")
                                    <div class="p-2 mb-2 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-100 dark:text-red-400" role="alert">
                                        <span class="font-medium">Erreur alert!</span> {{ $message }}.
                                    </div>
                                @enderror
                            </div>
    
                            <div>
                                <label class="block text-sm font-medium text-gray-100">Taille</label>
                                <input type="text" name="taille" value="{{ old('taille', $jouers->taille) }}" class="bg-gray-900 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                @error("taille")
                                    <div class="p-2 mb-2 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-100 dark:text-red-400" role="alert">
                                        <span class="font-medium">Erreur alert!</span> {{ $message }}.
                                    </div>
                                @enderror
                            </div>

                            
                            @if (!$jouers->exists)
                            <div class="">
                                <label class="block text-sm font-medium text-gray-100">Poste</label>
                                <select name="poste" class="bg-gray-900 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Sélectionner un poste</option>
                                    @foreach($posts as $post)
                                        <option value="{{ $post }}" {{ $jouers->exists && $post === $jouers->poste ? 'selected' : '' }}>
                                            {{ $post }}
                                        </option>
                                    @endforeach
                                </select>
                                @error("poste")
                                    <div class="p-2 mb-2 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-100 dark:text-red-400" role="alert">
                                        <span class="font-medium">Erreur alert!</span> {{ $message }}.
                                    </div>
                                @enderror
                            </div>
                            @endif
                        </div>
    
                        <!-- Colonne 2 -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-100">Poids</label>
                                <input type="text"  name="poids" value="{{ old('poids', $jouers->poids) }}" class="bg-gray-900 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                @error("poids")
                                    <div class="p-2 mb-2 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-100 dark:text-red-400" role="alert">
                                        <span class="font-medium">Erreur alert!</span> {{ $message }}.
                                    </div>
                                @enderror
                            </div>
    
                            <div>
                                <label class="block text-sm font-medium text-gray-100">Dorsale</label>
                                <input type="number" name="dorsale" value="{{ old('dorsale', $jouers->dorsale) }}" class="bg-gray-900 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                @error("dorsale")
                                    <div class="p-2 mb-2 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-100 dark:text-red-400" role="alert">
                                        <span class="font-medium">Erreur alert!</span> {{ $message }}.
                                    </div>
                                @enderror
                            </div>
    
                            <div>
                                <label class="block text-sm font-medium text-gray-100">But</label>
                                <input type="number" name="but" value="{{ old('but', $jouers->but) }}" class="bg-gray-900 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">

                                @error("but")
                                    <div class="p-2 mb-2 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-100 dark:text-red-400" role="alert">
                                        <span class="font-medium">Erreur alert!</span> {{ $message }}.
                                    </div>
                                @enderror
    

                            </div>
    
                            <div>
                                <label class="block text-sm font-medium text-gray-100">Passe</label>
                                <input type="number" name="passe" value="{{ old('passe', $jouers->passe) }}" class="bg-gray-900 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                @error("passe")
                                    <div class="p-2 mb-2 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-100 dark:text-red-400" role="alert">
                                        <span class="font-medium">Erreur alert!</span> {{ $message }}.
                                    </div>
                                @enderror
                            </div>
    
                            <div>
                                <label class="block text-sm font-medium text-gray-100">Matches</label>
                                <input type="number" name="matches" value="{{ old('matches', $jouers->matches) }}" class="bg-gray-900 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                @error("matches")
                                    <div class="p-2 mb-2 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-100 dark:text-red-400" role="alert">
                                        <span class="font-medium">Erreur alert!</span> {{ $message }}.
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
    
                    <!-- Champ Historique (pleine largeur) -->
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-100">Historique</label>
                        
                        <input type="hidden" name="historique" id="historique" value="{{ old('historique', $jouers->historique) }}">
                                
                        <!-- Editor Container -->
                        <div class="mt-3 bg-white">
                            <div id="editor" class="bg-gray-700 text-white rounded-lg min-h-[300px]">
                            </div>
                        </div>
                        @error("historique")
                                    <div class="p-2 mb-2 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-100 dark:text-red-400" role="alert">
                                        <span class="font-medium">Erreur alert!</span> {{ $message }}.
                                    </div>
                                @enderror
                    </div>
    
                    <!-- Boutons en bas du formulaire -->
                    <div class="flex justify-end mt-8 space-x-4">
                        <button type="button" wire:click="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                            Annuler
                        </button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            {{ $jouers->exists ? 'Mettre à jour' : 'Créer' }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    

<script src="https://cdn.jsdelivr.net/npm/quill@2.0.0/dist/quill.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>


<script>
    // Initialisez Quill avec le module de redimensionnement
    const quill = new Quill('#editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
                [{ 'list': 'ordered'}, { 'list': 'bullet' }, { 'list': 'check' }],
                ['link'],
                ['clean'],
            ],
            // Ajoutez le module de redimensionnement d'images
            imageResize: {
                modules: ['Resize', 'DisplaySize'] // Options disponibles
            }
        },
        placeholder: 'Entrer du l\'historique du jouer  ici ** Obligatoire **'
    });

    

    // Récupérer les anciennes données
    const oldContent = document.getElementById('historique').value;
    if (oldContent) {
        quill.root.innerHTML = oldContent;
    }

    // Méthode pour soumettre le formulaire
    document.getElementById('blogForm').onsubmit = function() {
        var historique = quill.root.innerHTML;
        document.getElementById('historique').value = historique;
        return true;
    };
</script>

<script>
	document.getElementById('fileUpload').addEventListener('change', function() {
		var reader = new FileReader();
		reader.onload = function(e) {
			document.getElementById('imageDiv').src = e.target.result;
		}
		reader.readAsDataURL(this.files[0]);
	});
	</script>
	<script>
	document.getElementById('fileUpload').addEventListener('change', function() {
		var reader = new FileReader();
		reader.onload = function(e) {
			var img = document.createElement('img');
			img.src = e.target.result;
			document.getElementById('imageDiv').appendChild(img);
		}
		reader.readAsDataURL(this.files[0]);
	});
	</script>
</x-app-layout>
