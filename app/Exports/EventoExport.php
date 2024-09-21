<?php

namespace App\Exports;

use App\Models\Evento;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class EventoExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    /*public function collection()
    {
        // Asi se descarga la base de datos en crudo
        return Evento::orderBy('id', 'desc')->get();

        
    }*/

    public function view(): View
    {
        return view('export.eventos-export',[
            'eventos'=> Evento::orderBy('id', 'desc')->get()
        ]);
    }
}
