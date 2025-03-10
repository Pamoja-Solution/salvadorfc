@section('titre','Éditer un Post')
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

<x-app-layout>
    <form id="blogForm" action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

            <div class="container mx-auto px-4 py-8">
                <div class="max-w-2xl mx-auto">
                    <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Editer l'article</h1>
            
                    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
            
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="titre">
                                Titre
                            </label>
                            <input type="text" name="titre" id="titre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-800 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('titre',$post->titre) }}" required>
                            @error("titre")
                                  <div class="p-4 mb-4 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                    <span class="font-medium">Erreur alert!</span> {{ $message }}.
                                  </div>
                                  @enderror
                        </div>
            
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="introduction">
                                Introduction
                            </label>
                            <textarea name="introduction" id="introduction" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-800 leading-tight focus:outline-none focus:shadow-outline" required>{{ old('introduction',$post->introduction) }}</textarea>
                            @error("introduction")
                                  <div class="p-4 mb-4 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                    <span class="font-medium">Erreur alert!</span> {{ $message }}.
                                  </div>
                                  @enderror
                        </div>
            
                        

                       
            
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="image">
                                Image
                            </label>
                            <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-800 leading-tight focus:outline-none focus:shadow-outline">
                            @error("image")
                                  <div class="p-4 mb-4 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                    <span class="font-medium">Erreur alert!</span> {{ $message }}.
                                  </div>
                                  @enderror
                        </div>
            
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="temps">
                                Temps de lecture (en minutes)
                            </label>
                            <input type="number" name="temps" id="temps" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-800 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('temps',$post->temps) }}" required>
                            @error("temps")
                                  <div class="p-4 mb-4 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                    <span class="font-medium">Erreur alert!</span> {{ $message }}.
                                  </div>
                                  @enderror
                        </div>
            
                        
            
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="categorie_id">
                                Catégorie
                            </label>
                            <select name="categorie_id" id="categorie_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-800 leading-tight focus:outline-none focus:shadow-outline" required>
                                @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}" @if(old('categorie_id') == $categorie->id || (isset($post) && $post->categorie && $post->categorie->id == $categorie->id))
                                        selected
                                    @endif>{{ $categorie->name }}</option>
                                @endforeach
                            </select>
                            @error("categorie_id")
                            <div class="p-4 mb-4 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                              <span class="font-medium">Erreur alert!</span> {{ $message }}.
                            </div>
                            @enderror
                        </div>

                        
            
                        <div class="mb-4">
                            <label class="flex items-center">
                                <input type="checkbox" name="status" value="1" class="form-checkbox dark:bg-gray-800 dark:border-gray-600" {{ $post->status == 1 ? 'checked' : '' }}                                >
                                <span class="ml-2 text-gray-700 dark:text-gray-300">Publier immédiatement</span>
                            </label>

                        </div>

            
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Modifier l'article
                            </button>
                            <a href="{{ route('admin.posts.index') }}" class="text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200">
                                Annuler
                            </a>
                        </div>
                    </form>






<hr class="mt-6" >


            <!-- Après le formulaire d'édition du post -->
<div class="mt-8">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl text-white font-bold">Sections</h2>
        <a href="{{ route('admin.sections.create', $post) }}" 
            class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Ajouter une section
        </a>
    </div>

    
</div>
                </div>
            </div>

                        </form>
  
                        
</x-app-layout>