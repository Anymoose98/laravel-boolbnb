<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clicks;

class ClickController extends Controller
{
    public function store(Request $request, $apartment)
    {
        $click = new Clicks();
        $click->apartment_id = $apartment;
        $click->save();


        return response()->json(['message' => 'Clic registrato con successo'], 200);
    }
}
