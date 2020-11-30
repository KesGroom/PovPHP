<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;
    protected $table = 'citas';
    public function AtencionPorArea()
    {
        return $this->belongsTo('App\Models\Atencion_area','atencion_area');
    }
}
