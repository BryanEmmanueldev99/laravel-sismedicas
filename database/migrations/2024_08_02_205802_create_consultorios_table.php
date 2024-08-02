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
        Schema::create('consultorios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_consultorio', 255);
            $table->string('ubicacion_consultorio', 255);
            $table->string('capacidad_consultorio', 255);
            $table->string('telefono_consultorio', 255)->nullable();
            $table->string('especialidad_consultorio', 255);
            $table->string('estado_consultorio', 255);
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
        Schema::dropIfExists('consultorios');
    }
};
