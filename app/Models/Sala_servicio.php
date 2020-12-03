<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala_servicio extends Model
{
    use HasFactory;
    protected $table = 'sala_servicio';

    public function zonaSS(){
        return $this->belongsTo('App\Models\Zona_servicio','zona_servicio');
    }
    public function estu(){
        return $this->belongsTo('App\Models\Estudiante', 'estudiante');
    }
}
