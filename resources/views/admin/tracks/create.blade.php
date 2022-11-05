<?php
/**
 * Filename      : create.blade.php
 * Project       : SaaS-Cube
 * Location      : ${DIRECTORY}
 * Author        : Emma Saurus <20078202@tafe.wa.edu.au>
 * Date          : 13/09/2021
 * Description   : Very descriptive
 */
?>

<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Track') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('tracks.store') }}" method="post">
                        @csrf
                        <div class="form-control">
                            <label class="label" for="artist">
                                <span class="label-text">Artist name</span>
                            </label>
                            <input type="text"
                                   name="artist" id="artist"
                                   placeholder="Artist"
                                   class="input input-bordered">
                        <!--</div>-->
                        <div class="form-control">
                            <label class="label" for="name">
                                <span class="label-text">Track name</span>
                            </label>
                            <input type="text"
                                   name="name" id="name"
                                   placeholder="Name"
                                   class="input input-bordered">
                        </div>
                            <div class="form-control">
                                <label class="label" for="album">
                                    <span class="label-text">Album name</span>
                                </label>
                                <input type="text"
                                       name="album" id="album"
                                       placeholder="Album name"
                                       class="input input-bordered">
                            </div>
                            <div class="form-control">
                                <label class="label" for="year">
                                    <span class="label-text">Year</span>
                                </label>
                                <input type="text"
                                       name="year" id="year"
                                       placeholder="Year"
                                       class="input input-bordered">
                            </div>
                            <div class="form-control">
                                <label class="label" for="track_number"> <span class="label-text">Album track number</span></label>
                                <input type="text" name="track_number" id="track_number"
                                       placeholder="Track number" class="input input-bordered">
                            </div>
                            <div class="form-control">
                                <label class="label" for="length"> <span class="label-text">Track length H:m:s</span></label>
                                <input type="text" name="length" id="track_number"
                                       placeholder="Hours:mins:secs" class="input input-bordered">
                            </div>
                            <div class="form-control">
                                <label class="label" for="genre_id"> <span class="label-text">Genre</span></label>
                                <!-- <input type="int" name="parent" id="parent"
                                       placeholder="Parent" value="{ { old('parent') }}" class="input input-bordered">
                                -->
                                <select id="genre_id" name="genre_id" class="form-control">

                                @foreach($genres as $genre)
                                        <option value="{{ $genre->id }}">
                                            {{ $genre->name }}</option>
                                @endforeach

                                </select>
                            </div>

                            <div class="py-6">
                                <button class="btn btn-sm btn-primary text-gray-50" type="submit">Save new track</button>
                                <a class="btn btn-sm btn-secondary text-gray-50"
                                   href="{{ route('tracks.index') }}">Back to Tracks</a>
                                <button class="btn btn-sm btn-accent" type="reset">Reset</button>
                            </div>
                    </div>
                    </form>
                </div>

                <p class="pt-6">
                    <a href="{{ url('tracks') }}" class="btn btn-sm btn-accent">Back to Tracks</a>
                </p>
            </div>
            @if ($errors->any())
                <div class="alert alert-error">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</x-guest-layout>


