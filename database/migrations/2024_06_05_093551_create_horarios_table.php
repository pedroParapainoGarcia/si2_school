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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->string('turno');
            $table->foreignId('dia_id')
                ->constrained('dias')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('periodo_id')
                ->constrained('periodos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('intervalo_id')
                ->constrained('intervalos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('aula_id')
                ->constrained('aulas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('paralelo_id')
                ->constrained('paralelos')
                ->onUpdate('cascade')
                ->onDelete('cascade');            
            $table->foreignId('docentemateria_id')
                ->constrained('asignacion_materias')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
