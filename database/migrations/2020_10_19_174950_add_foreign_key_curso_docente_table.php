<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyCursoDocenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('docente_curso', function (Blueprint $table) {
            $table->string('docente');
            $table->foreign('docente')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('curso')->unsigned();
            $table->foreign('curso')->references('id')->on('cursos')
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
        Schema::table('docente_curso', function (Blueprint $table) {
            $table->dropForeign('docente_curso_users_id_foreign');
            $table->dropForeign('docente_curso_curso_id_foreign');
        });
    }
}
