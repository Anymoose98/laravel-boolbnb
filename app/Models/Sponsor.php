<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Apartments; 

class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'duration'];

    public function apartments()
    {
        return $this->belongsToMany(Apartments::class, 'sponsor_apartment');
    }
}
