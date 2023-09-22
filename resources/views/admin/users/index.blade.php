@extends('admin')

@section('title', 'Users List')

@section('dashboard_content')
<div>
    <div class="w-full flex flex-col py-4 px-3 md:py-5 md:px-8 justify-center">
        <div>
            @if (session('message'))
                <div class="text-[18px] text-green-500">{{session('message')}}</div>
            @endif
            <div>
                <div class="card-header flex flex-col gap-y-3 sm:flex-row gap-x-3 sm:justify-between sm:items-center mb-4">
                    <h4 class="text-[1.5em]">Users</h4>
                    <a href="{{ url('admin/users/create') }}" class="w-[200px] p-3 bg-blue-200 hover:bg-blue-300 flex justify-center items-center" type="button">Add User</a>
                </div>
                <div class="card-body overflow-x-auto">
                    <table class="border-spacing-4 border-separate border">
                        <thead>
                            <tr>
                                <th class="w-[200px] text-start">ID</th>
                                <th class="w-[200px] text-start">Name</th>
                                <th class="w-[200px] text-start">Email</th>
                                <th class="w-[200px] text-start">Role</th>
                                <th class="w-[200px] text-start">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr class="">
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if ($user->role_as == '0')
                                            <label>User</label>
                                        @elseif ($user->role_as == '1')
                                            <label>Admin</label>
                                        @else
                                            <label>None</label>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="flex flex-col md:flex-row gap-y-2">
                                            <a href="{{ url('admin/users/'.$user->id.'/edit') }}" class="w-[100px] md:w-[150px] px-5 py-2 bg-blue-400 hover:bg-blue-500">Edit</a>
                                            <a href="{{ url('admin/users/'.$user->id.'/delete') }}" onclick="return confirm('Are you sure you want to delete this user?')"
                                             class="w-[100px] md:w-[150px] px-5 py-2 bg-red-400 hover:bg-red-500">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No Users Available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection