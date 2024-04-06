<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sponsor;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sponsor::create([
            'name' => 'Base',
            'price' => 2.99,
            'duration' => 24
        ]);

        Sponsor::create([
            'name' => 'Medio',
            'price' => 5.99,
            'duration' => 72
        ]);

        Sponsor::create([
            'name' => 'Avanzato',
            'price' => 9.99,
            'duration' => 144
        ]);
    }
}
