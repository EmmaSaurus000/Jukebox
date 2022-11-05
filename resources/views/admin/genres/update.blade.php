<?php
/**
 * Filename      : update.blade.php
 * Project       : SaaS-Cube
 * Location      : ${DIRECTORY}
 * Author        : Emma Saurus <20078202@tafe.wa.edu.au>
 * Date          : 13/09/2021
 * Description   : Very descriptive
 */

use App\Models\Genre;
use App\Http\Controllers\Admin\GenreController;

?>
<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Genres') }}
        </h2>
    </x-slot>
    <!-- open 1 -->
    <div class="py-12">
        <!-- open 2 -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- open 3 -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- open 4 outside form -->
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- changing store to update BREAKS IT!
                    <form action="{ { route('users.store') }}" method="post">
                    <form action="{{ route('genres.store',$genre->id) }}" method="POST">-->
                        <!-- form -->
                        <form action="{{ route('genres.update',$genre->id) }}" method="POST">
                        <!-- nope <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{ { csrf_token() }}"> -->
                        @csrf
                        @method('PATCH') <!-- changed from PUT-->

                        @if ($errors->any())
                            @foreach($errors->all() as $error)
                                <!-- in-form 1 ERRORS in-if -->
                                <div class="alert alert-error alert-sm my-2 py-1">
                                    <p class="flex-1">
                                        <i class="fas fa-exclamation-triangle mr-4 pl-2 pt-1"></i>
                                        <span>{{ $error  }}</span>
                                    </p>
                                </div> <!-- CLOSE form 1 from line 42 -->
                            @endforeach
                        @endif
                        <!-- inf-form 2 -->
                        <div class="form-control">
                            <label class="label" for="name">
                                <span class="label-text">Name</span>
                            </label>
                            <input type="text"
                                   name="name" id="name"
                                   placeholder="Genre"
                                   class="input input-bordered" value="{{ old('name') ?? $genre->name }}">
                        </div>  <!-- CLOSE form 2 from line 51 -->
                            <!-- in-form 3 -->
                        <div class="form-group">
                            <label class="label" for="parent">
                                <span class="label-text">Parent genre</span>
                            </label>
                            <select id="parent" name="parent" class="form-control">

                            @foreach($parents as $parent)
                                    <option value="{{ $parent->id }}"
                                @if($parent->id == $genre->parent)
                                     selected>
                                        @else
                                            >
                                        @endif
                                {{ $parent->name }}</option>
                                @endforeach

                            </select>
                        </div>
                            <div class="form-control">
                                <label class="label" for="icon"> <span class="label-text">Icon</span></label>
                                <input type="icon" name="icon" id="icon" class="input input-bordered" value="{{ old('icon') ?? $genre->icon }}">
                            </div>
                            <div class="py-6">
                                <button class="btn btn-sm btn-primary text-gray-50" type="submit">Update Genre</button>
                                <a class="btn btn-sm btn-secondary text-gray-50"
                                   href="{{ route('genres.index') }}">Back to Genres</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

