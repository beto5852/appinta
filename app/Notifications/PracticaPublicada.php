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
        return ['database','mail'];
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
                    ->action($this->practica->nombre_practica, route('admin.home.timelinemore',$this->practica->slug))
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
            'link' => url('admin/timelinemore/'.$this->practica->slug),
            'text' => 'Hemos publicado una práctica agricola: '.$this->practica->nombre_practica,
        ];
    }
}
