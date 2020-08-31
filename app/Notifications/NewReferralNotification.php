<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewReferralNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->code = $data['code'];
        $this->recipient = $data['recipient'];
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
        $codeLine = sprintf('Haz sido referido por un amigo para disfrutar de los beneficios de "Pasa la voz WaffCake". Registrate con el código: %s', $this->code);
        $url = sprintf('/referidos?onlyCode=%s&recipient=%s', $this->code, $this->recipient);

        return (new MailMessage)
                    ->greeting('Hola!')
                    ->subject('Alguien te ha referido - Waff Cake')
                    ->line($codeLine)
                    ->action('Obtener Beneficios', url($url))
                    ->line('Gracias por usar nuestra aplicación!');
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
