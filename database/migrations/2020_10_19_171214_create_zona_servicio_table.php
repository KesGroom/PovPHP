<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZonaServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zona_servicio', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('estado', ['Activo', 'Inactivo', 'Bloqueado']);
            $table->string('nombre_zona', 50);
            $table->string('lugar', 50);
            $table->string('encargado', 100);
            $table->time('hora_entrada');
            $table->time('hora_salida');
            $table->integer('tiempo_servicio');
            $table->integer('cupos');
            $table->string('labores');
            $table->string('dias_servicio', 80);
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
        Schema::dropIfExists('zona_servicio');
    }
}
