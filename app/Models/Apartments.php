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
        'visibility',
        'longitudine',
        'latitudine',
       
        
    ];

    public function image_gallery(){
        return $this->hasMany(ImageGallery::class);
    }
}
