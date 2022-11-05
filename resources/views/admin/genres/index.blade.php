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
            {{ __('Genres') }}
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
                                <th>Name</th>
                                <th>Parent</th>
                                <th>Icon</th>
                                <th class="flex justify-between">
                                    <span class="pt-2">Actions</span><a href="{{ route('genres.create') }}" class="btn btn-sm btn-primary text-gray-50">Add Genre</a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($genres as $key=>$genre)
                                <tr class="hover">
                                    <!-- <td class="small">{ { $key+1 }}</td> -->
                                    <td>{{ $genre->id }}</td>
                                    <td>{{ $genre->name }}</td>
                                <!--<td>{ { Genre::parent($genre->parent)->name }}</td> -->
                                <!--<td>{ { $genre->parent }}</td>-->
                                <td>{{ $genre->getParent($genre->parent) }}</td>
                                <!--<td>{{ $genre->parent }}</td>-->
                                    <td>{{ $genre->icon }}</td>
                                    <td>
                                        <a href="{{ url('genres/'.$genre->id) }}"
                                           class="btn btn-sm btn-primary text-gray-50">Details</a>
                                        <!-- <a href="{ { url('genres/update/'.$genre->id) }}" class="btn btn-sm btn-secondary">Edit</a></td> -->
                                        <a href="{{ url('genres/'.$genre->id.'/edit') }}" class="btn btn-sm btn-secondary">Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="5">
                                    {{ $genres->links() }}
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

