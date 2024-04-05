<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApartmentsService extends Model
{
    use HasFactory;

    protected $table = "apartments_service"; // Specifica il nome corretto della tabella

    protected $fillable = ["apartments_id", "service_id"];
}
