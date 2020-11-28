<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente_materia extends Model
{
    use HasFactory;
    protected $table = 'docente_materia';
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id');
    }
}
