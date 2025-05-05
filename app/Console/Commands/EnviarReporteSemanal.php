<?php

namespace App\Console\Commands;

use App\Http\Controllers\ReporteController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;

class EnviarReporteSemanal extends Command
{
    protected $signature = 'reporte:ejecutar';
    protected $description = 'Genera y envía el reporte semanal PREA';

    public function handle()
    {
        // Instanciar el controlador y ejecutar el método
        $controller = App::make(ReporteController::class);
        $controller->generarReporteSemanalPDF();

        $this->info('Reporte semanal ejecutado correctamente.');
    }
}
