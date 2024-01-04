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
        Schema::create('terceros', function (Blueprint $table) {
            $table->id();
            $table->string('Tipo_Doc', 2)->nullable()->comment('CC: Cédula de Ciudadanía, TI: Tarjeta de Identidad, PA: Pasaporte');
            $table->string('Doc_Identificacion');
            $table->string('Nombre');
            $table->string('Apellido');
            $table->date('Fecha_Nacimiento');
            $table->string('Email');
            $table->enum('tipo_usuario', ['administrador', 'usuario']);
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terceros');
    }
};
