<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    
        protected $fillable = ["apartment_id", 'name', 'email', "subject", "message"]; // Fillable attributes
    
        // Define any relationships the message might have
        // For example, if a message belongs to a user, you might define a method like this:
       // Message.php

public function apartment()
{
    return $this->belongsTo(Apartments::class);
}

    
    
}
