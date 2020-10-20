<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyRegistroNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registro_notas', function (Blueprint $table) {
            $table->integer('actividad')->unsigned();
            $table->foreign('actividad')->references('id')->on('actividades')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('periodo')->unsigned();
            $table->foreign('periodo')->references('id')->on('periodos')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->string('estudiante');
            $table->foreign('estudiante')->references('id')->on('estudiantes')
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
        Schema::table('registro_notas', function (Blueprint $table) {
            $table->dropForeign('registro_notas_periodos_id_foreign');
            $table->dropForeign('registro_notas_estudiantes_id_foreign');
            $table->dropForeign('registro_notas_actividades_id_foreign');
        });
    }
}
