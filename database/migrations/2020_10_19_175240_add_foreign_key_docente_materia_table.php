<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyDocenteMateriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('docente_materia', function (Blueprint $table) {
            $table->string('docente');
            $table->foreign('docente')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('materia')->unsigned();
            $table->foreign('materia')->references('id')->on('materias')
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
        Schema::table('docente_materia', function (Blueprint $table) {
            $table->dropForeign('docente_materia_users_id_foreign');
            $table->dropForeign('docente_materia_materias_id_foreign');
        });
    }
}
