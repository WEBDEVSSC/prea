<?php

namespace App\Console\Commands;

use App\Http\Controllers\ReporteController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;

class EnviarReporteMensual extends Command
{
    protected $signature = 'reporte:ejecutar';
    protected $description = 'Genera y envía el reporte Mensual PREA';

    public function handle()
    {
        // Instanciar el controlador y ejecutar el método
        $controller = App::make(ReporteController::class);
        $controller->generarReporteMensualPDF();

        $this->info('Reporte mensual ejecutado correctamente.');
    }
}
