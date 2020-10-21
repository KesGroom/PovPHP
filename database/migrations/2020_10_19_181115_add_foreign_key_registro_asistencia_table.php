<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyRegistroAsistenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registro_asistencia', function (Blueprint $table) {
            $table->integer('periodo')->unsigned();
            $table->foreign('periodo')->references('id')->on('periodos')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->string('estudiante');
            $table->foreign('estudiante')->references('id')->on('estudiantes')
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
        Schema::table('registro_asistencia', function (Blueprint $table) {
            $table->dropForeign('registro_asistencia_periodos_id_foreign');
            $table->dropForeign('registro_asistencia_estudiantes_id_foreign');
            $table->dropForeign('registro_asistencia_docente_curso_id_foreign');
        });
    }
}
