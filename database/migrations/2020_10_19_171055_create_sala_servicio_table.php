<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sala_servicio', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('estado', ['Activo', 'Inactivo']);
            $table->enum('estado_servicio', ['Aceptado', 'En espera', 'Rechazado', 'Terminado']);
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
        Schema::dropIfExists('sala_servicio');
    }
}
