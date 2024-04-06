<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\Models\Apartments;

class SponsorshipController extends Controller
{
    public function create($apartment_id)
    {
        $apartment = Apartments::findOrFail($apartment_id); 
        return view('sponsorship.create', compact('apartment'));
    }

    public function store(Request $request, $apartment_id)
{
    $validatedData = $request->validate([
        'type' => 'required',
    ]);

    $apartment = Apartments::findOrFail($apartment_id);

    $sponsorship = Sponsor::where('name', $validatedData['type'])->firstOrFail();

    $apartment->sponsors()->attach($sponsorship->id);

    return redirect()->route('sponsorship.create', ['apartment_id' => $apartment_id]);
}
}
