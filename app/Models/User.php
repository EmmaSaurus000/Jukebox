<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    public $timestamps = TRUE;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $primaryKey = 'id';

    // Added line below to permit database to hande auto-inc
    // and attempt to avoid Laravel passing 0 as first field
    // param in generated SQL
    //public $incrementing = false;
    public $incrementing = true;

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'role',

    ];

    // removing to see if it is causing the zero-field error
   // protected $attributes = [
    //    'created_at',
   // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    public function playlists() {
        $this->hasMany(Playlist::class);
    }

}
