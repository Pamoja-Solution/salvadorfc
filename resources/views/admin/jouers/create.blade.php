<x-app-layout>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Nouveau Jouer</h1>
    
            <form id="blogForm" action="{{ route($jouers->exists ? 'admin.jouers.update': 'admin.jouers.store', $jouers) }}" method="POST" enctype="multipart/form-data">
                @csrf
    
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <h2 class="text-xl font-bold mb-6 text-gray-800">{{ $jouers ? 'Modifier' : 'Créer' }} un Joueur</h2>
    
                    <!-- Deux colonnes pour les champs du formulaire -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Colonne 1 -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nom</label>
                                <input type="text" wire:model="nom" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
    
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nationalité</label>
                                <input type="text" wire:model="nationnalite" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
    
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Date de Naissance</label>
                                <input type="date" wire:model="date_de_naissance" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
    
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Photo</label>
                                <input type="file" wire:model="photo" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
    
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Taille</label>
                                <input type="text" wire:model="taille" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
    
                        <!-- Colonne 2 -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Poids</label>
                                <input type="text" wire:model="poids" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
    
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Dorsale</label>
                                <input type="text" wire:model="dorsale" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
    
                            <div>
                                <label class="block text-sm font-medium text-gray-700">But</label>
                                <input type="text" wire:model="but" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
    
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Passe</label>
                                <input type="text" wire:model="passe" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
    
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Matches</label>
                                <input type="text" wire:model="matches" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                    </div>
    
                    <!-- Champ Historique (pleine largeur) -->
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700">Historique</label>
                        <textarea wire:model="historique" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>
    
                    <!-- Boutons en bas du formulaire -->
                    <div class="flex justify-end mt-8 space-x-4">
                        <button type="button" wire:click="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                            Annuler
                        </button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            {{ $jouers ? 'Mettre à jour' : 'Créer' }}
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
                ['link', 'image', 'code-block'],
                ['clean'],
                [{ 'font': [] }],
                [{ 'align': [] }],
            ],
            // Ajoutez le module de redimensionnement d'images
            imageResize: {
                modules: ['Resize', 'DisplaySize'] // Options disponibles
            }
        },
        placeholder: 'Entrer du contenu plus stylé ici ** Obligatoire **'
    });

    

    // Récupérer les anciennes données
    const oldContent = document.getElementById('contenus').value;
    if (oldContent) {
        quill.root.innerHTML = oldContent;
    }

    // Méthode pour soumettre le formulaire
    document.getElementById('blogForm').onsubmit = function() {
        var contenus = quill.root.innerHTML;
        document.getElementById('contenus').value = contenus;
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
