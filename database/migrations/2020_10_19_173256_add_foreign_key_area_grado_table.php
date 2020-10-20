<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyAreaGradoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('area_grado', function (Blueprint $table) {
            $table->integer('area')->unsigned();
            $table->foreign('area')->references('id')->on('areas')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->integer('grado')->unsigned();
            $table->foreign('grado')->references('id')->on('grados')
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
        Schema::table('area_grado', function (Blueprint $table) {
            $table->dropForeign('area_grado_area_id_foreign');
            $table->dropForeign('area_grado_grado_id_foreign');
        });
    }
}
