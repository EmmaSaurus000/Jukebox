<?php
/**
 * Filename      : update.blade.php
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
            {{ __('Edit Users') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- changing store to update BREAKS IT!
                    <form action="{ { route('users.store') }}" method="post"> -->
                    <form action="{{ route('users.update',$user->id) }}" method="POST">
                        <!-- nope <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{ { csrf_token() }}"> -->
                        @csrf
                        @method('PATCH') <!-- changed from PUT-->

                        @if ($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-error alert-sm my-2 py-1">
                                    <p class="flex-1">
                                        <i class="fas fa-exclamation-triangle mr-4 pl-2 pt-1"></i>
                                        <span>{{ $error  }}</span>
                                    </p>
                                </div>
                            @endforeach
                        @endif
                        <div class="form-control">
                            <label class="label" for="username">
                                <span class="label-text">Username</span>
                            </label>
                            <input type="text"
                                   name="name" id="username"
                                   placeholder="Username"
                                   class="input input-bordered" value="{{ old('name') ?? $user->name }}">
                            <label class="label" for="email">
                                <span class="label-text">Email</span>
                            </label>
                            <input type="text"
                                   name="email" id="email"
                                   placeholder="Email"
                                   class="input input-bordered" value="{{ old('email') ?? $user->email }}">
                            @can('isAdmin')
                            <label class="label" for="role"> <span class="label-text">Role</span></label>

                                <select id="role" name="role" class="form-control">
                                    <option value="Manager"
                                        @if ($user->role == "manager") selected
                                        @endif
                                    >
                                        Manager</option>
                                    <option value="Astronaut"
                                        @if ($user->role == "astronaut") selected
                                        @endif
                                    >
                                        Astronaut</option>
                                </select>
                            @endcan
                            <div class="form-group">
                                <label class="label" for="password"> <span class="label-text">Password</span></label>
                                <input type="password" name="password" id="password"
                                       placeholder="Password" class="input input-bordered">
                            </div>
                            <div class="form-control">
                                <label class="label" for="confirm_password">
                                    <span class="label-text">Confirm password</span>
                                </label>
                                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm password" class="input input-bordered">
                            </div>
                            <div class="py-6">
                                <button class="btn btn-sm btn-primary text-gray-50" type="submit">Update User</button>
                                <a class="btn btn-sm btn-secondary text-gray-50"
                                   href="{{ route('users.index') }}">Back to Users</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

