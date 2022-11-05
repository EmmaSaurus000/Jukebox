<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Track;
use App\Models\Genre;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tracks = Track::all();
        $tracks = $tracks->sortBy('artist');
        // $tracks = $tracks->cursorPaginate(10);
        //if(isset($sorter)){
        // $tracks = $tracks->sortBy('artist');
        //}
        // else{             $tracks = $tracks->sortBy('artist');         }
        return view('admin/tracks/index', compact(['tracks']));
    }

    public function sorter($sorter){

        $tracks = Track::paginate(20);
        if(isset($sorter)){
            $tracks = $tracks->sortBy($sorter);
        }
        else{
            $tracks = $tracks->sortBy('artist');
        }
        return view('admin/tracks/index', compact(['tracks']));
    }

    public function getGenre($id){

        $track = Track::find($id);
        return $track->genre->name;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        $genres = $genres->sortBy('name');
        return view('admin/tracks/create')->with(['genres'=>$genres]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request-> validate([
            'artist' => 'required|max:125',
            'name' => 'required|max:125',
            'album' => 'required|max:125',
            'genre_id' => 'required',
            'track_number' => 'nullable',
            'length' => 'nullable',
            'year' => 'nullable',
        ]);

        // Save
        Track::create([
            'artist' => $request->input('artist'),
            'name' => $request->input('name'),
            'album' => $request->input('album'),
            'genre_id' => $request->input('genre_id'),
            'track_number' => $request->input('track_number'),
            'length' => $request->input('length'),
            'year' => $request->input('year'),
        ]);
        return redirect(route('tracks.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $track = Track::find($id);
        return view('admin/tracks/show', compact(['track']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $track = Track::find($id);
        $genres = Genre::all();
        $genres = $genres->sortBy('name');
        return view('admin/tracks/update', compact(['track']))->with(['genres'=>$genres]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Track $track)
    {   // change to tracks

        $rules = [
            'artist'=>['required', 'string', 'max:125'],
            'name'=>['required', 'string', 'max:125'],
            ];

        // run validation
        $request->validate($rules);

        /**
        $track->artist = $request->input('artist');
        $track->album = $request->input('album');
        $track->track_number = $request->input('track_number');
        $track->name = $request->input('name');
        $track->genre_id = $request->input('genre_id');
        $track->length = $request->input('length');
        $track->year = $request->input('year');
         */
        // patch track

        if($request->input('artist') !== $track->artist) {
            $track->artist = $request->input('artist');
        }
        if($request->input('album') !== $track->album) {
            $track->album = $request->input('album');
        }
        if($request->input('track_number') !== $track->track_number) {
            $track->track_number = $request->input('track_number');
        }
        if($request->input('name') !== $track->name) {
            $track->name = $request->input('name');
        }
        if($request->input('genre_id') !== $track->genre_id) {
            $track->genre_id = $request->input('genre_id');
        }
        if($request->input('length') !== $track->length) {
            $track->length = $request->input('length');
        }
        if($request->input('year') !== $track->year) {
            $track->year = $request->input('year');
        }

        //update changes
        $track->save();
        // console_log($track);
        return redirect(route('tracks.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $track)
    {
        $track->delete();
        return redirect(route('tracks.index'));
    }
}
