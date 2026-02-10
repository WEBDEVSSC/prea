<?php

namespace App\Exports;

use App\Models\Evento;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class EventoExport implements FromView, WithStyles
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
        $eventos = Evento::whereBetween('fecha_hora', [$this->inicio, $this->fin])
                         ->orderBy('id', 'desc')
                         ->get();

        // Pasamos los eventos a la vista
        return view('export.eventos-export', [
            'eventos' => $eventos
        ]);
        
    }

    public function styles(Worksheet $sheet)
    {
        return [

            // ID
            'A1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '1F77B4']]],

            // FECHA
            'B1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => 'FF7F0E']]],
            'C1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => 'FF7F0E']]],
            'D1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => 'FF7F0E']]],
            'E1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => 'FF7F0E']]],
            'F1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => 'FF7F0E']]],
            'G1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => 'FF7F0E']]],
            'H1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => 'FF7F0E']]],

            'I1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '2CA02C']]],
            'J1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '2CA02C']]],
            'K1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '2CA02C']]],
            'L1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '2CA02C']]],
            'M1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '2CA02C']]],
            'N1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '2CA02C']]],
            'O1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '2CA02C']]],

            'P1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => 'D62728']]],

            'Q1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '9467BD']]],
            'R1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '9467BD']]],
            'S1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '9467BD']]],

            'T1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '8C564B']]],

            'U1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => 'E6C229']]],
            'V1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => 'E6C229']]],
            'W1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => 'E6C229']]],
            'X1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => 'E6C229']]],
            'Y1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => 'E6C229']]],
            'Z1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => 'E6C229']]],
            'AA1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => 'E6C229']]],

            'AB1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '2CA8E0']]],
            'AC1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '2CA8E0']]],
            'AD1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '2CA8E0']]],
            'AE1' => ['fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '2CA8E0']]],
        ];
    }
}
