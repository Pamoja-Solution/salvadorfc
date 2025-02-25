<div>
    <div class="container mx-auto px-4">
        <h1 class="text-2xl text-white font-bold mb-4 mt-6">Gestion des Joueurs</h1>

        <!-- Bouton pour ouvrir le modal de création -->
        <a href="{{ route('admin.jouers.create') }}"  class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
            Ajouter un Joueur
        </a>

        <!-- Tableau des joueurs -->
        <table class="min-w-full bg-white mt-6">
            <thead>
                <tr>
                    <th class="py-2">Nom</th>
                    <th class="py-2">Nationalité</th>
                    <th class="py-2">Date de Naissance</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jouers as $jouer)
                    <tr>
                        <td class="py-2">{{ $jouer->nom }}</td>
                        <td class="py-2">{{ $jouer->nationnalite }}</td>
                        <td class="py-2">{{ $jouer->date_de_naissance }}</td>
                        <td class="py-2">
                            <button wire:click="edit({{ $jouer->id }})" class="bg-yellow-500 text-white px-2 py-1 rounded">
                                Modifier
                            </button>
                            <button wire:click="delete({{ $jouer->id }})" class="bg-red-500 text-white px-2 py-1 rounded ml-2">
                                Supprimer
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Modal pour créer/modifier un joueur -->
        @if ($isOpen)
           
        @endif
    </div>
</div>