<?php

use App\Models\PostJouer;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jouers', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('nationnalite');
            $table->date('date_de_naissance');
            $table->string('photo')->nullable();
            $table->string('taille');
            $table->string('poids');
            $table->string('dorsale');
            $table->string('but');
            $table->string('passe');
            $table->string('matches');
            $table->text('historique');
            $table->foreignIdFor(PostJouer::class)->constrained()->cascadeOnDelete();


            
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jouers');
        
    }
};
