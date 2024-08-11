<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    public $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'status',
        'email',
        'password',
        'create_by',
        'soft_delete',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    /*===== Relationship =====*/ 

    public function roles()
    {
      return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function teams()
    {
        return $this->hasMany(Team::class, 'user_id');
    }

    /*===== Relationship for current session team or active team =====*/ 
    public function currentTeam()
    {
        return $this->belongsTo(Team::class, 'current_team_id');
    }
}
