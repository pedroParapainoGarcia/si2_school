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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->foreignId('id')->constrained('users')->primary()->onDelete('cascade')->onUpdate('cascade');  // This line already sets the id as primary and foreign key
            $table->string('nro_rude')->unique();
            $table->foreignId('nivel_id')->constrained('nivels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('grado_id')->constrained('grados')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('padre_id')->nullable()->constrained('padre_de_familias')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
