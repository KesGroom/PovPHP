<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtencionCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atencion_curso', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('estado', ['Activo', 'Inactivo']);
            $table->integer('diaSemana');
            $table->time('hora_inicio_atencion');
            $table->time('hora_final_atencion');
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
        Schema::dropIfExists('atencion_curso');
    }
}
