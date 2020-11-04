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

    public function postulacion()
    {
        $data = [
            'title' => 'Postulación éxitosa',
            'subtitle' => 'Se ha postulado correctamente a la zona',
            'optionalText' => 'Limpiar Biblioteca',
            'text' => 'Recuerde que no podrá utilizar el sistema de postulación hasta recibir una respuesta. Sí pasados 5 días no se ha definido su estado de servicio, será rechazado automáticamente por el sistema y podrá postularse nuevamente.',
            'icon' => 'http://imgfz.com/i/jz7n5hB.png',
            'list' => 'no',
        ];
        $correo = ['kesanchez09@misena.edu.co'];
        Mail::to($correo)->send(new PruebaMail($data));

        return back();
    }

    public static function replace(User $user)
    {
        $data = [
            'title' => 'Reestablecimiento de foto de perfil',
            'subtitle' => 'La foto asociada a tu cuenta ha sido reestablecida por ser',
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
