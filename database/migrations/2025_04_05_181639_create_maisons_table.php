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
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->json('images')->nullable(); // pour stocker un tableau d’images
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('maisons');
    }
};
