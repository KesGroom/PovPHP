<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acudiente extends Model
{
    use HasFactory;
    protected $table = 'acudientes';
   
    // este si funciona XD
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id');
    }
    
    
}
