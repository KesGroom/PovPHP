<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atencion_curso extends Model
{
    use HasFactory;
    protected $table = 'atencion_curso';
    public function doce()
    {
        return $this->belongsTo('App\Models\Docente_curso', 'docente');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'docente');
    }
    public function are()
    {
        return $this->belongsTo('App\Models\Area', 'area');
    }
    public function cur(){
        return $this->belongsTo('App\Models\Curso', 'curso');
    }
}
