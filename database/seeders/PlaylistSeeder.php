<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Playlist;

class PlaylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seedPlaylists = [
                [
                    "id" => 1,
                    "name" => "Work",
                    "user_id" => 6,
                    "public" => 1, ],

                [
                    "id" => 2,
                    "name" => "Sleep",
                    "user_id" => 6,
                    "public" => 1, ],
                [
                    "id" => 3,
                    "name" => "Metal",
                    "user_id" => 13,
                    "public" => 0, ],

                [
                    "id" => 4,
                    "name" => "Need my space",
                    "user_id" => 14,
                    "public" => 0, ],

            [
                    "id" => 5,
                    "name" => "General: Pop it on",
                    "user_id" => 2,
                    "public" => 1, ],
            [
                    "id" => 6,
                    "name" => "General: Rrrromantique",
                    "user_id" => 2,
                    "public" => 1, ],
        ];

        foreach ($seedPlaylists as $seed) {
            Playlist::create($seed);
        }
    }
}
