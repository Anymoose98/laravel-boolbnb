<?php

namespace App\Http\Controllers\Api;

use App\Models\Apartments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApartmentsController extends Controller
{
    public function index()
    {
        $apartments = Apartments::all();

        return response()->json([
            'success' => true,
            'results' => $apartments,
        ]);
    }
}
