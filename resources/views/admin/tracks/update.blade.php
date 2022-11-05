<?php
/**
 * Filename      : update.blade.php
 * Project       : SaaS-Cube
 * Location      : ${DIRECTORY}
 * Author        : Emma Saurus <20078202@tafe.wa.edu.au>
 * Date          : 13/09/2021
 * Description   : Very descriptive
 */

use App\Models\Genre;
use App\Model\Tracks;
use App\Http\Controllers\Admin\TrackController;

?>
<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Tracks') }}
        </h2>
    </x-slot>
    <!-- div 1 -->
    <div class="py-12">
        <!-- div 2 -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- div 3 -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- div 4 OUTSIDE FORM -->
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('tracks.update', $track->id) }}" method="POST">
                        <!-- nope <input type="hidden" name="_method" value="PUT"> -->
                        < input type="hidden" name="_token" value="{{ csrf_token() }}">-->
                        @csrf
                        @method('PATCH') <!-- changed from PUT-->

                        @if ($errors->any())
                            @foreach($errors->all() as $error)
                                <!-- div 5 INSIDE if/each -->
                                <div class="alert alert-error alert-sm my-2 py-1">
                                    <p class="flex-1">
                                        <i class="fas fa-exclamation-triangle mr-4 pl-2 pt-1"></i>
                                        <span>{{ $error  }}</span>
                                    </p>
                                </div>    <!-- CLOSE 5 inside if/each -->
                            @endforeach
                        @endif
                        <!-- div 6 INSIDE FORM -->
                    <!-- <div class="form-group"> trying form-control instead for each -->
                        <div class="form-group">
                            <label class="label" for="artist">
                                <span class="label-text">Artist</span>
                            </label>
                            <input type="text"
                                   name="artist" id="artist"
                                   class="input input-bordered" value="{{ $track->artist }}">
                        </div> <!-- CLOSE div 6 fr 50 -->
                            <!-- div 7 INSIDE FORM -->
                        <div class="form-group">
                                <label class="label" for="name">
                                    <span class="label-text">Name</span>
                                </label>
                                <input type="text"
                                       name="name" id="name"
                                       class="input input-bordered" value="{{$track->name }}">
                            </div> <!-- CLOSE div 7 fr 59 -->
                            <!-- div 8 INSIDE FORM -->
                            <div class="form-group">
                                <label class="label" for="album">
                                    <span class="label-text">Album name</span>
                                </label>
                                <input type="text"
                                       name="album" id="album"
                                       class="input input-bordered" value="{{$track->album }}">
                            </div> <!-- CLOSE 8 fr 68 -->
                            <!-- div 9 INSIDE FORM -->
                            <div class="form-group">
                                <label class="label" for="track_number">
                                    <span class="label-text">Track number</span>
                                </label>
                                <input type="text"
                                       name="track_number" id="track_number"
                                       class="input input-bordered" value="{{ $track->track_number }}">
                            </div> <!-- CLOSE 9 fr 77 -->
                            <!-- div 10 INSIDE FORM -->
                            <div class="form-group">
                                <label class="label" for="year">
                                    <span class="label-text">Year</span>
                                </label>
                                <input type="text"
                                       name="year" id="year"
                                       class="input input-bordered" value="{{ $track->year }}">
                            </div> <!-- CLOSE 10 fr 86 -->
                            <!-- div 11 INSIDE FORM -->
                            <div class="form-group">
                                <label class="label" for="genre_id"> <span class="label-text">Genre</span></label>
                                <select id="genre_id" name="genre_id" class="form-group">
                                    @foreach($genres as $genre)
                                        <option value="{{ $genre->id }}"
                                            @if($genre->id == $track->genre_id)
                                                 selected> <!-- selects but does not display -->
                                             @else
                                                >
                                            @endif
                                            {{ $genre->name }}</option>
                                    @endforeach
                                </select>
                            </div> <!-- CLOSE 11 -->
                            <!-- div 12 INSIDE FORM -->
                            <div class="form-group">
                                <label class="label" for="length"> <span class="label-text">Track length H:m:s</span></label>
                                <input type="text" name="length" id="length" class="input input-bordered" value="{{ $track->length }}">
                            </div> <!-- CLOSE 12 fr 110 -->
                            <!-- div 13 INSIDE FORM -->
                            <div class="py-6">
                                <button class="btn btn-sm btn-primary text-gray-50" type="submit">Update Track</button>
                                <a class="btn btn-sm btn-secondary text-gray-50"
                                   href="{{ route('tracks.index') }}">Back to Tracks</a>
                            </div> <!-- CLOSE 13 -->
                    </form>
                </div> <!-- CLOSE 4 OUTSIDE FORM fr 31 -->
            </div> <!-- CLOSE 3 fr 27 -->
        </div> <!-- CLOSE 2 fr 25 -->
    </div> <!-- CLOSE 1 fr 23 -->
</x-guest-layout>

