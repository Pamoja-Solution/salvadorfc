<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-gray-900 to-gray-800 text-white flex h-screen">
    <!-- Sidebar -->
    <aside class="w-20 hover:w-64 transition-all duration-300 bg-gray-800 p-4 flex flex-col justify-between h-full">
        <nav>
            <ul>
                <!-- Menu Compte -->
                <li class="group flex items-center gap-3 p-3 rounded-lg cursor-pointer hover:bg-gray-700 transition">
                    <span class="w-10 h-10 flex items-center justify-center bg-purple-500 rounded-lg">
                        <i class="fas fa-user text-white"></i>
                    </span>
                    <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">Compte</span>
                </li>

                <!-- Menu Paramètres -->
                <li id="settings-menu" class="group flex items-center gap-3 p-3 rounded-lg cursor-pointer hover:bg-gray-700 transition">
                    <span class="w-10 h-10 flex items-center justify-center bg-blue-500 rounded-lg">
                        <i class="fas fa-cog text-white"></i>
                    </span>
                    <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">Paramètres</span>
                </li>

                <!-- Sous-menu Paramètres -->
                <ul id="settings-submenu" class="pl-6 hidden">
                    <li class="flex items-center gap-3 p-3 rounded-lg cursor-pointer hover:bg-gray-700 transition">
                        <span class="w-10 h-10 flex items-center justify-center bg-blue-400 rounded-lg">
                            <i class="fas fa-key text-white"></i>
                        </span>
                        <span>Changer de mot de passe</span>
                    </li>
                    <li class="flex items-center gap-3 p-3 rounded-lg cursor-pointer hover:bg-gray-700 transition">
                        <span class="w-10 h-10 flex items-center justify-center bg-blue-400 rounded-lg">
                            <i class="fas fa-bell text-white"></i>
                        </span>
                        <span>Notifications</span>
                    </li>
                </ul>
            </ul>
        </nav>

        <!-- Bouton Déconnexion -->
        <button class="flex items-center gap-3 p-3 rounded-lg cursor-pointer bg-red-500 hover:bg-red-600 transition">
            <span class="w-10 h-10 flex items-center justify-center">
                <i class="fas fa-sign-out-alt text-white"></i>
            </span>
            <span class="opacity-0 hover:opacity-100 transition-opacity duration-300">Déconnexion</span>
        </button>
    </aside>

    <!-- Contenu Principal -->
    <main class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-8">Profil Utilisateur</h1>
        <div class="bg-gray-800 p-6 rounded-lg shadow-md">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-400">Nom d'utilisateur</label>
                    <p class="mt-1 text-lg">Pamoju-Soku</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-400">Équipe</label>
                    <p class="mt-1 text-lg">FC SALVADOR</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-400">Joueurs</label>
                    <p class="mt-1 text-lg">Les Jouers</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-400">Adversaire</label>
                    <p class="mt-1 text-lg">FP FC Barcelos</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-400">Statut</label>
                    <p class="mt-1 text-lg">Actif</p>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Gestion du sous-menu Paramètres
        const settingsMenu = document.getElementById('settings-menu');
        const settingsSubmenu = document.getElementById('settings-submenu');

        settingsMenu.addEventListener('click', () => {
            settingsSubmenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>