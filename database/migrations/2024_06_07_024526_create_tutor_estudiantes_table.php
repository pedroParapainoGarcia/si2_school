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
        Schema::create('tutor_estudiantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tutor_id')
                ->constrained('padre_de_familias')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('estudiante_id')
                ->constrained('estudiantes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('parentesco');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutor_estudiantes');
    }
};
