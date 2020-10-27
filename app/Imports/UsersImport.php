<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    use Importable;
    public function model(array $row)
    {
        return new User([
            'tipo_documento'     => $row['tipo_documento'],
            'id'     => $row['id'],
            'name'     => $row['name'],
            'apellido' => $row['apellido'],
            'email'    => $row['email'],
            'fecha_nacimiento'    => $row['fecha_nacimiento'],
            'direccion'    => $row['direccion'],
            'celular'    => $row['celular'],
            'telefono_fijo'    => $row['telefono_fijo'],
            'genero'    => $row['genero'],
            'rol'    => $row['rol'],
            'estado' => 'Activo',
            'foto_perfil' => 'icon.png',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);
    }
}
