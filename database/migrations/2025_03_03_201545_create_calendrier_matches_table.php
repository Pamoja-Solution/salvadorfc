<?php

use App\Models\Competition;
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
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('calendrier_matches', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Competition::class)->constrained()->cascadeOnDelete();
            $table->string('journee')->nullable();
            $table->date('date_match');
            $table->time('heure_match');
            $table->string('adversaire');
            $table->string('stade')->nullable();
            $table->string('statut')->default('domicile'); // 'domicile' ou 'exterieur'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitions');

        Schema::dropIfExists('calendrier_matches');
    }
};
