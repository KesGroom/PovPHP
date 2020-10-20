<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyBitacoraServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bitacora_servicio', function (Blueprint $table) {
            $table->string('coordinador');
            $table->foreign('coordinador')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('sala_servicio')->unsigned();
            $table->foreign('sala_servicio')->references('id')->on('sala_servicio')
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
        Schema::table('bitacora_servicio', function (Blueprint $table) {
            $table->dropForeign('bitacora_servicio_users_id_foreign');
            $table->dropForeign('bitacora_servicio_sala_servicio_id_foreign');
        });
    }
}
