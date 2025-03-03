<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('calendrier_matches', function (Blueprint $table) {
            $table->id();
            $table->string('competition');
            $table->string('journee');
            $table->date('date_match');
            $table->time('heure_match');
            $table->string('equipe_domicile');
            $table->string('equipe_exterieur');
            $table->string('stade');
            $table->string('statut')->default('domicile'); // 'domicile' ou 'exterieur'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendrier_matches');
    }
};
