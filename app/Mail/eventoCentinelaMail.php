<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class eventoCentinelaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $folio;
    public $unidadNombre;
    public $categoriaNombre;

    /**
     * Create a new message instance.
     */
    public function __construct($folio, $unidadNombre, $categoriaNombre)
    {
        //
        $this->folio = $folio;
        $this->unidadNombre = $unidadNombre;
        $this->categoriaNombre = $categoriaNombre;
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        return $this->markdown('emails.evento-centinela') // la vista del correo
                    ->subject('Evento Centinela')
                    ->from('soportewebssc@gmail.com', 'P.R.E.A. Coah'); // Correo y nombre del remitente
    }
}
