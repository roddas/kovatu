<?php

namespace Database\Seeders;

use App\Models\QuotesModel as ProverbioModel;
use App\Models\Utilizador;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use PHPUnit\TextUI\XmlConfiguration\Logging\Logging;

class ProverbioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (App::environment('local')) {
            $userId = DB::table('utilizador')->select('uid')->where('email', 'fakemail@email.com')->get()[0]->uid;
            $proverbios = [];
        }
    }
}
