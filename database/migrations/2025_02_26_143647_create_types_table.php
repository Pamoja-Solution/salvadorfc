<?php

use App\Models\Type;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendriersTable extends Migration
{
    public function up()
    {
        Schema::create('calendriers', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description')->nullable();
            $table->dateTime('date_debut');
            $table->dateTime('date_fin');
            $table->foreignIdFor(Type::class)->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }
   

    public function down()
    {
        Schema::dropIfExists('calendriers');
    }
}