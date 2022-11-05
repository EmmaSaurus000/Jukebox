<?php
/**
 * Filename      : show.blade.php
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
            {{ __('Update Playlist') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                <form action="{{ route('playlists.update',$playlist->id) }}" method="POST">
                @csrf
                @method('PATCH')

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
                        <label class="label" for="username">
                            <span class="label-text">Username</span>
                        </label>
                        <input type="text"
                               name="user_id" id="user_id"
                               class="input input-bordered" value="{{ old('name') ?? $playlist->user_name($playlist->user_id) }}">
                    </div>

                    <div class="form-control">
                        <label class="label" for="name">
                            <span class="label-text">Playlist name</span>
                        </label>
                        <input type="text"
                               name="name" id="name"
                               class="input input-bordered" value="{{ old('name') ?? $playlist->name }}">
                    </div>

                    <!-- get list of new tracks -->
                    <div class="form-group">
                        <label class="label" for="tracks">
                            <span class="label-text">Tracks</span>
                        </label>
                        @foreach($tracks as $track)
                            <label>
                                <!-- changed from name="track_id" -->
                                <input type="checkbox" name='selected_tracks[]'  checked="checked" value="{{ old('$track->id') ?? $track->id }}">  {{ $track->name }} by {{ $track->artist }} </label><br>
                        @endforeach
                        @foreach($other_tracks as $track)
                            <label>
                                <!-- changed from name="track_id" -->
                                <input type="checkbox" name='selected_tracks[]'  value="{{ old('$track->id') ?? $track->id }}">  {{ $track->name }} by {{ $track->artist }} </label><br>
                        @endforeach

                    </div>
                </form>
                    <br>

                        <form action="{{ route('playlists.destroy',['playlist'=>$playlist]) }}"
                              method="post">
                            <a href="{{ url('playlists/'.$playlist->id ) }}" class="btn btn-sm btn-secondary">Update</a></td>
                           <!-- nope: <a href="{ { route('users.update',['user'=>$user->id]) }}"
                               class="btn btn-sm btn-primary text-gray-50">Update</a> -->
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-secondary text-gray-50">
                                Delete
                            </button>
                        </form>
                    </dd>
                </dl>
                <p class="pt-6">
                    <a href="{{ url('playlists') }}" class="btn btn-sm btn-accent">Back to Playlists</a>
                </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>


