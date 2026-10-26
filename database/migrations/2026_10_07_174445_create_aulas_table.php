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
        Schema::create('aulas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('capacidad');
            $table->boolean('wifi');

            // Un edificio tiene varias aulas; cada aula pertenece a un edificio.
            // Es nullable para no romper el CRUD web de aulas que ya existía,
            // y si se borra el edificio las aulas se conservan (edificio_id = NULL).
            $table->foreignId('edificio_id')
                  ->nullable()
                  ->constrained('edificios')
                  ->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aulas');
    }
};
