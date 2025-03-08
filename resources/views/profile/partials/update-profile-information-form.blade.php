<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

   

    <div class="dark:bg-gray-800 dark:bg-opacity-70 dark:backdrop-blur-sm rounded-2xl shadow-xl p-6">
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('patch')
            
            <div class=" grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="name" class="block text-sm font-medium dark:text-gray-300 mb-2">Nom</label>
                    <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" 
                           class="w-full px-4 py-3 dark:bg-gray-700 border dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:text-white">
                </div>
                
                <div>
                    <label for="email" class="block text-sm font-medium dark:text-gray-300 mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" 
                           class="w-full px-4 py-3 dark:bg-gray-700 border dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:text-white">
                </div>
                
                <div class="">
                    <label for="adresse" class="block text-sm font-medium dark:text-gray-300 mb-2">Adresse</label>
                    <textarea id="adresse" name="adresse" rows="2" 
                              class="w-full px-4 py-3 dark:bg-gray-700 border dark:border-gray-600 rounded-lg focus:ring-2 dark:focus:ring-blue-500 dark:focus:border-transparent dark:text-white">{{ Auth::user()->adresse ?? '' }}</textarea>
                </div>
                
                <div>
                    <label for="birthdate" class="block text-sm font-medium dark:text-gray-300 mb-2">Date de naissance</label>
                    <input type="date" id="birthdate" name="birthdate" value="{{ Auth::user()->birthdate ?? '' }}" 
                           class="w-full px-4 py-3 dark:bg-gray-700 border dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:text-white">
                </div>
            </div>
            
            
            
            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
    
                @if (session('status') === 'profile-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </div>  
</section>
