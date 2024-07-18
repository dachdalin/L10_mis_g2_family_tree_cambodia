<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Province extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'provinces';

    protected $fillable = [
        'id',
        'name',
        'slug',
        'status',
        'province_code',
    ];

    public function districts()
    {
        return $this->hasMany(District::class);
    }


}
