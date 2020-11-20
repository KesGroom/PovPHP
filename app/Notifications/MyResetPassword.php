<?php

namespace App\Notifications;

use App\Http\Controllers\MailController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class MyResetPassword extends Notification
{
    use Queueable;

    public $token;

    public static $createUrlCallback;

    public static $toMailCallback;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {

        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        if (static::$createUrlCallback) {
            $url = call_user_func(static::$createUrlCallback, $notifiable, $this->token);
        } else {
            $url = url(route('password.reset', [
                'token' => $this->token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));
        }

        // MailController::resetPass($url, $notifiable->getEmailForPasswordReset());

        return (new MailMessage)
            ->subject(Lang::get('Recuperar contraseña'))
            ->greeting(Lang::get('Hola,'))
            ->line(Lang::get('Estás recibiendo este correo porque hiciste una solicitud de recuperación de contraseña para tu cuenta.'))
            ->action(Lang::get('Recuperar contraseña'), $url)
            ->line(Lang::get('Este enlace de restablecimiento de la contraseña expirará en :count minutos.', ['count' => config('auth.passwords.' . config('auth.defaults.passwords') . '.expire')]))
            ->line(Lang::get('Si no realizaste esta solicitud, no se requiere realizar ninguna otra acción.'))
            ->salutation('Saludos, ' . 'María Cano IED');
    }

    public static function createUrlUsing($callback)
    {
        static::$createUrlCallback = $callback;
    }

    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }
}
