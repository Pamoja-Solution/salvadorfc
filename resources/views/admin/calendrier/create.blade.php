<x-app-layout>
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    @section('titre', $calendrier->exists ? "Modifier cet évenement" : " Créer un Événement")
    <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
        <h1 class="text-2xl text-white font-bold my-4">{{ $calendrier->exists ? "Modifier cet évenement" : " Créer un Événement" }}</h1>
        <form id="blogForm" action="{{ route($calendrier->exists ? 'admin.calendrier.update': 'admin.calendrier.store', $calendrier) }}" method="POST" enctype="multipart/form-data">
           
            @csrf

            <!-- Titre -->
            <div class="mb-6">
                <label for="titre" class="block text-sm font-medium text-gray-200">Titre</label>
                <input type="text" name="titre" value="{{ old("titre", $calendrier->titre) }}" id="titre" class="mt-1 block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:ring-blue-500 focus:border-blue-500">
                @error("titre")
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-200">Description</label>
                <input type="hidden" name="description" id="description" value="{{ old("description", $calendrier->description) }}">
                <div class="mt-3 bg-white">
                    <div id="editor" class="bg-gray-700 text-white rounded-lg min-h-[300px]">
                    </div>
                </div>
                @error("description")
                                    <div class="p-2 mb-2 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-100 dark:text-red-400" role="alert">
                                        <span class="font-medium">Erreur alert!</span> {{ $message }}.
                                    </div>
                                @enderror

                
            </div>
            

            <!-- Dates (en deux colonnes) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Date de début -->
                <div>
                    <label for="date_debut" class="block text-sm font-medium text-gray-200">Date de début</label>
                    <input type="datetime-local" value="{{ old("date_debut", $calendrier->date_debut) }}" name="date_debut" id="date_debut" class="mt-1 block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:ring-blue-500 focus:border-blue-500" >
                    @error("date_debut")
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Date de fin -->
                <div>
                    <label for="date_fin" class="block text-sm font-medium text-gray-200">Date de fin</label>
                    <input type="datetime-local" value="{{ old("date_fin", $calendrier->date_fin) }}" name="date_fin" id="date_fin" class="mt-1 block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:ring-blue-500 focus:border-blue-500" >
                    @error("date_fin")
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Type d'événement -->
            <div class="mb-6">
                <label for="type_id" class="block text-sm font-medium text-gray-200">Type d'événement</label>
                <select name="type_id" id="type" class="mt-1 block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:ring-blue-500 focus:border-blue-500">
                    <option>**--**</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}" {{ $calendrier->type_id == $type->id ? 'selected' : '' }}>
                            {{ $type->nom }}
                        </option>
                    @endforeach
                </select>
                
                @error("type_id")
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Photo (en deux colonnes) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Zone de téléversement -->
                <div>
                    <label class="block text-sm font-medium text-gray-200">Photo (optionnelle)</label>
                    <div class="relative mt-1">
                        <input type="file" name="photo" id="fileUpload" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*">
                        <div class="bg-gray-700 rounded-lg p-6 text-center border-2 border-dashed border-gray-600 hover:border-blue-500 transition-colors">
                            <span class="text-gray-400">Glissez une photo ou cliquez pour sélectionner</span>
                        </div>
                    </div>
                    @error("photo")
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Aperçu de l'image -->
                <div class="h-48 bg-gray-700 rounded-lg overflow-hidden">
                    <img id="imageDiv" class="w-full h-full object-cover" />
                </div>
            </div>

            <!-- Bouton de soumission -->
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    {{ $calendrier->exists ? "Mettre à  Jours" : " Créer" }}
                </button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.0/dist/quill.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>
    
    <!-- Script pour l'aperçu de l'image -->
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
        placeholder: 'Entrer la description du jouer  ici ** Obligatoire **'
    });

    

    // Récupérer les anciennes données
    const oldContent = document.getElementById('description').value;
    if (oldContent) {
        quill.root.innerHTML = oldContent;
    }

    // Méthode pour soumettre le formulaire
    document.getElementById('blogForm').onsubmit = function() {
        var description = quill.root.innerHTML;
        document.getElementById('description').value = description;
        return true;
    };
</script>

</x-app-layout>