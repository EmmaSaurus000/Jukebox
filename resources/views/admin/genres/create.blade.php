<?php
/**
 * Filename      : create.blade.php
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
            {{ __('Add Genre') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('genres.store') }}" method="post">
                        @csrf
                        <div class="form-control">
                            <label class="label" for="name">
                                <span class="label-text">Genre name</span>
                            </label>
                            <input type="text"
                                   name="name" id="name"
                                   placeholder="Name"
                                   class="input input-bordered">
                            <div class="form-control">
                                <label class="label" for="parent"> <span class="label-text">Parent genre</span></label>
                                <!-- <input type="int" name="parent" id="parent"
                                       placeholder="Parent" value="{ { old('parent') }}" class="input input-bordered">
                                -->
                                <select id="parent" name="parent" class="form-control">

                                @foreach($parents as $parent)
                                        <option value="{{ $parent->id }}">
                                            {{ $parent->name }}</option>
                                @endforeach

                                </select>
                            </div>
                            <div class="form-control">
                                <label class="label" for="icon"> <span class="label-text">Icon</span></label>
                                <input type="text" name="icon" id="icon"
                                       placeholder="Icon" value="{{ old('icon') }}" class="input input-bordered">
                            </div>
                            <div class="py-6">
                                <button class="btn btn-sm btn-primary text-gray-50" type="submit">Save new genre</button>
                                <a class="btn btn-sm btn-secondary text-gray-50"
                                   href="{{ route('genres.index') }}">Back to Genres</a>
                                <button class="btn btn-sm btn-accent" type="reset">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>

                <p class="pt-6">
                    <a href="{{ url('genres') }}" class="btn btn-sm btn-accent">Back to Genres</a>
                </p>
            </div>
            @if ($errors->any())
                <div class="alert alert-error">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</x-guest-layout>


