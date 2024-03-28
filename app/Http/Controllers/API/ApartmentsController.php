<?php

namespace App\Http\Controllers\Api;

use App\Models\Apartments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApartmentsController extends Controller
{
    public function index(Request $request)
    {
        $query = Apartments::query();
    
        /* RECUPERO DEI DATI PRESI DAL JS */
        if ($request->has(['latitude', 'longitude', 'radius', 'beds'])) {
            $latitude = $request->input('latitude');
            $longitude = $request->input('longitude');
            $radius = $request->input('radius');
            $beds = $request->input('beds');
            $rooms = $request->input('rooms');
    
            /* CALCOLO DEL RANGE DELLA DISTANZA */
            /* UN GRADO DI LONGITUDINE DOVREBBE ESSERE 111.12 [IMPRECISO] */
            $approximateRange = $radius / 111.12; 
    
            /* CALCOLO APPROSSIMATIVO PER LATITUIDE E LONGITUDINE */
            $latMin = $latitude - $approximateRange;
            $latMax = $latitude + $approximateRange;
            $lonMin = $longitude - $approximateRange;
            $lonMax = $longitude + $approximateRange;
    
            /* QUERY CHE RICHIEDE GLI APPARTAMENTI ENTRO IL RANGE CALCOLATO */
            $query->whereBetween('latitude', [$latMin, $latMax])
                  ->whereBetween('longitude', [$lonMin, $lonMax])
                  ->where('beds', '>=', $beds)
                  ->where('rooms', '>=', $rooms);
        }
    
        $apartments = $query->get();
    
        return response()->json([
            'success' => true,
            'results' => $apartments,
        ]);
    }
}
