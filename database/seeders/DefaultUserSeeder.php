<?php

namespace Database\Seeders;

use App\Models\Utilizador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (App::environment('local')) {
            // Run the Default user seed
            Utilizador::updateOrCreate([
                'email' => 'fakemail@email.com',
                'nome' => 'Cykolomwenyo',
                'sobrenome' => 'Mulemvu',
                'password' => '123456',
            ]);
        }
    }
}
