<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponsorApartment extends Model
{
    use HasFactory;
    
    protected $table = "sponsor_apartment"; 

    protected $fillable = ["sponsor_id", "apartment_id"];
}

