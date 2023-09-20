@extends('admin')

@section('title', 'Users List')

@section('dashboard_content')
<div>
    <div>
        <div>
            @if (session('message'))
                <div class="text-[18px] text-green-500">{{session('message')}}</div>
            @endif
            <div>
                <div class="card-header flex flex-row justify-start items-center">
                    <h4 class="text-[20px]">Users</h4>
                    <a href="{{ url('admin/users/create') }}" class="w-[200px] p-3 bg-blue-200 flex justify-center items-center" type="button">Add User</a>
                </div>
                <div class="card-body">
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
                                        <a href="{{ url('admin/users/'.$user->id.'/edit') }}" class="w-[150px] px-5 py-2 bg-blue-400">Edit</a>
                                        <a href="{{ url('admin/users/'.$user->id.'/delete') }}" onclick="return confirm('Are you sure you want to delete this user?')"
                                         class="w-[150px] px-5 py-2 bg-red-500">Delete</a>
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