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
        'visibility',
        'longitudine',
        'latitudine',
        'user_id',
        "address",
        'adv_level'
    ];

    public function image_gallery(){
        return $this->hasMany(ImageGallery::class);
    }

    public function services(){
        return $this->belongsToMany(Service::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

public function messages()
{
    return $this->hasMany(Message::class);
}

public function sponsors()
{
    return $this->belongsToMany(Sponsor::class, 'sponsor_apartment');
}

public function clicks()
{
    return $this->hasMany(Clicks::class);
}


}
