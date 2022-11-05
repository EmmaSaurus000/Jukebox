<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaylistTrack extends Model
{
    use HasFactory;

    protected  $table = 'playlist_track';

    protected $fillable = ['playlist_id', 'track_id'];

    public $timestamps = false;
}
