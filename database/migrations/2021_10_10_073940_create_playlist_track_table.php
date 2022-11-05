<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\PlaylistTrack;

class CreatePlaylistTrackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlist_track', function (Blueprint $table) {
            // FOR REVISED BRANCH PIVOT II DROPPING UID on PIVOT
            // doing compound primary key instead
            $table->id();
            $table->unsignedBigInteger('playlist_id');
            $table->foreign('playlist_id')->references('id')->on('playlists')->onDelete('cascade');
            $table->unsignedBigInteger('track_id');
            $table->foreign('track_id')->references('id')->on('tracks')->onDelete('cascade');

            // below was changed according to Laracasts
            // ignoring because people can have same song multiple times in playlist if desired?
            // $table->primary(['playlist_id', 'track_id']);
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('playlist_track');
    }
}
