<x-app-layout>
<div class="container mx-auto px-4 my-6">
    <h1 class="text-2xl text-white font-bold mb-4">Competitions </h1>
    <a href="{{ route('admin.competitions.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Ajouter une competition</a>
    <div class="mt-6">
        @session('success')
        <div class="flex items-center p-4 mb-4 text-sm text-green-800 bg-green-50 rounded-lg dark:bg-gray-800 dark:text-green-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Message de succès!</span> {{ session('success') }}.
            </div>
        </div>
    @endsession


<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nom
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
                
            </tr>
        </thead>
        <tbody>
            @forelse ($competitions as $competition)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $competition->nom }}
                </th>
                <td class="px-6 py-4">
                    {{ Str::limit($competition->description, 20) }}
                </td>
                
                <td class="px-6 py-4">
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.competitions.edit', $competition->id) }}"  
                            class="focus:outline-none text-white inline-flex items-center font-medium rounded-lg text-sm px-5 py-2.5 
                                 bg-green-600 hover:bg-green-800">        
                                 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>                  Modifier  </a>
                                <form action="{{ route('admin.competitions.destroy', $competition->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="focus:outline-none text-white inline-flex items-center font-medium rounded-lg text-sm px-5 py-2.5 
                                 bg-red-600 hover:bg-red-800" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette competition ?')">
                                        Supprimer
                                    </button>
                                </form>
                </div>
                </td>
            </tr>
            @empty
            <div class="p-2 mb-2 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-100 dark:text-red-400" role="alert">
                <span class="font-medium">Erreur alert!</span> Aucune données disponible.
            </div>
            @endforelse 
            
            
        </tbody>
    </table>
</div>

            </div>
    </div>
</div>
</x-app-layout>
