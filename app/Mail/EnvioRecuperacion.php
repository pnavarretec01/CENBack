<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnvioRecuperacion extends Mailable
{
    use Queueable, SerializesModels;
    public $detalles;
    public $codigo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($detalles, $codigo)
    {
        $this->detalles = $detalles;
        $this->codigo = $codigo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nueva contraseña CNE')->view('email.correo');
        // return $this->subject('Nueva contraseña CNE')->view('email.CorreoRecuperacion');
    }
}
