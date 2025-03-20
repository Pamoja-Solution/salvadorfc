<x-app-layout>
    @section('titre', "Les Événements")
    <div class="container mx-auto px-4">
    <h1 class="text-2xl text-white font-bold my-4">Calendrier des événements</h1>
    <a href="{{ route('admin.types.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded  ">Créer un événement</a>
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="w-full md:w-2/3 lg:w-1/2 mb-6 mt-6">
        <form>
            <label for="default-search" class="sr-only">Rechercher</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="search" id="myInput" onkeyup="filterTable()" class="block w-full p-4 pl-10 text-sm text-gray-700 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Recherche Rapide" required />
                <button type="submit" class="absolute right-2.5 bottom-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg text-sm px-4 py-2 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Rechercher
                </button>
            </div>
        </form>
    </div>
    <div class="bg-white shadow-md rounded my-6">
        <table id="myTable" class="min-w-full">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left">Titre</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($types as $post)
                    <tr>
                        <td class="px-6 py-4 border-b">{{ $post->nom }}</td>
                       
                        <td class="px-6 py-4 border-b">
                            <div class="flex space-x-2">
                               
                                <a href="{{ route('admin.types.edit', $post) }}" class="text-blue-600 hover:text-blue-900">
                                    Modifier
                                </a>
                                
                                  

                                
                                <form action="{{ route('admin.types.destroy', $post) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                       
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $types->links() }}
    </div>
</div>
<script>
    function filterTable() {
            
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
        
            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
        
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        
        }
        
</script>
</div>

</x-app-layout>
