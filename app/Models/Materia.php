<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;
    protected $table = 'materias';
    public function areaM()
    {
        return $this->belongsTo('App\Models\Area','area');
    }
}
