<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


// PROGRAMAR EL ENVIO DEL REPORTE MENSUAL CADA DIA 1 DE MES A LAS 8 AM
Schedule::command('reporte:ejecutar')
    ->monthlyOn(9, '09:30');
