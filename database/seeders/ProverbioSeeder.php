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
            $proverbios = [
                [
                    'proverbio' => 'Khanda wamba ngwo nguli munene, khumana aliko kanahiana.',
                    'interpretacao' => 'Não digas que és grande, enquanto há maiores.',
                    'uid' => $userId,
                    'lingua' => 'Cokwé',
                ],
                [
                    'proverbio' => 'Uli kulutwe kexi kumuteta mucila.',
                    'interpretacao' => 'Não se deve cortar a cauda a quem está em frente. Não estime quem estiver em frente, pois quem estiver a seguí-lo, pode ser o melhor ou primeiro a chegar à meta.',
                    'uid' => $userId,
                    'lingua' => 'Cokwé',
                ],
                [
                    'proverbio' => 'K\'ono kwatota, omanu valuka.',
                    'interpretacao' => 'Secou a nascente do rio, as pessoas mudam de lugar. Há uma relação de causa e efeito entre a existência de um rio e a constituição de aglomerados populacionais nas suas proximidades. A água é indispensável para a sedentarização dos homens e quando a fonte seca parte-se à procura de outro lugar.',
                    'uid' => $userId,
                    'lingua' => 'Umbundu',
                ],
                [
                    'proverbio' => "Onjimbo l'elungi, omunu l'onjo",
                    'interpretacao' => 'O papa-formigas vive na cova, a pessoa habita uma casa. Um animal como o papa-formigas vive em qualquer cova que encontrar já a pessoa tem sempre uma casa. Enquanto as covas abundam na selva, os homens constroem as casas de acordo com as suas necessidades. Os animais não transformam a natureza como os homens. A dignidade da pessoa não se confunde com o modo de vida dos animais.',
                    'uid' => $userId,
                    'lingua' => 'Umbundu',
                ],
                [
                    'proverbio' => 'Kana tala ndundu, vetamena ndundu, ndundu kataliwangwa yole ko (= mbala zole ko)',
                    'interpretacao' => 'Se olhares para um albino, baixa os teus olhos, pois não se deve fitar o albino duas vezes. O provérbio aconselha-nos a não fixar um olhar assustador numa pessoa que nos pareceria diferente pela sua natureza, pois a nossa atitude seria percebida como inamigável e agressiva contra a sua pessoa e geraria uma forte repuisão da sua parte.',
                    'uid' => $userId,
                    'lingua' => 'Kikongo',
                ],
                [
                    'proverbio' => 'Dya lunda toma kwatoma',
                    'interpretacao' => "Comer e conservar algo para amanhã é ser previdente. «Hoje é o pai da amanhã»",
                    'uid' => $userId,
                    'lingua' => 'Kikongo',
                ],
                [
                    'proverbio' => "Afwidi mu vita ka ena lutangu ko, mun'atukidi ena ye lutangu lwau",
                    'interpretacao' => "Os que morreram na guerra são inumeráveis. Contudo, são conhecidos pelas suas familias pelos seus nomes e números. Assim, durante a guerra, as famílias conhecem e choram os seus entes queridos mortos pela pátria, enquanto o estado os regista pelos seus nomes e soma o seu número. — Cada estado deve honrar os seus filhos tombados no campo de batalha pela defesa do país e cada povo deve lembrar-se dos seus mártires.",
                    'uid' => $userId,
                    'lingua' => 'Kikongo',
                ],

            ];

            foreach ($proverbios as $proverbio) {
                ProverbioModel::create($proverbio);
            }
        }
    }
}
