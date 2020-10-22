<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyAgendaWebTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agenda_web', function (Blueprint $table) {
            $table->integer('docente_curso')->unsigned();
            $table->foreign('docente_curso')->references('id')->on('docente_curso')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->string('estudiante', 10);
            $table->foreign('estudiante')->references('id')->on('estudiantes')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('actividad')->unsigned()->nullable();
            $table->foreign('actividad')->references('id')->on('actividades')
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
        Schema::table('agenda_web', function (Blueprint $table) {
            $table->dropForeign('agenda_web_docente_curso_id_foreign');
            $table->dropForeign('agenda_web_estudiantes_id_foreign');
            $table->dropForeign('agenda_web_actividades_id_foreign');
        });
    }
}
