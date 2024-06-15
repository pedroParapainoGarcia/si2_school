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
        Schema::create('padre_de_familias', function (Blueprint $table) {
            $table->foreignId('id')->constrained('users')->primary()->onDelete('cascade')->onUpdate('cascade');  // This line already sets the id as primary and foreign key
            $table->string('ocupacionLaboral');
            $table->string('mayorGradoInstruccion');
            $table->enum('tipo', ['PF', 'TL']); // Campo enum para el tipo de tutor
            //$table->boolean('estado')->default(false); // Campo para el estado
            $table->unique('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('padre_de_familias');
    }
};
