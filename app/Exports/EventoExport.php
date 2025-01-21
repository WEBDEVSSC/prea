<?php

namespace App\Exports;

use App\Models\Evento;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EventoExport implements FromView
{
    protected $inicio;
    protected $fin;

    // Recibimos las fechas de inicio y fin
    public function __construct($inicio, $fin)
    {
        $this->inicio = $inicio;
        $this->fin = $fin;
    }

    public function view(): View
    {
        // Filtramos los eventos por el rango de fechas
        $eventos = Evento::whereBetween('created_at', [$this->inicio, $this->fin])
                         ->orderBy('id', 'desc')
                         ->get();

        // Pasamos los eventos a la vista
        return view('export.eventos-export', [
            'eventos' => $eventos
        ]);
        
    }
}
