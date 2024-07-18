<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'iso2',
        'iso3',
        'name',
        'name_nl',
        'isd',
        'is_eu',
    ];
    
}
