<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 80);
            $table->string('identificador', 6);
            $table->text('descripcion');
            $table->text('recursos');
            $table->enum('categoria', ['Actividad en clase', 'Tarea', 'Plan de mejoramiento']);
            $table->enum('estado', ['Activo', 'Inactivo']);
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
        Schema::dropIfExists('actividades');
    }
}
