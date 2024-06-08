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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['user', 'admin'])->default('user');
            $table->boolean('is_approved')->default(false);
            $table->string('phone')->nullable(); // Champ pour le téléphone
            $table->string('photo_profil')->nullable(); // Champ pour la photo de profil
            $table->string('photo_recto_carte_identite')->nullable(); // Champ pour la photo recto de la carte d'identité
            $table->string('photo_verso_carte_identite')->nullable(); // Champ pour la photo verso de la carte d'identité
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
