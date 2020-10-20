<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyAtencionCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('atencion_curso', function (Blueprint $table) {
            $table->string('docente');
            $table->foreign('docente')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->integer('area')->unsigned();
            $table->foreign('area')->references('id')->on('areas')
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
        Schema::table('atencion_curso', function (Blueprint $table) {
            $table->dropForeign('atencion_curso_users_id_foreign');
            $table->dropForeign('atencion_curso_areas_id_foreign');
        });
    }
}
