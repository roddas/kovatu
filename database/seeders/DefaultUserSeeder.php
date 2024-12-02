<?php

namespace Database\Seeders;

use App\Models\Utilizador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Run the Default user seed
        Utilizador::updateOrCreate([
            'email' => 'fakemail@email.com',
            'nome' => 'Cykolomwenyo',
            'sobrenome' => 'Mulemvu',
            'password' => '123456',
        ]);
    }
}
