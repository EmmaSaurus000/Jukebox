<?php

namespace Database\Seeders;

use Database\Factories\PlaylistTrackFactory;
use Illuminate\Database\Seeder;
use App\Models\Playlist;
use App\Models\Track;
use App\Models\PlaylistTrack;

class Playlist_TrackSeederNOIDs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seedPlaylist_Tracks = [
            [
                "playlist_id" => 1,
                "track_id" => 1,],

            [
                "playlist_id" => 1,
                "track_id" => 17,],

            [
                "playlist_id" => 1,
                "track_id" => 18,],

            [
                "playlist_id" => 1,
                "track_id" => 44,],

            [
                "playlist_id" => 1,
                "track_id" => 46,],

            [
                "playlist_id" => 1,
                "track_id" => 48,],

            [
                "playlist_id" => 1,
                "track_id" => 42,],

            [
                "playlist_id" => 1,
                "track_id" => 25,],

            [
                "playlist_id" => 1,
                "track_id" => 26,],

            [
                "playlist_id" => 2,
                "track_id" => 31,],

            [
                "playlist_id" => 2,
                "track_id" => 3,],

            [
                "playlist_id" => 2,
                "track_id" => 8,],

            [
                "playlist_id" => 2,
                "track_id" => 34,],

            [
                "playlist_id" => 3,
                "track_id" => 4,],

            [
                "playlist_id" => 3,
                "track_id" => 21,],

            [
                "playlist_id" => 3,
                "track_id" => 30,],

            [
                "playlist_id" => 3,
                "track_id" => 8,],

            [
                "playlist_id" => 4,
                "track_id" => 17,],

            [
                "playlist_id" => 4,
                "track_id" => 9,],

            [
                "playlist_id" => 4,
                "track_id" => 4,],

            [
                "playlist_id" => 4,
                "track_id" => 30,],

        ];

      //  foreach ($seedPlaylist_Tracks as $seed) {
            //Playlist_TrackSeederNOIDs::create($seed);
          foreach ($seedPlaylist_Tracks as $seed) {
              PlaylistTrack::create($seed);

        }
    }
}
