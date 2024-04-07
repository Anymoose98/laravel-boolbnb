<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SponsorApartment;

class PivotTableController extends Controller
{
    public function index(Request $request)
    {
        $pivotApartments = SponsorApartment::all();

        return response()->json([
            'success' => true,
            'results' => $pivotApartments
        ]);
    }
}
