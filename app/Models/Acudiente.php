<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acudiente extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Nadie',
            'telefono' => 'Nadie',
            'email' => 'Nadie',
        ]);
    }
    use HasFactory;
    protected $table = 'acudientes';
}
