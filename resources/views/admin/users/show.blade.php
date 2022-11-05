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
            {{ __('User Detail') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <dl class="grid grid-cols-6 gap-2">

                        <dt class="col-span-1">Name</dt>
                        <dd class="col-span-5">{{ $user->name }}</dd>
                        <dt class="col-span-1">Email</dt>
                        <dd class="col-span-5">{{ $user->email }}</dd>
                        <dt class="col-span-1">Playlists</dt>
                        <dd class="col-span-5">
                        @if($playlists)

                            @foreach($playlists as $playlist)
                                    <a href="{{ url('playlists/'.$playlist->id) }}" class="btn btn-sm btn-accent">{{ $playlist->name }}</a>
                                @endforeach
                            @else
                                No playlists created
                            @endif
                        </dd>
                        <dt class="col-span-1">Joined</dt>
                        <dd class="col-span-5">{{ $user->created_at }}</dd>
                        <!-- <dt class="col-span-1">Last logged in</dt>
                        <dd class="col-span-5">{ { '-' }}</dd> -->
                        <dt class="col-span-1">Actions</dt>
                        <dd class="col-span-5">
                            @canany(['isAdmin', 'isManager'])
                                <form action="{{ route('users.destroy',['user'=>$user]) }}"
                                      method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-secondary text-gray-50">
                                        Delete
                                    </button>
                                </form>
                            @endcanany

                            <a href="{{ url('admin/users/'.$user->id.'/edit') }}" class="btn btn-sm btn-secondary">Update</a></td>
                        </dd>
                    </dl>
                    @canany(['isAdmin', 'isManager'])
                    <p class="pt-6">
                        <a href="{{ url('/admin/users') }}" class="btn btn-sm btn-accent">Back to Users</a>
                    </p>
                    @endcanany
                </div>
                <p></p>
                @isset($public_playlist)
                <p></p>
                <div class="p-6 bg-white border-b border-gray-200">
                    <dl class="grid grid-cols-6 gap-2">
                        <dt class="col-span-1">Public Playlists</dt>
                        <dd class="col-span-5">
                            @foreach($public_playlists as $playlist)
                                <a href="{{ url('playlists/'.$playlist->id) }}" class="btn btn-sm btn-accent">{{ $playlist->name }}</a>
                            @endforeach
                        </dd>
                    </dl>
                </div>
                @endisset
            </div>
        </div>
    </div>
</x-guest-layout>


