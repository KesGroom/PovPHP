<?php

namespace App\Http\Controllers;

use App\Mail\PruebaMail;
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
            'title' => 'Postulación',
            'subtitle' => 'Se ha postulado correctamente a la zona',
            'optionalText' => 'Limpiar Biblioteca',
            'text' => 'Recuerde que no podrá utilizar el sistema de postulación hasta recibir una respuesta. 
            Sí pasados 5 días no se ha definido su estado de servicio, será rechazado automáticamente por el sistema y podrá postularse nuevamente.',
            'icon' => 'fa-hourglass',
        ];

        // $correo = ['jusagaro28@gmail.com', 'mariacano.pov@gmail.com', 'kesgroom@gmail.com', 'jusagaro@misena.edu.co', 'villargarcia19@gmail.com'];
        $correo = ['mariacano.pov@gmail.com'];
        Mail::to($correo)->send(new PruebaMail($data));

        return back();
    }
}
