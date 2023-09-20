@extends('admin')

@section('title', 'Create User')

@section('dashboard_content')
<div>
    <div>
        <div>
            @if (session('message'))
                <div class="text-[18px] text-green-500">{{session('message')}}</div>
            @endif
            <div>
                <div class="card-header flex flex-row justify-start items-center">
                    <h4 class="text-[20px]">Create User</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/users') }}" method="POST">
                        @csrf
                        <div class="flex flex-row flex-wrap gap-3">
                            <div class="w-[45%] flex flex-col">
                                <label>Name</label>
                                <input type="text" name="name" />
                            </div>
                            <div class="w-[45%] flex flex-col">
                                <label>Email</label>
                                <input type="text" name="email" />
                            </div>
                            <div class="w-[45%] flex flex-col"> 
                                <label>Password</label>
                                <input type="text" name="password" />
                            </div>
                            <div class="w-[45%] flex flex-col">
                                <label>Select Role</label>
                                <select name="role_as">
                                    <option value="">Select Role</option>
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                            <div class="w-[45%] flex flex-col">
                                <button type="submit" class="w-[200px] px-4 py-2 bg-blue-200">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection