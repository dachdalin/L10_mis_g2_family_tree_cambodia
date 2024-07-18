<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Couple extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'person1_id',
        'person2_id',
        'date_start',
        'date_end',
        'is_married',
        'has_ended',
        'team_id',
    ];

    public function person1()
    {
        return $this->belongsTo(Person::class, 'person1_id');
    }

    public function person2()
    {
        return $this->belongsTo(Person::class, 'person2_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    
}
