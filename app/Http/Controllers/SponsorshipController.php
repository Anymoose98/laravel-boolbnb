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

        $type = $request->input('type');

        switch ($type) {
            case 'base':
                $sponsor_id = 1;
                break;
            case 'standard':
                $sponsor_id = 2;
                break;
            case 'avanzato':
                $sponsor_id = 3;
                break;
            default:
                return;
        }

        $apartment = Apartments::findOrFail($apartment_id);
        $sponsorship = Sponsor::findOrFail($sponsor_id);
        $apartment->sponsors()->attach($sponsorship->id);

        return redirect()->route('sponsorship.create', ['apartment_id' => $apartment_id]);
    }
}
