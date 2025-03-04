<div>
    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Interactions</h2>

    <!-- Bouton Like -->
    <div class="mb-6">
        <button wire:click="toggleLike" class="flex items-center space-x-2 text-gray-600 dark:text-gray-400 hover:text-red-500 dark:hover:text-red-400 transition-colors duration-200">
            <i class="fas fa-heart {{ $userLike ? 'text-red-500 animate-pulse' : '' }}"></i>
            <span>{{ $likesCount }} Likes</span>
        </button>
    </div>

    <!-- Liste des commentaires -->
    <div class="mt-6">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Commentaires</h3>
        <div class="space-y-4">
            @foreach($comments as $comment)
                <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200">
                    <div class="flex items-center space-x-3">
                        <!-- Photo de profil de l'utilisateur -->
                        <img src="{{ $comment->user->profile_photo_url }}" alt="{{ $comment->user->name }}" class="w-10 h-10 rounded-full">
                        <div>
                            <!-- Nom de l'utilisateur -->
                            <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $comment->user->name }}</p>
                            <!-- Date du commentaire -->
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $comment->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <!-- Contenu du commentaire -->
                    <p class="mt-2 text-gray-700 dark:text-gray-300">{{ $comment->content }}</p>
                </div>
            @endforeach
        </div>

        <!-- Formulaire pour ajouter un commentaire -->
        <div class="mt-6">
            <textarea wire:model="commentContent" class="w-full bg-white dark:bg-gray-700 text-gray-900 dark:text-white rounded-lg p-3 border border-gray-200 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200" placeholder="Ajouter un commentaire..."></textarea>
            <button wire:click="addComment" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-200">
                Commenter
            </button>
        </div>
    </div>
</div>