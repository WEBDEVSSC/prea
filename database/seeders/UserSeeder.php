<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'ROOT PREA',
            'email' => 'soportewebcoah@gmail.com',
            'password' => Hash::make('PreaCoah0950$'), 
            'categoria' => 0,
            'nivel' => 1,
            'clues' => 'CLSSA002734',
            'clues_id' => 81,
            'clues_jurisdiccion' => 8,
            'clues_nombre' => 'HOSPITAL GENERAL DE SALTILLO',
            'clues_categoria' => 8,
            'cuasifalla' => 1,
            'adverso' => 1,
            'centinela' => 1,
            'reporte_semanal' => 1,
            'chat_id' => '00000000',
            'role' => 'admin'
        ]);
    }
}
