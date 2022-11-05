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
            {{ __('Add User') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf
                        <div class="form-control">
                            <label class="label" for="username">
                                <span class="label-text">Username</span>
                            </label>
                            <input type="text"
                            name="name" id="username"
                            placeholder="Username"
                            class="input input-bordered" value="{{ old('name') }}">
                            <div class="form-control">
                                <label class="label" for="email"> <span class="label-text">Email</span></label>
                                <input type="email" name="email" id="email"
                                      placeholder="Email" value="{{ old('email') }}" class="input input-bordered">
                            </div>
                            <div>
                                <label class="label" for="role"> <span class="label-text">Role</span></label>
                                @can('isAdmin')
                                    <select id="role" name="role" class="form-control">
                                        <option value="Manager">
                                            Manager</option>
                                        <option value="Astronaut">
                                            Astronaut</option>
                                    </select>
                                @endcan
                            </div>
                            <div class="form-control">
                                <label class="label" for="password"> <span class="label-text">Password</span></label>
                                <input type="password" name="password" id="password"
                                placeholder="Password" class="input input-bordered">
                            </div>
                            <div class="form-control">
                                <label class="label" for="password_confirmation">
                                    <span class="label-text">Confirm password</span>
                                </label>
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm password" class="input input-bordered">
                            </div>
                            <div class="py-6">
                                <button class="btn btn-sm btn-primary text-gray-50" type="submit">Save new user</button>
                                <a class="btn btn-sm btn-secondary text-gray-50"
                                    href="{{ route('users.index') }}">Back to Users</a>
                                <button class="btn btn-sm btn-accent" type="reset">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>

                <p class="pt-6">
                    <a href="{{ url('/admin/users') }}" class="btn btn-sm btn-accent">Back to Users</a>
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


