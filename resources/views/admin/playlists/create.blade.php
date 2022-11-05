<?php
/**
 * Filename      : create.blade.php
 * Project       : SaaS-Cube
 * Location      : ${DIRECTORY}
 * Author        : Emma Saurus <20078202@tafe.wa.edu.au>
 * Date          : 13/09/2021
 * Description   : Very descriptive
 */
use App\Models\Playlist

?>
<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Playlist') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                <form action="{{ route('playlists.store') }}" method="POST">
                @csrf

                @if ($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-error alert-sm my-2 py-1">
                            <p class="flex-1">
                                <i class="fas fa-exclamation-triangle mr-4 pl-2 pt-1"></i>
                                <span>{{ $error  }}</span>
                            </p>
                        </div>
                    @endforeach
                @endif

                    <div class="form-control">

                        @canany(['isAdmin', 'isManager'])
                            <label class="label" for="user_id">
                                <span class="label-text">User</span>
                            </label>
                            <select id="user_id" name="user_id" class="form-control">

                            @foreach($users as $user)
                               <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                            </select>
                        @endcanany
                        @can('isAstronaut')
                            <input name="user_id" type="hidden" value="{{ (Auth::user()->id) }}">
                        @endcan
                    </div>
                    <div class="form-control">
                        <label class="label" for="name">
                            <span class="label-text">Playlist name</span>
                        </label>
                        <input type="text"
                               name="name" id="name"
                               placeholder="Name of playlist"
                               class="input input-bordered">
                    </div>

                    <div class="form-control">
                        <label class="checkbox"
                               for="public">
                            <span class="label-text">Public</span>
                        </label>
                        <input type="checkbox"
                               name="public" id="public"
                               value="1">
                    </div>

                    <div class="form-control">
                        <label class="label" for="track_id">
                            <span class="label-text">Tracks</span>
                        </label>
                        @foreach($tracks as $track)
                            <label>
                                <!-- name="track_id"
                                id="track_id"-->
                                <input type="checkbox" name='selected_tracks[]'  value="{{ old('$track->id') ?? $track->id }}">  {{ $track->name }} by {{ $track->artist }} </label><br>
                        @endforeach
                    </div>

                    <div class="py-6">
                        <button class="btn btn-sm btn-primary text-gray-50" type="submit">Save playlist</button>
                        <a class="btn btn-sm btn-secondary text-gray-50"
                           href="{{ route('playlists.index') }}">Back to Playlists</a>
                        <button class="btn btn-sm btn-accent" type="reset">Reset</button>
                    </div>
                </form>
                <p class="pt-6">
                    <a href="{{ url('playlists') }}" class="btn btn-sm btn-accent">Back to Playlists</a>
                </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>


