<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Exécuter le seeder.
     *
     * @return void
     */
    public function run()
    {
        // Créer un utilisateur admin
        User::create([
            'name' => 'Admin User',
            'adresse' => '123 Admin Street',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Mot de passe sécurisé
            'role' => 0, // Rôle admin
        ]);

       /* // Créer un utilisateur standard
        User::create([
            'name' => 'John Doe',
            'adresse' => '456 User Avenue',
            'email' => 'user@example.com',
            'password' => Hash::make('password'), // Mot de passe sécurisé
            'role' => 1, // Rôle user
        ]);

        // Créer plusieurs utilisateurs avec une factory (optionnel)
        User::factory()->count(10)->create(); // Si vous avez une factory définie*/
    }
}