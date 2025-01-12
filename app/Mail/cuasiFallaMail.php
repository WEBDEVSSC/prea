<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class cuasiFallaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $folio;

    /**
     * Create a new message instance.
     */
    public function __construct($folio)
    {
        //
        $this->folio = $folio;
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
        return $this->markdown('emails.cuasi-falla') // la vista del correo
                    ->subject('Cuasi-Falla')
                    ->from('soportewebssc@gmail.com', 'P.R.E.A. Coah'); // Correo y nombre del remitente
    }
}
