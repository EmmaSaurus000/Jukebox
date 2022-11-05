<?php
/**
 * Filename      : delete.blade.php
 * Project       : SaaS-Cube
 * Location      : ${DIRECTORY}
 * Author        : Emma Saurus <20078202@tafe.wa.edu.au>
 * Date          : 13/09/2021
 * Description   : Very descriptive
 */
use App\Models\Playlist;

?>
<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Delete Playlist') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <dl class="grid grid-cols-6 gap-2">
                        <dt class="col-span-1">User</dt>
                        <dd class="col-span-5">{ { $playlist->user_name($playlist->user_id) }}</dd>
                        <dt class="col-span-1">Playlist name</dt>
                        <dd class="col-span-5">
                            {{ $playlist->name }} </dd>
                        <dt class="col-span-1">Tracks</dt>
                        <dd class="col-span-5">
                            @foreach($playlist->track_names2($playlist->id) as $track)
                                {{ $track->name }} by
                                {{ $track->artist }} </br>
                                @endforeach</br>
                        </dd>
                        <dt class="col-span-1">Actions</dt>
                        <dd class="col-span-5">
                            <form action="{{ route('playlists.destroy',['playlist'=>$playlist]) }}"
                                  method="post">
                                <a href="{{ url('playlists/'.$playlist->id.'/edit') }}" class="btn btn-sm btn-secondary">Update</a></td>
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-secondary text-gray-50" type="submit">
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


