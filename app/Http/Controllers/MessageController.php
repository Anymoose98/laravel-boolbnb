<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'content' => 'required|string',
            // Add more validation rules as needed
        ]);

        // Create a new message instance
        $message = new Message();
        $message->content = $request->input('content');
        // Set other attributes as needed

        // Save the message
        $message->save();

        // Return a response
        return response()->json([
            'success' => true,
            'message' => 'Message created successfully',
            'data' => $message,
        ], 201);
    }
}
