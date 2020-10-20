<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeySalaServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sala_servicio', function (Blueprint $table) {
            $table->string('estudiante');
            $table->foreign('estudiante')->references('id')->on('estudiantes')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('zona_servicio')->unsigned();
            $table->foreign('zona_servicio')->references('id')->on('zona_servicio')
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
        Schema::table('sala_servicio', function (Blueprint $table) {
            $table->dropForeign('sala_servicio_estudiante_foreign');
            $table->dropForeign('sala_servicio_zona_servicio_foreign');
        });
    }
}
