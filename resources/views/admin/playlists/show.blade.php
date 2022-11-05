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
            {{ __('Playlist Details') }}
        </h2>
    </x-slot>
    <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <dl class="grid grid-cols-6 gap-2">
                    <dt class="col-span-1">User</dt>
                    <dd class="col-span-5">{{ $playlist->user_name($playlist->user_id) }}</dd>
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
                       <a href="{{ url('playlists/'.$playlist->id.'/edit') }}" class="btn btn-sm btn-secondary">Update</a></td>
                        <form action="{{ route('playlists.destroy',['playlist'=>$playlist]) }}"
                              method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-secondary text-gray-50">
                                Delete
                            </button>
                        </form>

                        <!--
                        <a href="{ { url('playlists/delete/'.$playlist->id) }}" class="btn btn-sm btn-secondary">Delete url</a>
                        <a href="{ { route('playlists.destroy', [$playlist]) }}" class="btn btn-sm btn-secondary">Delete route</a>

                        <form action="{ { route('delete_me', ['playlist' => $playlist]) }}">
                            <button class="btn btn-sm btn-secondary text-gray-50"
                            href="{ { url('playlists/delete'.$playlist->id) }}  type="submit">
                                Delete
                            </button>
                        </form>
                        <div style="display:inline">
                            <a href="#show" id="show">Open</a>
                            <div id="cont" style="inline-block">
                                <form action="{ { route('delete_me', ['id' => $playlist->id, 'playlist' => $playlist]) }}">
                                    <button class="btn btn-sm btn-secondary text-gray-50"type="submit">
                                        Delete playlist { { $playlist->name }}
                                    </button>
                                </form>
                                    <a href="#hide" id="hide" >Cancel</a>
                            </div>
                        </div>
                        -->
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


