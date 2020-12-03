<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyPqrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pqrs', function (Blueprint $table) {
            $table->string('coordinador')->nullable();
            $table->foreign('coordinador')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->string('acudiente');
            $table->foreign('acudiente')->references('id')->on('acudientes')
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
        Schema::table('pqrs', function (Blueprint $table) {
            $table->dropForeign('pqrs_acudientes_id_foreign');
            $table->dropForeign('pqrs_coordinador_id_foreign');
        });
    }
}
