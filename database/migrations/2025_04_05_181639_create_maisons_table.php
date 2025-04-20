<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('maisons', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description')->nullable();
            $table->string('adresse');
            $table->string('ville');
            $table->decimal('prix_par_nuit', 8, 2);
            $table->integer('capacite');
            $table->boolean('disponible')->default(true);
            $table->integer('nb_demande')->default(0);
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->json('images')->nullable(); // stockage des chemins d'images
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('maisons');
    }
};
