<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
 /**
 * Get the author of the post.
 */
public function grados()
{
    return $this->belongsTo(Grado::class)->withDefault([
        'name' => 'Nadie',
        'telefono' => 'Nadie',
        'email' => 'Nadie',
    ]);
}

/**
 * Get the author of the post.
 */
// public function grado()
// {
//     return $this->belongsTo('App\Models\User')->withDefault(function ($user, $post) {
//         $user->name = 'Guest Author';
//     });
// }
   

}
