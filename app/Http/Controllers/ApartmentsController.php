<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Apartments;
use App\Http\Requests\StoreApartmentsRequest;
use App\Http\Requests\UpdateApartmentsRequest;

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

        $apartment = new Apartments();
        if($request->hasFile("image")){
            $path = Storage::disk("public")->put("apartment_image", $form_data["image"]);
            $form_data["image"] = $path;
        }
        
        $apartment->fill($form_data);
       
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
    public function edit(Apartments $apartments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApartmentsRequest  $request
     * @param  \App\Models\Apartments  $apartments
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApartmentsRequest $request, Apartments $apartments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartments  $apartments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartments $apartments)
    {
        //
    }
}
