<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro_asistencia extends Model
{
    use HasFactory;
    protected $table = 'registro_asistencia';
    public function student()
    {
        return $this->belongsTo('App\Models\Estudiante', 'Estudiante');
    }
}
