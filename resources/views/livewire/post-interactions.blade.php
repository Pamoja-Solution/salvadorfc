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
    <div id="comments-section" class="mt-8 bg-gray-50 dark:bg-gray-800/70 rounded-xl p-6 shadow-sm transition-colors duration-300">
        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-600 dark:text-blue-400 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
            </svg>
            Commentaires
        </h3>
        @guest
          

              <div id="alert-border-1" class="flex items-center p-4 mb-4  border-t-4 border-blue-300 bg-green-900  dark:bg-gray-800 dark:border-green-800" role="alert" style="background-color: rgb(216, 230, 14)">
                <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <div class="ms-3 text-sm font-medium">
                  <a href="{{ route('login') }}" class="font-semibold underline hover:no-underline"> Connectez - Vous</a> pour commenter ce post
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-1" aria-label="Close">
                  <span class="sr-only">Dismiss</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                </button>
            </div>
        @endguest
        <div class="space-y-5">
            @foreach($comments as $comment)
                <div class="bg-white dark:bg-gray-750 dark:bg-opacity-20 p-5 rounded-lg border-l-4 border-blue-500 dark:border-blue-400 shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-1" wire:key="comment-{{ $comment->id }}">
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center space-x-3">
                            <!--img src="{{ $comment->user->profile_photo_url }}" alt="{{ $comment->user->name }}" class="w-10 h-10 rounded-full ring-2 ring-blue-100 dark:ring-blue-800/50 transition-colors duration-300"-->
                            <svg class="w-10 h-10 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>
                              </svg>
                              
                            <div>
                                <p class="font-medium text-gray-900 dark:text-white transition-colors duration-300">{{ $comment->user->name }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 transition-colors duration-300">{{ $comment->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        
                        <div class="text-gray-400 dark:text-gray-500 text-xs transition-colors duration-300">
                            <span title="{{ $comment->created_at->format('d M Y H:i') }}" class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $comment->created_at->format('d M Y') }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="pl-13 mt-2">
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed transition-colors duration-300">{{ $comment->content }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        
        @if(count($comments) == 0)
            <div class="flex flex-col items-center justify-center py-8 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 dark:text-gray-600 mb-3 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                <p class="text-gray-500 dark:text-gray-400 font-medium transition-colors duration-300">Aucun commentaire pour le moment</p>
                <p class="text-gray-400 dark:text-gray-500 text-sm mt-1 transition-colors duration-300">Soyez le premier à partager votre avis !</p>
            </div>
        @endif

        <div class="mt-6">
            <textarea wire:model="commentContent" class="w-full bg-gray-700 text-white rounded-lg p-3" placeholder="Ajouter un commentaire..."></textarea>
            <button wire:click="addComment" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">Commenter</button>
        </div>
        
        <!-- Pagination avec style amélioré -->
        <div class="mt-8" wire:ignore>
            <div class="pagination-wrapper flex justify-center">
                {{ $comments->links() }}
            </div>
        </div>
    </div>
    
    
    <script>
        document.addEventListener('scroll-to-comments', function() {
            window.scrollTo({
                top: document.getElementById('comments-section').offsetTop - 100,
                behavior: 'smooth'
            });
        });
    </script>
    
</div>