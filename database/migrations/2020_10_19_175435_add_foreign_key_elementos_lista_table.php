<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyElementosListaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('elementos_lista', function (Blueprint $table) {
            $table->integer('area')->unsigned();
            $table->foreign('area')->references('id')->on('area_grado')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('materia')->unsigned();
            $table->foreign('materia')->references('id')->on('materias')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('zona_servicio')->unsigned();
            $table->foreign('zona_servicio')->references('id')->on('zona_servicio')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('elementos_lista', function (Blueprint $table) {
            $table->dropForeign('elementos_lista_area_id_foreign');
            $table->dropForeign('elementos_lista_materia_id_foreign');
            $table->dropForeign('elementos_lista_zona_servicio_id_foreign');
        });
    }
}
