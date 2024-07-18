<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Person extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'firstname',
        'lastname',
        'birthname',
        'nickname',
        'sex',
        'gender_id',
        'father_id',
        'mother_id',
        'parents_id',
        'dob',
        'yob',
        'pob',
        'dod',
        'yod',
        'pod',
        'street',
        'number',
        'postal_code',
        'city',
        'province',
        'state',
        'country_id',
        'phone',
        'photo',
        'team_id',
    ];

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function metadata()
    {
        return $this->hasMany(PersonMetadata::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function father()
    {
        return $this->belongsTo(Person::class, 'father_id');
    }

    public function mother()
    {
        return $this->belongsTo(Person::class, 'mother_id');
    }

    
}
