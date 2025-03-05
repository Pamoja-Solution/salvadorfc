<x-app-layout>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Nouvel article</h1>
    
            <form id="blogForm" action="{{ route($posts->exists ? 'admin.posts.update': 'admin.posts.store', $posts) }}" method="POST" enctype="multipart/form-data">
                @csrf
    
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="titre">
                        Titre
                    </label>
                    <input type="text" name="titre" id="titre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-800 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('titre',$posts->titre) }}" required>
                    @error("titre")
                          <div class="p-4 mb-4 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-medium">Erreur alert!</span> {{ $message }}.
                          </div>
                          @enderror
                </div>
    
               
    
                
    
                
    
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="temps">
                        Temps de lecture (en minutes)
                    </label>
                    <input type="number" name="temps" id="temps" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-800 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('temps',$posts->temps) }}" required>
                    @error("temps")
                          <div class="p-4 mb-4 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-medium">Erreur alert!</span> {{ $message }}.
                          </div>
                          @enderror
                </div>
    
      
                <div class="mb-4">
                    <label for="categorie_id" 
                    @error('categorie_id')
                        class="block mb-2 text-sm font-medium text-red-700 dark:text-red-500"
                    @enderror
                    class="block mb-3 text-sm font-medium text-gray-800 dark:text-purple-200">Catégorie</label>
                    <select id="categorie_id" 
                            name="categorie_id"
                            @error('categorie_id')
                                class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500"
                            @enderror
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Sélectionner une catégorie</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                @if($posts->exists)
                                    {{ $category->id == $posts->categorie->id ? 'selected' : '' }}
                                @else
                                @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('categorie_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <label class="block text-sm font-medium text-gray-800 dark:text-purple-200">Image</label>

                <div class=" flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-start sm:space-y-0 sm:space-x-4">
                        <div class="mt-1  justify-center px-3 pt-3 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="fileUpload" class="relative cursor-pointer rounded-md font-medium text-blue-600 hover:text-blue-500">
                                        <span>Téléverser un fichier</span>
                                        <input id="fileUpload" name="image" type="file" class="sr-only" accept="image/*">
                                    </label>
                                </div>
                            </div>
                        </div>
                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                    <div id="imagePreview" class="mt-2">
                        @if($posts->image)
                            <img src="{{ $posts->imageurl() }}" 
                                 class="max-h-48 rounded-lg object-cover"
                                 alt="Preview"
								 id='imageDiv'>
                        @endif
                    </div>
					@if($posts->exists )
					
					@else
					<div class="col-md-6 img-c" >
						<img id='imageDiv' class="h-s100" style="width: 320px; height: 200px;"  />
					</div>
					@endif
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="contenus">
                        Contenu
                    </label>
                    <input type="hidden" name="contenus" id="contenus" value="{{ old('contenus', $posts->contenus) }}">
                            
                    <!-- Editor Container -->
                    <div class="mt-3 bg-white">
                        <div id="editor" class="bg-gray-700 text-white rounded-lg min-h-[300px]">
                        </div>
                    </div>
                    @error("contenus")
                        <div class="p-4 mb-4 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-medium">Erreur alert!</span> {{ $message }}.
                        </div>
                    @enderror
                </div>
    
                @if (!$posts->exists)
                <div class="mb-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="status" value="0" class="form-checkbox dark:bg-gray-800 dark:border-gray-600" {{ old('status') ? '' : 'checked' }}>
                        <span class="ml-2 text-gray-700 dark:text-gray-300">Publier immédiatement</span>
                    </label>
                </div>
                @endif
    
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Créer l'article
                    </button>
                    <a href="{{ route('admin.posts.index') }}" class="text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200">
                        Annuler
                    </a>
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

    // Gestionnaire d'images pour l'upload
    quill.getModule('toolbar').addHandler('image', function() {
        let input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.click();

        input.onchange = async function() {
            let file = input.files[0];
            let formData = new FormData();
            formData.append("image", file);

            try {
                let response = await fetch("{{ route('upload.image') }}", {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                });

                let data = await response.json();
                if (data.success) {
                    let range = quill.getSelection();
                    quill.insertEmbed(range.index, 'image', data.url);
                }
            } catch (error) {
                console.error("Erreur lors de l'upload", error);
            }
        };
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
