<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyEstudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estudiantes', function (Blueprint $table) {
            $table->string('id',10)->primary()->unique();
            $table->foreign('id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->string('acudiente');
            $table->foreign('acudiente')->references('id')->on('acudientes')
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
        Schema::table('estudiantes', function (Blueprint $table) {
            $table->dropForeign('estudiantes_users_id_foreign');
            $table->dropForeign('estudiantes_acudientes_id_foreign');
            $table->dropForeign('estudiantes_cursos_id_foreign');
        });
    }
}
