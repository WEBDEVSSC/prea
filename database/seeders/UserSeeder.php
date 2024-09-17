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
        ]);
    }
}
