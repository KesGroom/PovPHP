<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;
    protected $table = 'permisos';

    public function rol_has_permiso()
    {
        return $this->hasMany('App\Models\Rol_has_permiso');
    }
}
