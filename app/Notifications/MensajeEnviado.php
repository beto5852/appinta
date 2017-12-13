<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MensajeEnviado extends Notification
{

    protected $mensaje;

    use Queueable;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mensaje)
    {
        //
        $this->mensaje = $mensaje;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
       /* return (new MailMessage)
                    ->greeting($notifiable->name.',')
                    ->subject('Mensaje recibido desde APPINTA')
                    ->line('Has recibido un mensaje')
                    ->action('Click aqui para ver el mensaje', url('admin/mensajes/'.$this->mensaje->id))
                    ->line('Gracias por usar nuestra APPINTA');*/
        return(new MailMessage)->view('admin.email.notificacion',[
            'msg' => $this->mensaje,
            'user' => $notifiable
        ])->subject('Mensaje recibido desde APPINTA');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return[
            'link' => url('admin/mensajes/'.$this->mensaje->id),
            'text' => "Has recibido un mensaje de:" . $this->mensaje->sender->name,
        ];
    }
}
