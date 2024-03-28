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
         // php artisan db:seed --class=ApartmentsTableSeeder
         for ($i = 0; $i < 10; $i++) {
            $Apartments = new Apartments();
            $Apartments -> description = $faker->randomElement([
                            'Accogliente appartamento nel cuore della città, con vista mozzafiato sul skyline urbano.', 
                            'Casa vacanza con giardino privato e piscina, perfetta per una fuga rilassante in campagna.', 
                            'Appartamento moderno e luminoso, a pochi passi dalle principali attrazioni turistiche.', 
                            'Cottage rustico immerso nella natura, ideale per gli amanti del trekking e del relax.', 
                            'Villa di lusso con accesso diretto alla spiaggia, perfetta per una vacanza da sogno.',
                            'Loft elegante nel quartiere alla moda, circondato da boutique e ristoranti alla moda.',
                            'Chalet accogliente con camino e vista sulle montagne, perfetto per una vacanza invernale.',
                            'Casa tradizionale con cortile interno e terrazza panoramica, ideale per una vacanza in famiglia.',
                            'Bungalow sulla spiaggia con accesso privato al mare cristallino, ideale per gli amanti del sole.',
                            'Appartamento di design con arredi contemporanei e vista sul fiume, a pochi passi dai musei.',
                            'Casa colonica ristrutturata con vista sulle vigne, ideale per una vacanza enogastronomica.',
                            'Appartamento con terrazza panoramica sul tetto, perfetto per romantiche serate al chiaro di luna.',
                            'Chalet di montagna con sauna e jacuzzi, ideale per una vacanza all\'insegna del relax.',
                            'Appartamento al piano terra con accesso diretto al giardino comune, perfetto per famiglie con bambini.',
                            'Villa con piscina infinity e vista sul mare, per un\'esperienza di lusso indimenticabile.',
                            'Cottage con camino e vasca idromassaggio, perfetto per una fuga romantica nel bosco.',
                            'Appartamento in palazzo storico con affreschi originali, a due passi dalle principali attrazioni culturali.',]);
            $Apartments -> rooms = $faker->numberBetween(1, 10);
            $Apartments -> beds = $faker->numberBetween(1, 6);
            $Apartments -> image = $faker->image('public/storage', 400, 300, null, false);
            $Apartments -> bathrooms = $faker->numberBetween(1, 3);
            $Apartments -> square_meters = $faker->numberBetween(50, 200);
            $Apartments -> location = $faker->address;
            $Apartments -> visibility = 'Si';
            $Apartments -> longitude = $faker->longitude;
            $Apartments -> latitude = $faker->latitude;
            // $Apartments -> image_gallery = $faker->image('public/storage', 400, 300, null, false);
            $Apartments->save();
            }
    }
}
