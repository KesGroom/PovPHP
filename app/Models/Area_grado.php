<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area_grado extends Model
{
    use HasFactory;
    protected $table = 'area_grado';

    public function area(){
        return $this->belongsTo('App\Models\Area', 'area');
    }
    public function grado(){
        return $this->belongsTo('App\Models\Grado', 'grado');
    }
}
