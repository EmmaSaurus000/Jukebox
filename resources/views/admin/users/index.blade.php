<?php
/**
 * Filename      : index.blade.php
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
{{ __('Users') }}
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
                            @can('isAdmin')
                            <th>Role</th>
                            @endcan
                            <th class="flex justify-between">
                                <span class="pt-2">Actions</span><a href="{{ route('users.create') }}" class="btn btn-sm btn-primary text-gray-50">Add User</a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key=>$user)
                            <tr class="hover">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                @can('isAdmin')
                                    <td>{{$user->role}}</td>
                                @endcan
                                <td>
                                    <a href="{{ url('/admin/users/'.$user->id) }}"
                                       class="btn btn-sm btn-primary text-gray-50">Details</a>
                                    <a href="{{ url('admin/users/'.$user->id.'/edit') }}" class="btn btn-sm btn-secondary">Edit</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            @if ($users instanceof \Illuminate\Pagination\LengthAwarePaginator )
                            <td colspan="5">
                                {{ $users->links() }}
                            </td>
                            @endif
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</x-guest-layout>

