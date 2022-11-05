<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seedUsers = [
            [
                'id' => 1,
                'name' => 'Ad Ministrator',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Password1'),
                'role' => 'admin',
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'General',
                'email' => 'suggestions@jukebox.com',
                'password' => Hash::make('Password1'),
                'role' => 'manager',
            ],
            [
                'id' => 5,
                'name' => 'Emma Saurus',
                'email' => 'emmasaurus@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Password1'),
                'created_at' => now(),
            ],[
                'id' => 6,
                'name' => 'Adrian Gould',
                'email' => 'adrian.gould@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Password1'),
                'created_at' => now(),
            ],[
                'id' => 10,
                'name' => 'Eileen Dover',
                'email' => 'eileen.dover@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Password1'),
                'created_at' => now(),
            ],[
                'id' => 11,
                'name' => 'Jacques d\'Carre',
                'email' => 'jacques.dcarre@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Password1'),
                'created_at' => now(),
            ],[
                'id' => 12,
                'name' => 'Russell Leaves',
                'email' => 'russell.leaves@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Password1'),
                'created_at' => now(),
            ],[
                'id' => 13,
                'name' => 'Ivanna Vinn',
                'email' => 'ivanna.vinn@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Password1'),
                'created_at' => now(),
            ],[
                'id' => 14,
                'name' => 'Win Doh',
                'email' => 'win.doh@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Password1'),
                'created_at' => now(),
            ],
        ];

        foreach ($seedUsers as $seed) {
            User::create($seed);
        }
    }
}
