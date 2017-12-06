<?php

namespace App\Notifications;

use App\Practica;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PracticaPublicada extends Notification
{
    protected $practica;
    use Queueable;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Practica $practica)
    {
        //
        $this->practica = $practica;
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
        return (new MailMessage)
                    ->subject('Nueva práctica publicada')
                    ->line($notifiable->name.', Hemos publicado una nueva práctica argricola')
                    ->action($this->practica->nombre_practica, route('practicas.show',$this->practica))
                    ->line('Gracias por actualizarte con nosotros');
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
