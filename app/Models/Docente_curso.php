<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente_curso extends Model
{
    use HasFactory;
    protected $table = 'docente_curso';
    public function cur()
    {
        return $this->belongsTo('App\Models\Curso', 'curso');
    }
    public function mate()
    {
        return $this->belongsTo('App\Models\Materia', 'materia');
    }
}
