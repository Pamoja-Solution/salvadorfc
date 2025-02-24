<div>
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Gestion des Joueurs</h1>

        <!-- Bouton pour ouvrir le modal de création -->
        <button wire:click="create" class="bg-blue-500 text-white px-4 py-2 rounded mb-4">
            Ajouter un Joueur
        </button>

        <!-- Tableau des joueurs -->
        <table class="min-w-full bg-white">
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
            <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <div class="bg-white p-6 rounded-lg w-1/2">
                    <h2 class="text-xl font-bold mb-4">{{ $jouer_id ? 'Modifier' : 'Créer' }} un Joueur</h2>

                    <form wire:submit.prevent="store">
                        <div class="mb-4">
                            <label class="block text-gray-700">Nom</label>
                            <input type="text" wire:model="nom" class="w-full px-3 py-2 border rounded">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Nationalité</label>
                            <input type="text" wire:model="nationnalite" class="w-full px-3 py-2 border rounded">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Date de Naissance</label>
                            <input type="date" wire:model="date_de_naissance" class="w-full px-3 py-2 border rounded">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Photo</label>
                            <input type="file" wire:model="photo" class="w-full px-3 py-2 border rounded">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Taille</label>
                            <input type="text" wire:model="taille" class="w-full px-3 py-2 border rounded">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Poids</label>
                            <input type="text" wire:model="poids" class="w-full px-3 py-2 border rounded">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Dorsale</label>
                            <input type="text" wire:model="dorsale" class="w-full px-3 py-2 border rounded">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">But</label>
                            <input type="text" wire:model="but" class="w-full px-3 py-2 border rounded">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Passe</label>
                            <input type="text" wire:model="passe" class="w-full px-3 py-2 border rounded">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Matches</label>
                            <input type="text" wire:model="matches" class="w-full px-3 py-2 border rounded">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Historique</label>
                            <textarea wire:model="historique" class="w-full px-3 py-2 border rounded"></textarea>
                        </div>

                        <div class="flex justify-end">
                            <button type="button" wire:click="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">
                                Annuler
                            </button>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                                {{ $jouer_id ? 'Mettre à jour' : 'Créer' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>
</div>