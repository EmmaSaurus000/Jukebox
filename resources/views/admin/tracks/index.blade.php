<?php
/**
 * Filename      : index.blade.php
 * Project       : SaaS-Cube
 * Location      : ${DIRECTORY}
 * Author        : Emma Saurus <20078202@tafe.wa.edu.au>
 * Date          : 20/09/2021
 * Description   : Very descriptive
 */

use App\Models\Track;

?>
<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tracks') }}
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
                                <th>ID</th>
                                <th>Artist</th>
                                <th>Name</th>
                                <th>Album</th>
                                <th>Genre</th>
                                <th>Year</th>
                                <th class="flex justify-between">
                                    <span class="pt-2">Actions</span><a href="{{ route('tracks.create') }}" class="btn btn-sm btn-primary text-gray-50">Add Track</a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tracks as $key=>$track)
                                <tr class="hover">
                                    <!-- <td class="small">{ { $key+1 }}</td> -->
                                    <td>{{ $track->id }}</td>
                                    <td>{{ $track->artist }}</td>
                                    <td>{{ $track->name }}</td>
                                    <td>{{ $track->album }}</td>
                                    <td>{{ $track->genre->name ?? "-" }}</td>
                                    <!-- null coalesce ?? to check if value and provide alternative if not present -->
                                    <!-- <td>{ { $track->getGenre($track->genre) }}</td> -->
                                    <!-- replaced by genre() in model and "genre" above is a call to Track.genre() < td>{ { $track->getGenre($track->genre_id) }} < /td> -->
                                    <td>{{ $track->year ?? "-"}}</td>
                                    <td>
                                        <a href="{{ url('tracks/'.$track->id) }}"
                                           class="btn btn-sm btn-primary text-gray-50">Details</a>
                                        <!-- <a href="{ { url('genres/update/'.$genre->id) }}" class="btn btn-sm btn-secondary">Edit</a></td> -->
                                        <a href="{{ url('tracks/'.$track->id.'/edit') }}" class="btn btn-sm btn-secondary">Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="5">
                                   <!-- { { $tracks->links() }} -->
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

