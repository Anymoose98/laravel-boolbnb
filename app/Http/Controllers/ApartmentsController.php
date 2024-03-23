<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Apartments;
use App\Http\Requests\StoreApartmentsRequest;
use App\Http\Requests\UpdateApartmentsRequest;
use Illuminate\Http\Request;

class ApartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $apartment =  Apartments::all();

        return view("apartments.index", compact("apartment"));
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
        $form_data = $request->all();
        $address = urlencode($form_data['address']); // Access address from form data
        $api_key = "ARRIZGGoUek6AqDTwVcXta7pCZ07Q490";
        $url = "https://api.tomtom.com/search/2/geocode/$address.json?key=$api_key";
    
        $response = file_get_contents($url);
        $data = json_decode($response, true);
    
        if ($data && isset($data['results']) && count($data['results']) > 0) {
            $latitude = $data['results'][0]['position']['lat'];
            $longitude = $data['results'][0]['position']['lon'];
            // Assign latitude and longitude to form data
            $form_data['latitude'] = $latitude;
            
            $form_data['longitude'] = $longitude;
        } else {
            // Handle the case where coordinates are not found
            // You might want to return an error message or handle it in some way
            // For now, let's set latitude and longitude to null
            $form_data['latitude'] = null;
            $form_data['longitude'] = null;
        }
    
        // Create a new Apartments instance and fill it with form data
        $apartment = new Apartments();
        if($request->hasFile("image")){
            $path = Storage::disk("public")->put("apartment_image", $form_data["image"]);
            $form_data["image"] = $path;
        }
        $apartment->fill($form_data);
        
        
        // Save the apartment to the database
        $apartment->save();
    
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
        $apartments = Apartments::find($id);

        return view("apartments.edit", compact("apartments"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApartmentsRequest  $request
     * @param  \App\Models\Apartments  $apartments
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApartmentsRequest $request, Apartments $apartments, $id)
    {
        $form_data = $request->all();
        $apartments = Apartments::find($id);
        if($request->hasFile("image") ){
            $path = Storage::disk("public")->put("apartment_image", $form_data["image"]);
            $form_data["image"] = $path;
        }

         else {
            // Mantieni il percorso dell'immagine esistente
            $form_data['image'] = $apartments->image;
        }

        $apartments->update($form_data);
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

        if($apartments->image != null){
            Storage::disk("public")->delete($apartments->image);
        }

        $apartments->delete();
        return redirect()->route("apartments.index", ["apartment" => $apartments]);
    }
}
