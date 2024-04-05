<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Apartments;
use App\Models\Service;
use App\Models\ApartmentsService;

class ServiziAppartamentiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    // Recupera tutti gli appartamenti e servizi dal database
    $appartamenti = Apartments::all();
    $servizi = Service::all();

    // Per ogni appartamento, associa un numero casuale di servizi
    foreach ($appartamenti as $appartamento) {
        // Ottieni un numero casuale di servizi da 1 a 5 per questo appartamento
        $numeroServizi = rand(1, 5);

        // Prendi un campione casuale di servizi
        $serviziCasuali = $servizi->random($numeroServizi)->pluck('id');

        // Verifica se il servizio è già associato all'appartamento
        $serviziEsistenti = $appartamento->services()->pluck('id');

        // Filtra i servizi casuali per evitare duplicati
        $serviziDaAggiungere = $serviziCasuali->diff($serviziEsistenti);

        // Associa i servizi filtrati a questo appartamento
        foreach ($serviziDaAggiungere as $servizioId) {
            ApartmentsService::create([
                'apartments_id' => $appartamento->id,
                'service_id' => $servizioId,
            ]);
        }
    }
}
}