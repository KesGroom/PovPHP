<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id', 10)->primary()->unique();
            $table->string('name', 50);
            $table->string('apellido', 50);
            $table->string('email', 50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->date('fecha_nacimiento');
            $table->string('direccion', 50);
            $table->string('celular', 12);
            $table->string('telefono_fijo', 8)->nullable();
            $table->enum('genero', ['Masculino', 'Femenino']);
            $table->string('password');
            $table->string('foto_perfil',100);
            $table->enum('estado', ['Activo', 'Inactivo']);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
