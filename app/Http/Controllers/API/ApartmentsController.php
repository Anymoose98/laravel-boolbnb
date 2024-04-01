<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartments;

class ApartmentsController extends Controller
{
    public function index()
    {
        $apartments = Apartments::all();

        return response()->json([
            'success' => true,
            'results' => $apartments
        ]);
    }

    public function show($id) {
        $apartment = Apartments::find($id);
    
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

