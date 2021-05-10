<?php

/*
 * No es apto para produccion, solo para practica
 * *************************************************
 * * (c) Migbert Yanez - migbertyanez@disroot.org  *
 * *************************************************
 * "La Verdad solo se puede encontrar en un lugar: El Codigo"
 */

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactoMailable extends Mailable
{
    use Queueable;
    use SerializesModels;

    public $subject = 'Informacion de Contacto';

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.contacto');
    }
}
