<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_paciente', 250);
            $table->string('apellidos_paciente', 250);
            $table->string('fecha_nacimiento_paciente',250);
            $table->string('genero_paciente',250);
            $table->string('celular_paciente')->nullable();
            $table->string('correo_paciente', 250)->nullable()->unique();
            $table->string('dirrecion_paciente')->nullable();
            $table->string('peso_paciente')->nullable();
            $table->string('alergias_paciente')->nullable();
            $table->string('observaciones_paciente')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
};
