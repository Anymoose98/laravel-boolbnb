<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartments;

class GuestController extends Controller
{
    public function index()
    {
        $apartments = Apartments::all();
        return view('welcome', compact('apartments'));
    }
}
