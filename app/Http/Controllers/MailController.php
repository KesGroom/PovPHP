<?php

namespace App\Http\Controllers;

use App\Mail\PruebaMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function layout()
    {
        return view('mail.index');
    }

    public static function postulacion()
    {
        $data = [
            'title' => 'Postulación éxitosa',
            'subtitle' => 'Se ha postulado correctamente a la zona',
            'optionCheck' => 'yes',
            'btnCheck' => 'no',
            'optionalText' => 'Limpiar Biblioteca',
            'text' => 'Recuerde que no podrá utilizar el sistema de postulación hasta recibir una respuesta. Sí pasados 5 días no se ha definido su estado de servicio, será rechazado automáticamente por el sistema y podrá postularse nuevamente.',
            'icon' => 'http://imgfz.com/i/jz7n5hB.png',
            'list' => 'no',
        ];
        $correo = ['kesanchez09@misena.edu.co'];
        Mail::to($correo)->send(new PruebaMail($data));

        return back();
    }

    public static function resetPass($url, $email)
    {
        $text = 'Este enlace de restablecimiento de la contraseña expirará en 60 minutos. Si no realizaste esta solicitud, no se requiere realizar ninguna otra acción.';
        $data = [
            'title' => 'Restablecer contraseña',
            'subtitle' => 'Solicitud de recuperación de contraseña para tu cuenta.',
            'optionCheck' => 'no',
            'btnCheck' => 'yes',
            'btnText' => 'Restablecer contraseña',
            'btnUrl' => $url,
            'text' => $text,
            'icon' => 'http://imgfz.com/i/jz7n5hB.png',
            'list' => 'no',
        ];
        $correo = $email;
        Mail::to($correo)->send(new PruebaMail($data));

        return back();
    }

    public static function replace(User $user)
    {
        $data = [
            'title' => 'Reestablecimiento de foto de perfil',
            'subtitle' => 'La foto asociada a tu cuenta ha sido reestablecida por ser',
            'btnCheck' => 'no',
            'optionCheck' => 'yes',
            'optionalText' => 'Inapropiada',
            'text' => 'Se le recuerda que las normas de la institución estipulan que su imagen de perfil debe cumplir los siguientes requisitos:',
            'icon' => 'http://imgfz.com/i/Yph3tyu.png',
            'list' => 'yes',
            'item1' => 'Solo debe verse una persona.',
            'item2' => 'El rostro se debe visualizar completamente.',
            'item3' => 'No se pueden usar filtros que afecten el reconocimineto de la persona.',
            'item4' => 'Debe estar lo suficientemente iluminada.',
            'final' => 'Le invitamos a elegir una imagen que cumpla estos requisitos.',
        ];

        $correo = $user->email;
        Mail::to($correo)->send(new PruebaMail($data));

        return back();
    }
}
