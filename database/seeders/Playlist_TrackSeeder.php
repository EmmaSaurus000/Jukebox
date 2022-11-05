<?php

namespace Database\Seeders;

use Database\Factories\PlaylistTrackFactory;
use Illuminate\Database\Seeder;
use App\Models\Playlist;
use App\Models\Track;
use App\Models\PlaylistTrack;

class Playlist_TrackSeeder extends Seeder
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
                "id" => 1,
                "playlist_id" => 1,
                "track_id" => 1,],

            [
                "id" => 2,
                "playlist_id" => 1,
                "track_id" => 17,],

            [
                "id" => 3,
                "playlist_id" => 1,
                "track_id" => 18,],

            [
                "id" => 4,
                "playlist_id" => 1,
                "track_id" => 44,],

            [
                "id" => 5,
                "playlist_id" => 1,
                "track_id" => 46,],

            [
                "id" => 6,
                "playlist_id" => 1,
                "track_id" => 48,],

            [
                "id" => 7,
                "playlist_id" => 1,
                "track_id" => 42,],

            [
                "id" => 8,
                "playlist_id" => 1,
                "track_id" => 25,],

            [
                "id" => 9,
                "playlist_id" => 1,
                "track_id" => 26,],

            [
                "id" => 10,
                "playlist_id" => 2,
                "track_id" => 31,],

            [
                "id" => 11,
                "playlist_id" => 2,
                "track_id" => 3,],

            [
                "id" => 12,
                "playlist_id" => 2,
                "track_id" => 8,],

            [
                "id" => 13,
                "playlist_id" => 2,
                "track_id" => 34,],

            [
                "id" => 14,
                "playlist_id" => 3,
                "track_id" => 4,],

            [
                "id" => 15,
                "playlist_id" => 3,
                "track_id" => 21,],

            [
                "id" => 16,
                "playlist_id" => 3,
                "track_id" => 30,],

            [
                "id" => 17,
                "playlist_id" => 3,
                "track_id" => 8,],

            [
                "id" => 18,
                "playlist_id" => 4,
                "track_id" => 17,],

            [
                "id" => 19,
                "playlist_id" => 4,
                "track_id" => 9,],

            [
                "id" => 20,
                "playlist_id" => 4,
                "track_id" => 4,],

            [
                "id" => 21,
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
