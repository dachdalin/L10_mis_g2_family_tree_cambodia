<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonMetadata extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id',
        'key',
        'value',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
    
}
