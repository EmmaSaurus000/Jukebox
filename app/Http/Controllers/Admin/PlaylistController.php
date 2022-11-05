<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Playlist;
use App\Models\Track;
use App\Models\PlaylistTrack;
use App\Http\Controllers\PlaylistTrackController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('isAdmin')) {

            $id = auth()->user();
            $id = $id->id;
            $playlists = Playlist::where('user_id', '=', $id)->get();
            $more_playlists = Playlist::where('user_id', "!=", $id)->get();

            //$playlists = Playlist::all()->sortBy('user_id');
        }
        elseif (Gate::allows('isManager')) {
            $id = auth()->user();
            $id = $id->id;
            $astronauts = User::where('role', '=', 'Astronaut')->pluck('id');
            $playlists = Playlist::where('user_id', '=', $id)->get();
            $more_playlists = Playlist::wherein('user_id', $astronauts)->get();
        }
        elseif (Gate::allows('isAstronaut')) {
            $id = auth()->user();
            $id = $id->id;
            $playlists = Playlist::where('user_id', '=', $id)->get();
            //$managers = User::where('role', '=', 'Manager')->pluck('id');
            //$more_playlists = Playlist::wherein('user_id', $managers)->where('public', '=', 1)->get();
            $more_playlists = Playlist::where('public', '=', 1)->where('user_id', '!=', $id)->get();
        }

        return view('admin/playlists/index', compact(['playlists', 'more_playlists']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        /**if (Gate::allows('isAstronaut')) {
            $users = auth()->user();
            $tracks = Track::all()->sortBy('artist');
        }
        else { */

        if (Gate::allows('isAdmin')) {

            $users = User::all()->sortBy('name');
            $tracks = Track::all()->sortBy('artist');
        }
        elseif (Gate::allows('isManager')) {

            $id = auth()->user();
            $id = $id->id;
            $users = User::where('role', '=', 'Astronaut')->orWhere('id', '=', $id)->get();
            $tracks = Track::all()->sortBy('artist');

        }
        elseif (Gate::allows('isAstronaut')) {

            $id = auth()->user();
            $id = $id->id;
            $users = User::where('id', '=', $id)->get();
            $tracks = Track::all()->sortBy('artist');

        }

            return view('admin/playlists/create')->with(['tracks' => $tracks])->with(['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Playlist $playlist)
    {
        // JJ
        $request->validate([
            'name' => ['required', 'string', 'max:64',],
        ]);

        $public = 0;
        if($request->input('public') == 1){
            $public = 1;
        }

        $track_list = $request->input('selected_tracks');
        $this_name = $request->input('name');
        $this_user = $request->input('user_id');

        // Save
        $new_playlist = Playlist::create([
            'name' => $this_name,
            "user_id" => $this_user,
            "public" => $public,
        ]);

        foreach($track_list as $track){
            $new_playlist->tracks()->attach($track);
        };

        return redirect(route('playlists.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Playlist $playlist)
    {
        $tracks = DB::table('playlist_track')
            ->where('playlist_track.playlist_id', "=", $playlist->id)
            ->join('tracks', 'playlist_track.track_id', "=", 'tracks.id')
            ->select('tracks.id', 'tracks.name', 'tracks.artist')
            ->get(); // up to here
        return view('admin/playlists/show', compact(['playlist', 'tracks']));

        //https://laravel.com/docs/8.x/queries#joins
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Playlist $playlist)
    {
        $tracks = DB::table('playlist_track')
            ->where('playlist_track.playlist_id', "=", $playlist->id)
            ->join('tracks', 'playlist_track.track_id', "=", 'tracks.id')
            ->select('tracks.id', 'tracks.name', 'tracks.artist')
            ->get(); // up to here

        $track_array = [];
        foreach ($tracks as $track) {
            array_push($track_array, $track->id);
        }

        $other_tracks = DB::table('tracks')->whereNotIn('id', $track_array)->get()->sortBy('artist');

        return view('admin/playlists/update', compact(['playlist', 'tracks', 'other_tracks']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, Playlist $playlist)
    {
        $request->validate([
           'name' => ['required', 'string', 'max:64'],
        ]);

        if (isset($request['name']) && $request->input('name') != $playlist->name) { $playlist->name = $request->input('name');
        }

        $track_array = $request->selected_tracks;
        $playlist->tracks()->sync($track_array);

        $playlist->update();

        return view('admin/playlists/show', compact(['playlist', 'track_array']));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Playlist $playlist)
    {
        //$playlist = $request->get('playlist');
        $playlist->tracks()->detach();
        //PlaylistTrackController::destroy($playlist);
        $playlist->delete();

        return redirect(route('playlists.index'));
    }


    public function delete(Request $request, Playlist $playlist)
    {
        $playlist = $request->get('playlist');
        //ddd($request, $playlist);
        //$playlist = Playlist::find($playlist->id);
        /**$tracks = DB::table('playlist_track')
            ->where('playlist_track.playlist_id', "=", $playlist->id)
            ->join('tracks', 'playlist_track.track_id', "=", 'tracks.id')
            ->select('tracks.id', 'tracks.name', 'tracks.artist')
            ->get(); // up to here
         * */
        return view('admin/playlists/delete', compact('playlist'));
        //return view('admin/playlists/delete')->with(['playlist']));

    }

    public function remove_track(Playlist $playlist, Track $track)
    {
        $playlist->tracks()->detach($track);
    }

    public function add_track(Playlist $playlist, Track $track)
    {
        $playlist->tracks()->attach($track);
    }


}
