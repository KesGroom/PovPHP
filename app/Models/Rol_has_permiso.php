<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol_has_permiso extends Model
{
    use HasFactory;
    protected $table = 'roles_has_permisos';

    public function rol()
    {
        return $this->belongsTo('App\Models\Rol', 'rol');
    }
    public function permiso()
    {
        return $this->belongsTo('App\Models\Permiso', 'id');
    }
}
