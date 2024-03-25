<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageGallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'apartments_id',
        'image_gallery',       
    ];

    public function apartment(){
        return $this->belongsTo(Apartments::class);
    }
}
