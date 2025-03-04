<!-- resources/views/post/show.blade.php -->
@include("components.layouts.app")
<div class="container mx-auto px-4 py-8">
        <!-- Affichage du post -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
            <!-- Titre du post -->
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">{{ $post->titre }}</h1>

            <!-- Métadonnées du post (catégorie, temps de lecture, etc.) -->
            <div class="flex items-center space-x-4 text-sm text-gray-500 dark:text-gray-400 mb-6">
                <span class="bg-blue-100 dark:bg-blue-800 text-blue-800 dark:text-blue-200 px-2 py-1 rounded">
                    Catégorie : {{ $post->categorie_id }}
                </span>
                <span class="bg-green-100 dark:bg-green-800 text-green-800 dark:text-green-200 px-2 py-1 rounded">
                    Temps de lecture : {{ $post->temps }} min
                </span>
                <span class="bg-purple-100 dark:bg-purple-800 text-purple-800 dark:text-purple-200 px-2 py-1 rounded">
                    Publié le : {{ $post->created_at->format('d/m/Y') }}
                </span>
            </div>

            <!-- Contenu du post -->
            <div class="prose dark:prose-invert max-w-none">
                {!! nl2br(e($post->contenus)) !!}
            </div>

            <!-- Image du post (si disponible) -->
            @if ($post->image)
                <div class="mt-6">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->titre }}" class="w-full h-auto rounded-lg shadow-md">
                </div>
            @endif
        </div>

        <!-- Inclusion du composant Livewire pour les interactions -->
        <div class="mt-8">
            @livewire('post-interactions', ['post' => $post])
        </div>
    </div>