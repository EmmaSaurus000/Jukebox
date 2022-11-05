<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    protected $fillable = [
        //"id", //JJ
        "artist",
        "album",
        "track_number",
        "name",
        "genre_id",
        "length",
        "year",
    ];

    // Ady's adjustment
    function genre(){
        return $this->belongsTo(Genre::class);
    }

    function playlists(){
        //return $this->belongsToMany(Playlist::class)->withPivot();
        // return $this->belongsToMany(Playlist::class, PlaylistTrack::class);
        return $this->belongsToMany(Playlist::class, 'playlist_track', 'track_id', 'playlist_id');
    }

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];


    public function getGenre($id){
        // return $this->belongsTo(Genre::class);
        //$genre_name = Genre::find($id)->name;
        $genre_name = Genre::find($id)->name;
        return $genre_name;
    }
}
