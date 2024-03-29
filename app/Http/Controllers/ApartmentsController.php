<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Apartments;
use App\Models\ImageGallery;
use App\Http\Requests\StoreApartmentsRequest;
use App\Http\Requests\UpdateApartmentsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Auth;

class ApartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*     public function __construct()
    {
        $this->middleware(function ($request, $next) {
            // Condividi la variabile $apartment con tutte le views
            View::share('apartment', Apartments::all());
            return $next($request);
        });
    } */

    public function index()
    {
        // Ottieni l'utente autenticato
        $user = auth()->user();

        // Accedi alla relazione apartments() dell'utente per ottenere tutti gli appartamenti associati
        $apartment = $user->apartments;

        // Passa gli appartamenti alla vista
        return view("apartments.index", compact('apartment'));
    }

    public function search(Request $request)
    {
        $city = $request->input('city');
        $guests = $request->input('guests');

        // Esegui la logica di ricerca basata sui parametri forniti

        $apartments = Apartments::where('city', $city)
            ->where('guests', $guests)
            ->get();

        return response()->json($apartments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("apartments.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreApartmentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApartmentsRequest $request)
    {
        $apartment = new Apartments();

        $apartment->user_id = auth()->user()->id;

        $form_data = $request->all();
        $address = urlencode($form_data['address']);
        $api_key = "ARRIZGGoUek6AqDTwVcXta7pCZ07Q490";
        $url = "https://api.tomtom.com/search/2/geocode/$address.json?key=$api_key";

        $response = file_get_contents($url);
        $data = json_decode($response, true);


        if ($data && isset($data['results']) && count($data['results']) > 0) {
            $latitude = $data['results'][0]['position']['lat'];
            $longitude = $data['results'][0]['position']['lon'];
            $city = $address;
            // Assign latitude and longitude directly to the apartment object
            $apartment->latitude = $latitude;
            $apartment->longitude = $longitude;
            $apartment->location = $city;
        } else {
            $apartment->latitude = null;
            $apartment->longitude = null;
            $apartment->location = null;
        }


        if ($request->hasFile("image")) {
            $path = Storage::disk("public")->put("apartment_image", $form_data["image"]);
            $form_data["image"] = $path;
        }
        // Fill the apartment object with other form data

        $apartment->fill($form_data);

        // Save the apartment to the database
        $apartment->save();

        if ($request->has("image_gallery")) {
            $images = $form_data["image_gallery"];
            foreach ($images as $image) {
                $path = Storage::disk("public")->put("image_gallery", $image);

                $data_image["apartments_id"] = $apartment->id;
                $data_image["image_gallery"] = $path;

                $imageGallery = new ImageGallery;
                $imageGallery->fill($data_image);
                $imageGallery->save();
            }
        }
        return redirect()->route("apartments.index");
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartments  $apartments
     * @return \Illuminate\Http\Response
     */
    public function show(Apartments $apartments, $id)
    {

        $apartments = Apartments::find($id);
        return view("apartments.show", compact("apartments"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartments  $apartments
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartments $apartments, $id)
    {

        $apartment = Apartments::findOrFail($id);

        // Get the ID of the currently authenticated user
        $userId = Auth::id();

        // Compare the user ID of the currently authenticated user with the user ID associated with the apartment
        if ($userId !== $apartment->user_id) {
            // User is not authorized to edit this apartment
            return view('unauthorized');
        }

        $api_key = "ARRIZGGoUek6AqDTwVcXta7pCZ07Q490";

        $apartments = Apartments::find($id);
        $address = $apartments->location;

        return view("apartments.edit", compact("apartments", "address"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApartmentsRequest  $request
     * @param  \App\Models\Apartments  $apartments
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApartmentsRequest $request, $id)
    {
        $apartment = Apartments::findOrFail($id);
    
        if (auth()->id() !== $apartment->user_id) {
            return view('unauthorized');
        }
    
        $form_data = $request->validated();
    
        if ($request->hasFile("image")) {
            if ($apartment->image != null) {
                Storage::disk("public")->delete($apartment->image);
            }
            $path = Storage::disk("public")->put("apartment_image", $request->file("image"));
            $form_data["image"] = $path;
        }
    
        if ($request->has('address') && $request->input('address') !== $apartment->address) {
            $address = urlencode($form_data['address']);
            $api_key = "ARRIZGGoUek6AqDTwVcXta7pCZ07Q490";
            $url = "https://api.tomtom.com/search/2/geocode/$address.json?key=$api_key";

    
            $response = file_get_contents($url);
            $data = json_decode($response, true);
    
            if ($data && isset($data['results']) && count($data['results']) > 0) {
                $city = $address;
                $latitude = $data['results'][0]['position']['lat'];
                $longitude = $data['results'][0]['position']['lon'];
    
                $form_data['location'] = $city;
                $form_data['latitude'] = $latitude;
                $form_data['longitude'] = $longitude;
            }
        }
    
        $apartment->update($form_data);
    
        return redirect()->route('apartments.index')->with('success', 'Appartamento aggiornato con successo.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartments  $apartments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartments $apartments, $id)
    {
        $apartments = Apartments::find($id);

        if ($apartments->image != null) {
            Storage::disk("public")->delete($apartments->image);
        }

        $apartments->image_gallery()->delete();
        $apartments->delete();
        return redirect()->route("apartments.index", ["apartment" => $apartments]);
    }
}
