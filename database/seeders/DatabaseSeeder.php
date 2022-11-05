<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();

        $this->call([
            GenreSeeder::class,
        ]);

        $this->call([
            TrackSeeder::class,
        ]);

        $this->call([
            PlaylistSeeder::class,
        ]);

        $this->call([
            Playlist_TrackSeeder::class,
        ]);
    }
}
