<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartments;

class ApartmentsController extends Controller
{
     public function index(){
        $apartments=Apartments::all();

        return response()->json([
            'success'=> true,
            'results'=> $apartments
        ]);
     }
}
