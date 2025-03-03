<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * Le nom et la signature de la commande.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * La description de la commande.
     *
     * @var string
     */
    protected $description = 'Créer un nouvel utilisateur';

    /**
     * Exécuter la commande.
     *
     * @return int
     */
    public function handle()
    {
        // Demander les informations de l'utilisateur
        $name = $this->ask('Entrez le nom de l\'utilisateur');
        $adresse = $this->ask('Entrez l\'adresse de l\'utilisateur (optionnel)', null);
        $email = $this->ask('Entrez l\'email de l\'utilisateur');
        $password = $this->secret('Entrez le mot de passe de l\'utilisateur');
        $role = $this->choice('Choisissez le rôle de l\'utilisateur', ['user' => 1, 'admin' => 0], 1);

        // Valider l'email unique
        if (User::where('email', $email)->exists()) {
            $this->error('Un utilisateur avec cet email existe déjà.');
            return 1;
        }

        // Créer l'utilisateur
        User::create([
            'name' => $name,
            'adresse' => $adresse,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => $role,
        ]);

        $this->info('Utilisateur créé avec succès !');
        return 0;
    }
}