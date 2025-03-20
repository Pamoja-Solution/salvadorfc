@extends('entete.base')

@section("contenus")

<div class="bg-gradient-to-br from-gray-900 via-gray-900 to-blue-900 min-h-screen pt-16 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Bannière du profil -->
        <div class="relative bg-gradient-to-r from-blue-800 to-blue-900 rounded-3xl shadow-2xl overflow-hidden mb-8">
            <div class="absolute inset-0 bg-pattern opacity-10"></div>
            
            <!-- Image de couverture -->
            <div class="h-48 sm:h-64 w-full bg-gradient-to-r from-blue-600 to-purple-600 opacity-70"></div>
            
            <!-- Informations du profil -->
            <div class="relative px-6 sm:px-8 pb-8">
                <div class="flex flex-col sm:flex-row items-center sm:items-end -mt-20 sm:-mt-24 mb-6">
                    <!-- Avatar -->
                    <div class="relative h-32 w-32 sm:h-40 sm:w-40 rounded-full overflow-hidden border-4 border-blue-950 shadow-xl bg-blue-800">
                        @if(Auth::user()->image)
                            <img src="{{ Auth::user()->imageUrls() }}" alt="{{ Auth::user()->name }}" class="h-full w-full object-cover">
                        @else
                            <div class="h-full w-full flex items-center justify-center bg-gradient-to-br from-blue-500 to-indigo-600">
                                <span class="text-5xl font-bold text-white">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </span>
                            </div>
                        @endif
                        
                        <button
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'update-profile-photo')"
                            class="absolute bottom-5 right-5 bg-blue-500 hover:bg-blue-600 p-3 rounded-full shadow-lg transition"
                            title="Changer l'avatar"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>


                        <!-- Modal pour modifier la photo de profil -->
<x-modal name="update-profile-photo" :show="$errors->updateProfilePhoto->isNotEmpty()" focusable>
    <form method="post" action="{{ route('profile.photo.update') }}" class="p-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Modifier votre photo de profil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Téléchargez une nouvelle photo pour votre profil. L\'image sera redimensionnée automatiquement.') }}
        </p>

        <div class="mt-6">
            <x-input-label for="image" value="{{ __('Image') }}" />

            <div class="mt-2 flex items-center">
                <!-- Prévisualisation de l'image -->
                <div class="relative w-20 h-20 rounded-full overflow-hidden mr-4">
                    <img id="preview-image" class="w-full h-full object-cover" src="{{ auth()->user()->image ? auth()->user()->imageUrls(): asset('images/default-avatar.png') }}" alt="Photo de profil">
                </div>
                
                <x-text-input
                    id="image"
                    name="image"
                    type="file"
                    class="mt-1 block w-full"
                    accept="image/*"
                    x-on:change="
                        const file = $event.target.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                document.getElementById('preview-image').src = e.target.result;
                            };
                            reader.readAsDataURL(file);
                        }
                    "
                />
            </div>

            <x-input-error :messages="$errors->updateProfilePhoto->get('image')" class="mt-2" />
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Annuler') }}
            </x-secondary-button>

            <x-primary-button class="ms-3">
                {{ __('Enregistrer') }}
            </x-primary-button>
        </div>
    </form>
</x-modal>
                    </div>
                    
                    <!-- Informations utilisateur -->
                    <div class="flex-1 text-center sm:text-left sm:ml-6 mt-4 sm:mt-0">
                        <h1 class="text-3xl font-bold text-white">{{ Auth::user()->name }}</h1>
                        <p class="text-blue-200">{{ Auth::user()->email }}</p>
                        <p class="text-blue-300 text-sm">Membre depuis {{ Auth::user()->created_at->translatedFormat('d M Y') }}</p>
                    </div>
                    
                    <!-- Boutons d'action rapide -->
                    <div class="hidden sm:flex items-center space-x-3 mt-4 sm:mt-0">
                        <a href="{{ route('profile.edit') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow-lg transition flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Modifier
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation du tableau de bord -->
        <div class="flex flex-wrap md:flex-nowrap gap-4 mb-8">
            <div class="w-full md:w-64 flex-shrink-0">
                <div class="bg-gray-800 bg-opacity-70 backdrop-blur-sm rounded-2xl shadow-xl p-6">
                    <h2 class="text-xl font-bold text-white mb-4">Menu</h2>
                    <nav class="space-y-2">
                        <a href="#dashboard" class="flex items-center px-4 py-3 text-blue-300 bg-blue-900 bg-opacity-40 rounded-xl hover:bg-opacity-60 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Tableau de bord
                        </a>
                        <a href="#mes-posts" class="flex items-center px-4 py-3 text-blue-200 hover:bg-blue-900 hover:bg-opacity-40 rounded-xl transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                            Mes posts
                        </a>
                        <a href="#favoris" class="flex items-center px-4 py-3 text-blue-200 hover:bg-blue-900 hover:bg-opacity-40 rounded-xl transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            Mes favoris
                        </a>
                        <a href="#parametres" class="flex items-center px-4 py-3 text-blue-200 hover:bg-blue-900 hover:bg-opacity-40 rounded-xl transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Paramètres
                        </a>
                        <a href="#securite" class="flex items-center px-4 py-3 text-blue-200 hover:bg-blue-900 hover:bg-opacity-40 rounded-xl transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            Sécurité
                        </a>
                    </nav>
                    
                    
                </div>
            </div>
            
            <!-- Contenu principal -->
            <div class="flex-1">
                <!-- Statistiques -->
                <!--div id="dashboard" class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">
                    <div class="bg-gradient-to-br from-blue-900 to-blue-800 rounded-2xl shadow-xl p-6 flex items-center hover:transform hover:scale-105 transition-all duration-300">
                        <div class="p-3 bg-blue-700 bg-opacity-50 rounded-xl mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-gray-300 text-sm font-medium">Posts Publiés</h3>
                            <p class="text-3xl font-bold text-white">{{ Auth::user()->posts_count ?? 0 }}</p>
                        </div>
                    </div>
                    
                    <div class="bg-gradient-to-br from-indigo-900 to-indigo-800 rounded-2xl shadow-xl p-6 flex items-center hover:transform hover:scale-105 transition-all duration-300">
                        <div class="p-3 bg-indigo-700 bg-opacity-50 rounded-xl mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-gray-300 text-sm font-medium">Favoris</h3>
                            <p class="text-3xl font-bold text-white">{{ Auth::user()->favorites_count ?? 0 }}</p>
                        </div>
                    </div>
                    
                    <div class="bg-gradient-to-br from-purple-900 to-purple-800 rounded-2xl shadow-xl p-6 flex items-center hover:transform hover:scale-105 transition-all duration-300">
                        <div class="p-3 bg-purple-700 bg-opacity-50 rounded-xl mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-gray-300 text-sm font-medium">Commentaires</h3>
                            <p class="text-3xl font-bold text-white">{{ Auth::user()->comments_count ?? 0 }}</p>
                        </div>
                    </div>
                    
                    <div class="bg-gradient-to-br from-cyan-900 to-cyan-800 rounded-2xl shadow-xl p-6 flex items-center hover:transform hover:scale-105 transition-all duration-300">
                        <div class="p-3 bg-cyan-700 bg-opacity-50 rounded-xl mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-cyan-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-gray-300 text-sm font-medium">Dernière connexion</h3>
                            <p class="text-xl font-bold text-white">{{ \Carbon\Carbon::now()->subHours(rand(1, 72))->diffForHumans() }}</p>
                        </div>
                    </div>
                </div-->
                
                <!-- Mes posts -->
                <div id="mes-posts" class="mb-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-white">Mes Posts</h2>
                        
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @forelse($favoris as $index)
                            <div class="bg-gray-800 bg-opacity-70 backdrop-blur-sm rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all hover:transform hover:translate-y-[-5px]">
                                <div class="h-48 overflow-hidden bg-gradient-to-r from-blue-500 to-purple-600 relative">
                                    @if ($index->image)
                                    <img src="{{ $index->imageUrl() }}" alt="" class="w-full h-full object-cover opacity-70">
                                        
                                    @else
                                    <img src="https://source.unsplash.com/random/800x600?sports,soccer&sig={{ $index }}" alt="" class="w-full h-full object-cover opacity-70">
                                        
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/60 to-transparent"></div>
                                    <div class="absolute bottom-0 left-0 p-4">
                                        <span class="px-3 py-1 bg-blue-600 text-xs font-semibold text-white rounded-full">{{ $index->category->name }}</span>
                                        <h3 class="text-xl font-bold text-white mt-2">{{ Str::limit($index->titre,50) }}</h3>
                                        <p class="text-gray-300 text-sm">Publié {{$index->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <p class="text-gray-300 mb-4">Le club a remporté une victoire impressionnante lors du dernier match, démontrant une excellente stratégie et un jeu d'équipe impeccable...</p>
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <span class="text-gray-400 flex items-center mr-4">
                                                
                                                <svg class="h-5 w-5 mr-1 text-blue-400" id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1497.8 1500" width="2496" height="2500"><style>.st0{fill:#fff}.st1{fill:#ed5168}</style><path class="st0" d="M541.7 1092.6H376.6c-13 0-23.6-10.6-23.6-23.6V689.9c0-13 10.6-23.6 23.6-23.6h165.1c13 0 23.6 10.6 23.6 23.6V1069c-.1 13-10.7 23.6-23.6 23.6zM622.9 1003.5V731.9c0-66.3 18.9-132.9 54.1-189.2 21.5-34.4 69.7-89.5 96.7-118 6-6.4 27.8-25.2 27.8-35.5 0-13.2 1.5-34.5 2-74.2.3-25.2 20.8-45.9 46-45.7h1.1c44.1.8 58.2 41.6 58.2 41.6s37.7 74.4 2.5 165.4c-29.7 76.9-35.7 83.1-35.7 83.1s-9.6 13.9 20.8 13.3c0 0 185.6-.8 192-.8 13.7 0 57.4 12.5 54.9 68.2-1.8 41.2-27.4 55.6-40.5 60.3-2.6.9-2.9 4.5-.5 5.9 13.4 7.8 40.8 27.5 40.2 57.7-.8 36.6-15.5 50.1-46.1 58.5-2.8.8-3.3 4.5-.8 5.9 11.6 6.6 31.5 22.7 30.3 55.3-1.2 33.2-25.2 44.9-38.3 48.9-2.6.8-3.1 4.2-.8 5.8 8.3 5.7 20.6 18.6 20 45.1-.3 14-5 24.2-10.9 31.5-9.3 11.5-23.9 17.5-38.7 17.6l-411.8.8c-.1.1-22.5.1-22.5-29.9z"/><ellipse class="st1" cx="748.9" cy="750" rx="748.9" ry="750"/><path class="st0" d="M748.9 541.9C715.4 338.7 318.4 323.2 318.4 628c0 270.1 430.5 519.1 430.5 519.1s430.5-252.3 430.5-519.1c0-304.8-397-289.3-430.5-86.1z"/></svg>
                                                {{ $index->likes_count ??"0" }}
                                            </span>
                                            <span class="text-gray-400 flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                                </svg>
                                                {{ $index->comments_count ?? "0" }}
                                            </span>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('posts.show', $index) }}" class="p-2 bg-blue-900 bg-opacity-50 hover:bg-opacity-70 rounded-lg transition">
                                                
                                                <svg class="h-5 w-5 text-blue-300 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                  </svg>
                                                  
                                                </a>
                                            <button id="favori-toggle" data-post-id="{{ $index->id }}" class="p-2 bg-red-900 bg-opacity-50 hover:bg-opacity-70 rounded-lg transition">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-2 bg-gray-800 bg-opacity-70 backdrop-blur-sm rounded-2xl shadow-xl p-8 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                </svg>
                                <h3 class="text-xl font-semibold text-gray-300 mb-2">Vous n'avez pas encore de posts enregistrer</h3>
                                <!--p class="text-gray-400 mb-6">Commencez à partager des actualités avec la communauté du club.</p>
                                <a href="{ { route('user.newpost') }}" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow-lg transition inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    Créer mon premier post
                                </a-->
                            </div>
                        @endforelse
                    </div>
                    
                    @if(!$favoris->empty())
                    <div class="mt-6 text-center">
                        <a href="#" class="inline-flex items-center px-6 py-3 bg-gray-800 hover:bg-gray-700 text-blue-300 rounded-lg transition">
                            Voir tous mes posts
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                    @endif
                </div>
                
                <!-- Paramètres du compte -->
                <div id="parametres" class="mb-8">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-white">Paramètres du Compte</h2>
                    </div>
                    
                    <div class="bg-gray-800 bg-opacity-70 backdrop-blur-sm rounded-2xl shadow-xl p-6">
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            @method('patch')
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Nom</label>
                                    <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" 
                                           class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white">
                                </div>
                                
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                                    <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" 
                                           class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white">
                                </div>
                                
                                <div class="">
                                    <label for="adresse" class="block text-sm font-medium text-gray-300 mb-2">Adresse</label>
                                    <textarea id="adresse" name="adresse" rows="2" 
                                              class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white">{{ Auth::user()->adresse ?? '' }}</textarea>
                                </div>
                                
                                <div>
                                    <label for="birthdate" class="block text-sm font-medium text-gray-300 mb-2">Date de naissance</label>
                                    <input type="date" id="birthdate" name="birthdate" value="{{ Auth::user()->birthdate ?? '' }}" 
                                           class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white">
                                </div>
                            </div>
                            
                            
                            
                            <div class="flex justify-end">
                                <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-lg transition flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    Enregistrer les modifications
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Sécurité -->
                <div id="securite" class="mb-8">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-white">Sécurité</h2>
                    </div>
                    
                    <div class="bg-gray-800 bg-opacity-70 backdrop-blur-sm rounded-2xl shadow-xl overflow-hidden">
                        <!-- Changement de mot de passe -->
                        <div class="p-6 border-b border-gray-700">
                            <h3 class="text-xl font-semibold text-white mb-4">Changer de mot de passe</h3>
                               
                                
                                <!--div class="space-y-4">
                                    <div>
                                        <label for="current_password" class="block text-sm font-medium text-gray-300 mb-2">Mot de passe actuel</label>
                                        <input type="password" id="current_password" name="current_password" 
                                               class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white">
                                    </div>
                                    
                                    <div>
                                        <label for="new_password" class="block text-sm font-medium text-gray-300 mb-2">Nouveau mot de passe</label>
                                        <input type="password" id="new_password" name="new_password" 
                                               class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white">
                                    </div>
                                    
                                    <div>
                                        <label for="new_password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">Confirmer le nouveau mot de passe</label>
                                        <input type="password" id="new_password_confirmation" name="new_password_confirmation" 
                                               class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white">
                                    </div>
                                </div!-->
                                
                                <div class="mt-6">
                                    <a href="{{ route('profile.edit') }}" type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-lg transition">
                                        Mettre à jour le mot de passe
                                    </a>
                                </div>
                        </div>
                        
                        <!-- Supprimer le compte -->
                        <div class="p-6 bg-red-900 bg-opacity-10">
                            <h3 class="text-xl font-semibold text-red-300 mb-4">Zone dangereuse</h3>
                            <p class="text-gray-300 mb-6">La suppression de votre compte est irréversible et entraînera la perte de toutes vos données, publications et activités associées à votre compte.</p>
                            
                           

                        <x-danger-button
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                        >{{ __('Delete Account') }}</x-danger-button>

                        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                                @csrf
                                @method('delete')
                    
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Are you sure you want to delete your account?') }}
                                </h2>
                    
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                                </p>
                    
                                <div class="mt-6">
                                    <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                    
                                    <x-text-input
                                        id="password"
                                        name="password"
                                        type="password"
                                        class="mt-1 block w-3/4"
                                        placeholder="{{ __('Password') }}"
                                    />
                    
                                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                                </div>
                    
                                <div class="mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        {{ __('Cancel') }}
                                    </x-secondary-button>
                    
                                    <x-danger-button class="ms-3">
                                        {{ __('Delete Account') }}
                                    </x-danger-button>
                                </div>
                            </form>
                        </x-modal>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de suppression de compte -->
<div id="delete-account-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75 backdrop-blur-sm hidden">
    <div class="bg-gray-800 rounded-2xl shadow-2xl p-6 max-w-md w-full mx-4 transform transition-all">
        <div class="text-center mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            <h3 class="text-xl font-bold text-white mt-4">Confirmer la suppression</h3>
            <p class="text-gray-300 mt-2">Cette action est irréversible. Êtes-vous certain de vouloir supprimer votre compte et toutes vos données ?</p>
        </div>
        
        <form action="#" method="POST">
            @csrf
            @method('DELETE')
            
            <div class="mb-6">
                <label for="confirm_password" class="block text-sm font-medium text-gray-300 mb-2">Entrez votre mot de passe pour confirmer</label>
                <input type="password" id="confirm_password" name="password" required
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent text-white">
            </div>
            
            <div class="flex justify-between">
                <button type="button" class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white font-medium rounded-lg transition" 
                        onclick="document.getElementById('delete-account-modal').classList.add('hidden')">
                    Annuler
                </button>
                
                <button type="submit" class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg shadow-lg transition">
                    Supprimer définitivement
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    .bg-pattern {
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%239C92AC' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
</style>

<script>
    document.getElementById('favori-toggle').addEventListener('click', function () {
        const postId = this.getAttribute('data-post-id');
        axios.post('/favoris/toggle', { post_id: postId })
            .then(response => {
                location.reload(); // Actualiser la page après l'action
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>

@endsection