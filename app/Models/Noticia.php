<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;
    protected $table = 'noticias';

    protected $fillable = [
        'titulo',
        'subtitulo',
        'informacion',
        'imagen',
        'coordinador'
    ];

    public function posted(){
       return $this->belongsTo('App\Models\User', 'coordinador');
    }
}
