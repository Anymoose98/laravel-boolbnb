<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
          /* // Validate the request
         $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]); 

        // Create a new message instance
        $message = new Message();
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->subject = $request->input('subject');
        $message->content = $request->input('message'); 

        // Save the message
      $this->storeMessage($message); 
   */
        // Return a success response
        return response()->json(['message' => 'Porcaccio Dio']);
    }

    protected function storeMessage(Message $message)
    {
        // Save the message to the database
        $message->save();
    }
}
