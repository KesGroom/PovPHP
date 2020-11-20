<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\MyResetPassword;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    public function roles()
    {
        return $this->belongsTo('App\Models\Rol', 'rol');
    }

    protected $fillable = [
        "id",
        "tipo_documento",
        'name',
        'apellido',
        'email',
        'fecha_nacimiento',
        'direccion',
        'telefono_fijo',
        'celular',
        'estado',
        'foto_perfil',
        'rol',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MyResetPassword($token));
    }
}
