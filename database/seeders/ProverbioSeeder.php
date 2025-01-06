<?php

namespace Database\Seeders;

use App\Models\QuotesModel as ProverbioModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;


class ProverbioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (App::environment('local')) {
            $proverbios = [];
        }
    }
}
