<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Usuario Coordinador Sebastián
        $coor = new User();
        $coor->id = '1000624349';
        $coor->name = "Juan Sebastian";
        $coor->apellido = "Parra Loaiza";
        $coor->email = "admin@gmail.com";
        $coor->email_verified_at = now();
        $coor->fecha_nacimiento = "2002-10-14";
        $coor->direccion = "Primera de mayo con 30";
        $coor->celular = "310 792 9950";
        $coor->telefono_fijo = "802 1646";
        $coor->genero = "Masculino";
        $coor->password = bcrypt("admin");
        $coor->foto_perfil = "icon.png";
        $coor->estado = "Activo";
        $coor->tipo_documento= 'Cedula de ciudadania';
        $coor->rol = 1;
        $coor->remember_token = Str::random(10);
        $coor->save();
        //Usuario Coordinador Luisa(Kevin)
        $luisa = new User();
        $luisa->id = '1001196239';
        $luisa->name = "Luisa Fernanda";
        $luisa->apellido = "Bojacá Villar";
        $luisa->email = "lupeCoor@gmail.com";
        $luisa->email_verified_at = now();
        $luisa->fecha_nacimiento = "2000-07-19";
        $luisa->direccion = "Mochuelo Bajo - Cra 18D -15";
        $luisa->celular = "313 206 2311";
        $luisa->telefono_fijo = "200 8297";
        $luisa->genero = "Femenino";
        $luisa->password = bcrypt("Lupe15963");
        $luisa->foto_perfil = "icon.png";
        $luisa->estado = "Activo";
        $luisa->tipo_documento= 'Cedula de ciudadania';
        $luisa->rol = 1;
        $luisa->remember_token = Str::random(10);
        $luisa->save();
        //Usuario Docente Kevin
        $kevin = new User();
        $kevin->id = '1007228390';
        $kevin->name = "Kevin Esteven";
        $kevin->apellido = "Sánchez Gómez";
        $kevin->email = "kesgroom@gmail.com";
        $kevin->email_verified_at = now();
        $kevin->fecha_nacimiento = "1999-08-01";
        $kevin->direccion = "Cra 8 #48i - 49 SUR";
        $kevin->celular = "313 373 4481";
        $kevin->telefono_fijo = "200 8297";
        $kevin->genero = "Masculino";
        $kevin->password = bcrypt("Kesito080117");
        $kevin->foto_perfil = "icon.png";
        $kevin->estado = "Activo";
        $kevin->tipo_documento= 'Cedula de ciudadania';
        $kevin->rol = 2;
        $kevin->remember_token = Str::random(10);
        $kevin->save();
        //Usuario Acudiente Carlos(Kevin)
        $carlos = new User();
        $carlos->id = '16660323';
        $carlos->name = "Carlos Arturo";
        $carlos->apellido = "Gutierrez Lora";
        $carlos->email = "CarlosArturo@gmail.com";
        $carlos->email_verified_at = now();
        $carlos->fecha_nacimiento = "1989-05-19";
        $carlos->direccion = "TV 29 #87B - 4 SUR";
        $carlos->celular = "315 886 6007";
        $carlos->telefono_fijo = "744 1016";
        $carlos->genero = "Masculino";
        $carlos->password = bcrypt("CaAr8858");
        $carlos->foto_perfil = "icon.png";
        $carlos->estado = "Activo";
        $carlos->tipo_documento= 'Cedula de ciudadania';
        $carlos->rol = 4;
        $carlos->remember_token = Str::random(10);
        $carlos->save();
        //Usuario Estudiante Cesar(Kevin)
        $cesar = new User();
        $cesar->id = '1623102839';
        $cesar->name = "Cesar Andres";
        $cesar->apellido = "Gutierrez Lopez";
        $cesar->email = "CesarAndres@gmail.com";
        $cesar->email_verified_at = now();
        $cesar->fecha_nacimiento = "2003-08-08";
        $cesar->direccion = "TV 29 #87B - 4 SUR";
        $cesar->celular = "317 699 7423";
        $cesar->telefono_fijo = "744 1016";
        $cesar->genero = "Masculino";
        $cesar->password = bcrypt("Cesan88");
        $cesar->foto_perfil = "icon.png";
        $cesar->estado = "Activo";
        $cesar->tipo_documento= 'Tarjeta de identidad';
        $cesar->rol = 3;
        $cesar->remember_token = Str::random(10);
        $cesar->save();


    }
}
