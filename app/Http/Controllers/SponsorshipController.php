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
            'type' => 'required|in:base,standard,avanzato',
        ]);
    
        $sponsorship = new Sponsor();
        $sponsorship->type = $validatedData['type'];
        $sponsorship->apartment_id = $apartment_id;
        $sponsorship->save();

    return redirect()->route('sponsorship.create')->with('success', 'Sponsorship created successfully!');
    }
}
