<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente_curso extends Model
{
    use HasFactory;
    protected $table = 'docente_curso';
    public function usuario()
    {
        return $this->belongsTo('App\Models\User', 'docente');
    }
    public function cur()
    {
        return $this->belongsTo('App\Models\Curso', 'curso');
    }
    public function mate()
    {
        return $this->belongsTo('App\Models\Materia', 'materia');
    }
    public function are()
    {
        return $this->belongsTo('App\Models\Area', 'area');
    }
}
