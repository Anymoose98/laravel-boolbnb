<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartments;

class LoggedController extends Controller
{
    public function index()
    {
        $apartments = Apartments::all();
        return view('dashboard', compact('apartments'));
    }
}
