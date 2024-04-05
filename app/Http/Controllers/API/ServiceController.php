<?php

namespace App\Http\Controllers\API;
use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
       
        $service = Service::all();
       
        
    
        
    
        return response()->json([
            'success' => true,
            'results' => $service
        ]);
    }
}
