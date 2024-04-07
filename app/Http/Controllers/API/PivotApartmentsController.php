<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartments;

class PivotApartmentsController extends Controller
{
    public function index(Request $request)
    {
        $pivotApartments = Apartments::whereHas('sponsors')->get();

        return response()->json([
            'success' => true,
            'results' => $pivotApartments
        ]);
    }
}
