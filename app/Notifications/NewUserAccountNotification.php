<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;

class NewUserAccountNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->login = $data['login'];
        $this->pass = $data['pass'];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $loginLine = sprintf('Los datos de acceso son tu correo electrónico %s y tu contraseña: %s', $this->login, $this->pass);
        
        return (new MailMessage)
                    ->greeting('Bienvenido!')
                    ->subject('Una cuenta ha sido creada - Waff Cake')
                    ->line('Estás registrado en nuestro programa de beneficios Waffcake,utiliza el botón para ingresar a la plataforma:')
                    ->action('Ingresar', url('/'))
                    ->line($loginLine)
                    ->line(new HtmlString('<br/>'))
                    ->line('Conoce tu código y comienza a disfrutar del sabor wafflero con descuentos especiales. Recuerda que lo activas con tu primera compra.')
                    ->line(new HtmlString('<br/>'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
