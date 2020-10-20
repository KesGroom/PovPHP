<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('citas', function (Blueprint $table) {
            $table->string('acudiente');
            $table->foreign('acudiente')->references('id')->on('acudientes')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('atencion_area')->nullable()->unsigned();
            $table->foreign('atencion_area')->references('id')->on('atencion_area')
                ->onDelete('cascade')->onUpdate('cascade');
                
            $table->integer('atencion_curso')->nullable()->unsigned();
            $table->foreign('atencion_curso')->references('id')->on('atencion_curso')
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
        Schema::table('citas', function (Blueprint $table) {
            $table->dropForeign('citas_acudientes_id_foreign');
            $table->dropForeign('citas_atencion_area_id_foreign');
            $table->dropForeign('citas_atencion_curso_foreign');
        });
    }
}
