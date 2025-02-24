<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Joueurs</title>
    @livewireStyles <!-- Inclure les styles Livewire -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Gestion des Joueurs</h1>

        <!-- Inclure le composant Livewire -->
        <livewire:jouer-component />
    </div>

    @livewireScripts <!-- Inclure les scripts Livewire -->
</body>
</html>