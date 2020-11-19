<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    protected $table = 'estudiantes';
    public function user()
    {
        return $this->belongsTo('App\Models\User','id');
    }
}
