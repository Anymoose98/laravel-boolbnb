<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AutocompleteController extends Controller
{
    public function autocomplete(Request $request)
    {
        $searchTerm = $request->input('search');

        // Make a request to the TomTom API
        $response = Http::get(`https://api.tomtom.com/search/2/autocomplete`, [
            'key' => 'ARRIZGGoUek6AqDTwVcXta7pCZ07Q490', // Replace 'YOUR_API_KEY' with your actual API key
            'query' => $searchTerm
        ]);

        // Extract suggestions from the API response
        $suggestions = collect($response->json()['results'])->pluck('address')->toArray();

        return response()->json($suggestions);
    }
}
