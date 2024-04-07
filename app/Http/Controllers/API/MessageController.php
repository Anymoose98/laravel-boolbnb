<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'max:50',
            'subject' => 'max:80',
            'email' => 'required|max:255',
            'message' => 'required|max:300',
        ], [
            'name.max' => 'The name field cannot exceed 50 characters!',
            'email.required' => 'The email field is required!',
            'email.max' => 'The email field cannot exceed 255 characters!',
            'description.required' => 'The description field is required!',
            'description.max' => 'The description field cannot exceed 300 characters!',
            'message.required' => 'The message field is required!',
            'message.max' => 'The message field cannot exceed 300 characters!' 
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $new_message = new Message();
        $new_message->fill($data);
        $new_message->save();

        return response()->json([
            'success' => true
        ]);
    }
}