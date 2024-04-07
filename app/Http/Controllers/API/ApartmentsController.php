<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartments;

class ApartmentsController extends Controller
{
    public function registerClick($apartmentId)
{
    $apartment = Apartments::findOrFail($apartmentId);
    $apartment->increment('clicks'); 
}


    public function index(Request $request)
{
    $minBeds = $request->query('minBeds');

    $apartmentsQuery = Apartments::query();
    $apartmentsQuery->with('services'); // Eager load services

    if ($minBeds) {
        $apartmentsQuery->where('beds', '>=', $minBeds);
    }

    $apartments = $apartmentsQuery->get();

    return response()->json([
        'success' => true,
        'results' => $apartments
    ]);
}




    public function show($id) {
        $apartment = Apartments::with('services')->find($id);

        if (!$apartment) {
            return response()->json([
                'success' => false,
                'message' => 'Apartment not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'result' => $apartment
        ]);
    }


    }