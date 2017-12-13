<?php

namespace App\Listeners;

use App\User;
use App\Events\CrearPractica;
use App\Notifications\PracticaPublicada;
use Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificarNuevaPractica implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CrearPractica  $event
     * @return void
     */
    public function handle(CrearPractica $event)
    {
        //
        $users = User::all();

        //dd($users);

        Notification::send($users, new PracticaPublicada($event->practica));

    }
}
