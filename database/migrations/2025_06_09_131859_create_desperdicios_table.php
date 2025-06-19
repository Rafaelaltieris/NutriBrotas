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
        Schema::create('desperdicios', function (Blueprint $table) {
            // desperdicios
            $table->id();
            $table->foreignId('turma_id')->constrained();
            $table->foreignId('refeicao_id')->constrained();
            $table->foreignId('user_id')->constrained(); // nutricionista que registrou
            $table->date('data');
            $table->decimal('quantidade', 8, 2); // ex: 1.25kg
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desperdicios');
    }
};
