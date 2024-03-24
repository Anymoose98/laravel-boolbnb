<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartments extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'rooms',
        'beds',
        'image',
        'bathrooms',
        'square_meters',
        'location',
        // Capire perché due volte
        'image',
        'visibility',
        'longitudine',
        'latitudine',
       
        
    ];
}
