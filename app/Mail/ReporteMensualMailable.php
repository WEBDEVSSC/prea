<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReporteMensualMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $rutaPDF;
    public $fechaInicio;
    public $fechaFin;

    public function __construct($nombre, $rutaPDF, $fechaInicio, $fechaFin)
    {
        $this->nombre = $nombre;
        $this->rutaPDF = $rutaPDF;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
    }

    public function build()
    {
        return $this->markdown('emails.reporte-mensual')
                    ->subject('Reporte Mensual PREA')
                    ->attachFromStorage($this->rutaPDF)
                
                ->with([
                    'nombre' => $this->nombre,
                    'fechaInicio' => $this->fechaInicio,
                    'fechaFin' => $this->fechaFin,
                ]);
    }
}
