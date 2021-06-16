<?php
namespace Database\Seeders;
use App\Dzialy;
use App\User;
use App\Kategorie;
use App\Info;
use App\Komunikaty;
use App\Memy;
use App\Miejsca;
use App\Tagi;
use App\Zagadnienia;
use App\Hasla;
use App\Znalezione;
use App\Media;
use App\Propozycje;
use App\Propozycje_uwagi;
use App\Zagadnienia_uwagi;
use App\Pliki;
use App\Linki;
use App\Bibliografia;
use App\Przypisy;
use App\Przekazdnia;


use Illuminate\Database\Seeder;
use PhpParser\Lexer\TokenEmulator\FlexibleDocStringEmulator;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
// pierw tworzymy testowego Admina
       User::factory()->admin()->create();
        User::factory()->count(12)->create();
        Dzialy::factory()->count(10)->create();
        Kategorie::factory()->count(40)->create();
        Info::factory()->count(18)->create();
        Komunikaty::factory()->count(14)->create();
        Memy::factory()->count(12)->create();
        Miejsca::factory()->count(20)->create();
        Tagi::factory()->count(12)->create();
        Znalezione::factory()->count(12)->create();
        Zagadnienia::factory()->count(25)->create();
       Hasla::factory()->count(25)->create();
        Media::factory()->count(17)->create();
        Pliki::factory()->count(50)->create();
         Linki::factory()->count(50)->create();
         Bibliografia::factory()->count(50)->create();
        Propozycje::factory()->count(30)->create();
        Propozycje_uwagi::factory()->count(100)->create();
        Zagadnienia_uwagi::factory()->count(100)->create();
       Przypisy::factory()->count(200)->create();
       Przekazdnia::factory()->count(20)->create();

    }
}
