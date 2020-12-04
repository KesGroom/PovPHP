<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora_servicio extends Model
{
    use HasFactory;
    protected $table = 'bitacora_servicio';

    public function salaSS(){
        return $this->belongsTo('App\Models\Sala_servicio', 'sala_servicio');
    }
    public function coor(){
        return $this->belongsTo('App\Models\User', 'coordinador');
    }
}

