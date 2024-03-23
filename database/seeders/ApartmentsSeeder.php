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
            $Apartments -> description = $faker->sentence;
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
