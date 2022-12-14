<?php
/**
 * Filename      : show.blade.php
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
            {{ __('Track Details') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <dl class="grid grid-cols-6 gap-2">
                    <dt class="col-span-1">ID</dt>
                    <dd class="col-span-5">{{ $track->id }}</dd>
                    <dt class="col-span-1">Artist</dt>
                    <dd class="col-span-5">{{ $track->artist }}</dd>
                    <dt class="col-span-1">Name</dt>
                    <dd class="col-span-5">{{ $track->name }}</dd>
                    <dt class="col-span-1">Album</dt>
                    <dd class="col-span-5">{{ $track->album ?? "-" }}</dd>
                    <dt class="col-span-1">Genre</dt>
                    <dd class="col-span-5">{{ $track->genre->name }}</dd>
                    <dt class="col-span-1">Track number</dt>
                    <dd class="col-span-5">{{ $track->track_number ?? "-" }}</dd>
                    <dt class="col-span-1">Length</dt>
                    <dd class="col-span-5">{{ $track->length ?? "-" }}</dd>
                    <dt class="col-span-1">Year</dt>
                    <dd class="col-span-5">{{ $track->year ?? "-" }}</dd>
                    <dt class="col-span-1">Actions</dt>
                    <dd class="col-span-5">
                        <form action="{{ route('tracks.destroy',['track'=>$track]) }}"
                              method="post">
                            <a href="{{ url('tracks/'.$track->id.'/edit') }}" class="btn btn-sm btn-secondary">Update</a></td>
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
                    <a href="{{ url('tracks') }}" class="btn btn-sm btn-accent">Back to Tracks</a>
                </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>


