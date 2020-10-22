<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol_has_permiso extends Model
{
    use HasFactory;
    protected $table = 'roles_has_permisos';

    public function roles()
    {
        return $this->belongsTo('App\Models\Rol', 'rol');
    }
    public function permisos()
    {
        return $this->belongsTo('App\Models\Permiso', 'permiso');
    }
}
