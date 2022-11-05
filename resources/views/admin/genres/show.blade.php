<?php
/**
 * Filename      : show.blade.php
 * Project       : SaaS-Cube
 * Location      : ${DIRECTORY}
 * Author        : Emma Saurus <20078202@tafe.wa.edu.au>
 * Date          : 13/09/2021
 * Description   : Very descriptive
 */
use App\Models\Genre

?>
<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Genre Detail') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <dl class="grid grid-cols-6 gap-2">
                    <dt class="col-span-1">ID</dt>
                    <dd class="col-span-5">{{ $genre->id }}</dd>
                    <dt class="col-span-1">Name</dt>
                    <dd class="col-span-5">{{ $genre->name }}</dd>
                    <dt class="col-span-1">Parent</dt>
                    <dd class="col-span-5">{{ $genre->getParent($genre->parent) }}</dd>
                    <dt class="col-span-1">Icon</dt>
                    <dd class="col-span-5">{{ $genre->icon }}</dd>
                    <dt class="col-span-1">Actions</dt>
                    <dd class="col-span-5">
                        <form action="{{ route('genres.destroy',['genre'=>$genre]) }}"
                              method="post">
                            <a href="{{ url('genres/'.$genre->id.'/edit') }}" class="btn btn-sm btn-secondary">Update</a></td>
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
                    <a href="{{ url('genres') }}" class="btn btn-sm btn-accent">Back to Genres</a>
                </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>


