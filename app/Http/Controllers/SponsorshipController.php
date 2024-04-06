<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\Models\Apartments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;

class SponsorshipController extends Controller
{
    use HasTimestamps;

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
        $apartment->sponsors()->sync([$sponsorship->id => ['created_at' => now(), 'updated_at' => now()]]);

        return redirect()->route('sponsorship.create', ['apartment_id' => $apartment_id]);
    }
}
