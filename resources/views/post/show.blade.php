
@include("components.layouts.app")


<main class="pt-8 pb-16 lg:pt-16 lg:pb-24  antialiased">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl  ">
        <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert ">
            
            <p class="lead  dark:text-white">{{ $post->titre }}</p>
            <div class="flex items-center space-x-4 text-sm text-gray-500 dark:text-gray-400 mb-6">
                <span class="bg-blue-100 dark:bg-blue-800 text-blue-800 dark:text-blue-200 px-2 py-1 rounded">
                    Catégorie : {{ $post->categorie->name }}
                </span>
                <span class="bg-green-100 dark:bg-green-800 text-green-800 dark:text-green-200 px-2 py-1 rounded">
                    Temps de lecture : {{ $post->temps }} min
                </span>
                <span class="bg-purple-100 dark:bg-purple-800 text-purple-800 dark:text-purple-200 px-2 py-1 rounded">
                    Publié le : {{ $post->created_at->diffForHumans() }}
                </span>
            </div>
            <span class="font-medium text-sm font-bold">PARTAGEZ CET ARTICLE</span>

            <div class="flex space-x-4 text-sm text-gray-600 rounded rounded-6 border-b border-t border-red-600 p-2">
               
                <a 
                  href="https://twitter.com/intent/tweet?text={{ $post->titre }}&url={{ Request::url() }}" 
                  target="_blank" 
                  rel="noopener noreferrer" 
                  class="text-white bg-[#1da1f2] hover:bg-[#1da1f2]/90 focus:ring-4 focus:outline-none focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 me-2 mb-2"
                >
                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M13.795 10.533 20.68 2h-3.073l-5.255 6.517L7.69 2H1l7.806 10.91L1.47 22h3.074l5.705-7.07L15.31 22H22l-8.205-11.467Zm-2.38 2.95L9.97 11.464 4.36 3.627h2.31l4.528 6.317 1.443 2.02 6.018 8.409h-2.31l-4.934-6.89Z"/>
                  </svg>
                  
                  Twitter
                </a>
                
                <a 
                  href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" 
                  target="_blank" 
                  rel="noopener noreferrer" 
                  class="text-white bg-[#3b5998] hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 me-2 mb-2"
                >
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z" clip-rule="evenodd"/>
                  </svg>
                  
                  Facebook
                </a>
                <button 
                  onclick="navigator.clipboard.writeText(`{{ Request::url() }}`)" 
                  class="text-gray-900 bg-[#F7BE38] hover:bg-[#F7BE38]/90 focus:ring-4 focus:outline-none focus:ring-[#F7BE38]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#F7BE38]/50 me-2 mb-2"                >
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.213 9.787a3.391 3.391 0 0 0-4.795 0l-3.425 3.426a3.39 3.39 0 0 0 4.795 4.794l.321-.304m-.321-4.49a3.39 3.39 0 0 0 4.795 0l3.424-3.426a3.39 3.39 0 0 0-4.794-4.795l-1.028.961"/>
                  </svg>
                  
                  Lien copié
                </button>

              </div>
            
              @if ($post->image)
              <figure><img src="{{ $post->imageUrl() }}" alt="{{ $post->titre }}" class="rounded rounded-6">
            </figure>
              @endif
                <div class="text-gray-700 dark:text-gray-200">
                    <p class="">
                        {!! $post->contenus !!}
                    </p>
                </div>
            
            
            <div class="mt-8">
                @livewire('post-interactions', ['post' => $post])
            </div>
        </article>
    </div>
  </main>