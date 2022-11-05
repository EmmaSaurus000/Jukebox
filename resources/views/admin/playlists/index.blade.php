<?php
/**
 * Filename      : index.blade.php
 * Project       : SaaS-Cube
 * Location      : ${DIRECTORY}
 * Author        : Emma Saurus <20078202@tafe.wa.edu.au>
 * Date          : 20/09/2021
 * Description   : Very descriptive
 */
use App\Models\Genre;
?>
<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Playlists') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-x-auto">

                        <table class="table w-full table-zebra">
                            <thead>
                            <tr>
                                <th>User</th>
                                <th>Playlist name</th>
                                <th>Public</th>
                                <th class="flex justify-between">
                                    <span class="pt-2">Actions</span><a href="{{ route('playlists.create') }}" class="btn btn-sm btn-primary text-gray-50">Add Playlist</a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($playlists as $playlist)
                                <tr class="hover">
                                    <td>{{ $playlist->user_name($playlist->user_id) }}</td>

                                    <td>{{ $playlist->name }}</td>
                                    @if($playlist->public == 1)
                                        <td>Yes</td>
                                    @else
                                        <td>No</td>
                                    @endif
                                    <td>
                                        <a href="{{ url('playlists/'.$playlist->id) }}"
                                           class="btn btn-sm btn-primary text-gray-50">Details</a>
                                        <a href="{{ url('playlists/'.$playlist->id.'/edit') }}" class="btn btn-sm btn-secondary">Edit</a></td>
                                <td></td>
                                </tr>
                            @endforeach
                            @foreach($more_playlists as $playlist)
                                <tr class="hover">
                                    <td>{{ $playlist->user_name($playlist->user_id) }}</td>

                                    <td>{{ $playlist->name }}</td>
                                    @if($playlist->public == 1)
                                        <td>Yes</td>
                                    @else
                                        <td>No</td>
                                    @endif
                                    <td>
                                        <a href="{{ url('playlists/'.$playlist->id) }}"
                                           class="btn btn-sm btn-primary text-gray-50">Details</a>
                                    @canany(['isAdmin', 'isManager'])
                                        <a href="{{ url('playlists/'.$playlist->id.'/edit') }}" class="btn btn-sm btn-secondary">Edit</a></td>
                                    @endcanany
                                <td></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
