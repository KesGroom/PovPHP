<?php

namespace Database\Seeders;

use App\Models\User as ModelsUser;
use Illuminate\Database\Seeder;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new ModelsUser();
        $user->id =1000624349;
        $user->name ="Juan Sebastian";
        $user->apellido ="Juan Sebastian";
        $user->email ="admin@gmail.com";
        $user->fecha_nacimiento ="2020-10-14";
        $user->direccion ="Primera de mayo con 30";
        $user->celular ="3107929950";
        $user->telefono_fijo ="8021646";
        $user->genero ="Masculino";
        $user->password =bcrypt("admin");
        $user->foto_perfil ="hola";
        $user->estado ="Activo";
        $user->rol =1;
        $user->save();

    }
}
