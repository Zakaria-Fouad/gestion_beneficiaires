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
        Schema::create('entrepreneurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom_prenom');
            $table->date('date_naissance')->nullable();
            $table->string('cin')->nullable()->unique();
            $table->string('genre', 20)->nullable();
            $table->string('region')->nullable();
            $table->string('ville')->nullable();
            $table->string('situation_maritale')->nullable();
            $table->string('activite')->nullable();
            $table->string('niveau_scolaire')->nullable();
            $table->string('telephone', 30)->nullable();
            $table->string('statut_juridique')->nullable();
            $table->string('secteur')->nullable();
            $table->string('imf')->nullable();
            $table->date('date_premiere_participation')->nullable();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('user_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrepreneurs');
    }
};
