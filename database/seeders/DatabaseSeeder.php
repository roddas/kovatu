<?php

namespace Database\Seeders;

use App\Models\Utilizador;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Utilizador::updateOrCreate([
            'email' => 'fakemail@email.com',
            'nome' => 'Cykolomwenyo',
            'sobrenome' => 'Mulemvu',
            'password' => '123456',
        ]);
    }
}
