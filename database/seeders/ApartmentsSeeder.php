<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Apartments;
class ApartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        

        $case_airbnb = [
            "1" => "Accogliente appartamento nel cuore della città, con vista mozzafiato sul skyline urbano.",
            "2" => "Casa vacanza con giardino privato e piscina, perfetta per una fuga rilassante in campagna.",
            "3" => "Appartamento moderno e luminoso, a pochi passi dalle principali attrazioni turistiche.",
            "4" => "Cottage rustico immerso nella natura, ideale per gli amanti del trekking e del relax.",
            "5" => "Villa di lusso con accesso diretto alla spiaggia, perfetta per una vacanza da sogno.",
            "6" => "Loft elegante nel quartiere alla moda, circondato da boutique e ristoranti alla moda.",
            "7" => "Chalet accogliente con camino e vista sulle montagne, perfetto per una vacanza invernale.",
            "8" => "Appartamento in stile vintage nel cuore del centro storico, con tutti i comfort moderni.",
            "9" => "Casa tradizionale con cortile interno e terrazza panoramica, ideale per una vacanza in famiglia.",
            "10" => "Bungalow sulla spiaggia con accesso privato al mare cristallino, ideale per gli amanti del sole.",
            "11" => "Appartamento di design con arredi contemporanei e vista sul fiume, a pochi passi dai musei.",
            "12" => "Villetta con giardino tropicale e piscina, perfetta per una fuga esotica.",
            "13" => "Casa colonica ristrutturata con vista sulle vigne, ideale per una vacanza enogastronomica.",
            "14" => "Appartamento con terrazza panoramica sul tetto, perfetto per romantiche serate al chiaro di luna.",
            "15" => "Chalet di montagna con sauna e jacuzzi, ideale per una vacanza all'insegna del relax.",
            "16" => "Appartamento al piano terra con accesso diretto al giardino comune, perfetto per famiglie con bambini.",
            "17" => "Villa con piscina infinity e vista sul mare, per un'esperienza di lusso indimenticabile.",
            "18" => "Loft spazioso con soffitti alti e ampie vetrate, ideale per artisti e creativi.",
            "19" => "Cottage con camino e vasca idromassaggio, perfetto per una fuga romantica nel bosco.",
            "20" => "Appartamento in palazzo storico con affreschi originali, a due passi dalle principali attrazioni culturali."
        ];

// Esempio di utilizzo:
echo $case_airbnb[rand(1, 20)];

         // php artisan db:seed --class=ApartmentsTableSeeder
         for ($i = 0; $i < 20; $i++) {

            $Apartments = new Apartments();
            $random_description = $case_airbnb[array_rand($case_airbnb)]; // Scegli una descrizione casuale dall'array
            $Apartments -> $random_description = $case_airbnb[array_rand($case_airbnb)]; // Scegli una descrizione casuale dall'array;
            $Apartments -> rooms = $faker->numberBetween(1, 5);
            $Apartments -> beds = $faker->numberBetween(1, 4);
            $Apartments -> image = $faker->image('public/storage', 400, 300, null, false);
            $Apartments -> bathrooms = $faker->numberBetween(1, 3);
            $Apartments -> square_meters = $faker->numberBetween(50, 200);
            $Apartments -> location = $faker->address;
            $Apartments -> visibility = 'Si';
            $Apartments -> longitudine = $faker->longitude;
            $Apartments -> latitudine = $faker->latitude;
            // $Apartments -> image_gallery = $faker->image('public/storage', 400, 300, null, false);
            $Apartments->save();
            }
    }
}
