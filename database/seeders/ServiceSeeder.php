<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                "name" => "Aria Condizionata",
                "icon" => "fa-regular fa-snowflake",
            ],
            [
                "name" => "WiFI",
                "icon" =>   "fa-solid fa-wifi",
            ],
            [
                "name" => "Piscina",
                "icon" => "fa-solid fa-person-swimming",
            ],
            [
                "name" => "Tv",
                "icon" => "fa-solid fa-tv",
            ],
            [
                "name" => "Macchina del caffè",
                "icon" => "fa-solid fa-mug-saucer",
            ],
            [
                "name" => "Griglia per barbeque",
                "icon" => "fa-solid fa-fire-burner",
            ],
            [
                "name" => "Parcheggio privato",
                "icon" => "fa-solid fa-square-parking",
            ],
            [
                "name" => "Lavatrice",
                "icon" => "fa-solid fa-jug-detergent",
            ],
            [
                "name" => "Sauna",
                "icon" => "fa-solid fa-temperature-arrow-up"
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
        
        
            

       
            

        
    }
}
