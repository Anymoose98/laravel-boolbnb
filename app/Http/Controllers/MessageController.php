<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Apartments;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

     public function index($apartmentId)
     {
         $user = Auth::user();
     
         // Check if the user owns the apartment or has access to view its messages
         $apartment = Apartments::where('id', $apartmentId)->where('user_id', $user->id)->first();
     
         // If the apartment exists and belongs to the user, retrieve its messages
         if ($apartment) {
             $messages = Message::where('apartment_id', $apartmentId)->get();
             return view('apartmens.messages', compact('messages'));
         }
     
         // Apartment not found or user does not have access, handle accordingly (e.g., redirect or show error)
         return redirect()->back()->with('error', 'Apartment not found or you do not have access to view its messages.');
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMessageRequest  $request
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        $message = Message::all();
        
        return view("apartments.messages", compact ("message"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMessageRequest  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('user.message.index');
    }
}
