<?php

namespace Database\Seeders;

use App\Models\LinguaModel;
use Illuminate\Database\Seeder;

class LinguaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Run the languages
        $languageList = [
            ['lingua' => 'Kimbundu'],
            ['lingua' => 'Cokwé'],
            ['lingua' => 'Umbundu'],
            ['lingua' => 'Ngangela'],
            ['lingua' => 'Oshikwanyama'],
            ['lingua' => 'Olunyaneka'],
            ['lingua' => 'Kikongo'],
            ['lingua' => 'Lingala'],
            ['lingua' => 'Fiote'],
            ['lingua' => 'Ibinda'],
        ];

        foreach ($languageList as $language) {
            LinguaModel::updateOrCreate(
                ['lingua' => $language['lingua']],
                $language
            );
        }
    }
}
