<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyRolesHasPermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles_has_permisos', function (Blueprint $table) {
            $table->integer('rol')->unsigned();
            $table->foreign('rol')->references('id')->on('roles')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('permiso')->unsigned();
            $table->foreign('permiso')->references('id')->on('permisos')
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
        Schema::table('roles_has_permisos', function (Blueprint $table) {
            $table->dropForeign('roles_has_permisos_rol_id_foreign');
            $table->dropForeign('roles_has_permisos_permiso_id_foreign');
        });
    }
}
