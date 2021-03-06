<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro_nota extends Model
{
    use HasFactory;
    protected $table = 'registro_notas';
    public function activity()
    {
        return $this->belongsTo('App\Models\Actividad', 'actividad');
    }
}
