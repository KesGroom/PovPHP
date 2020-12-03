<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pqrs extends Model
{
    use HasFactory;
    protected $table = 'pqrs';

    public function acudientes()
    {
        return $this->belongsTo('App\Models\Acudiente', 'acudiente');
    }

    public function coor(){
        return $this->belongsTo('App\Models\User', 'coordinador');
    }
}
