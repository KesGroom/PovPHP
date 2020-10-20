<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyHorarioClaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('horario_clase', function (Blueprint $table) {
            $table->integer('docente_materia')->unsigned();
            $table->foreign('docente_materia')->references('id')->on('docente_materia')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('docente_curso')->unsigned();
            $table->foreign('docente_curso')->references('id')->on('docente_curso')
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
        Schema::table('horario_clase', function (Blueprint $table) {
            $table->dropForeign('horario_clase_docente_curso_id_foreign');
            $table->dropForeign('horario_clase_docente_materia_id_foreign');
        });
    }
}
