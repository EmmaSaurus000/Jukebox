<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Track;
use App\Models\PlaylistTrack;


class Playlist extends Model
{
    use HasFactory;

    protected $fillable = [
        // "id", //JJ
        "name",
        "user_id",
        "public",
    ];
    /**
     * @var \Illuminate\Support\Collection|mixed
     */

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class); //JJ
        //return $this->belongsTo(User::class, PlaylistTrack::class);

    }

    public function user_name($user_id)
    {
        $name = User::find($user_id)->name;
        return $name;
    }

    // not able to be called from PlaylistController to attach tracks
    // duplicating there
    public function tracks(){

        // many to many setup requires belongsToMany
        return $this->belongsToMany(\App\Models\Track::class, 'playlist_track', 'playlist_id', 'track_id'); // additional params JJ

        //WORKS IN OLD SETUP except for update:
        // return $this->hasMany(Track::class, PlaylistTrack::class);

        //$tracks = Playlist::find($id)->tracks->get();
        // return $tracks;

        //return $this->hasMany(Track::class)->withPivot();
        // message: withPivot not in Eloquent relationships
    }

    public function playlist_tracks()
        // prev requested return type:  \Illuminate\Database\Eloquent\Relations\HasMany
    {
        // new way, one call
        return Playlist::with('tracks')->get();

        //works in old
        //return $this->hasMany(\App\Http\Controllers\PlaylistTrackController::class);
    }

    public function track_names($playlist_id){
        $track_names = PlaylistTrack::where('playlist_id', $playlist_id)->get();
            return $track_names;
    }

    public function track_names2($playlist_id){
        $track_names = Track::join('playlist_track', 'playlist_track.track_id', '=', 'tracks.id')->where('playlist_track.playlist_id', $playlist_id)->get(['tracks.*']);
        return $track_names;
    }

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];
}
