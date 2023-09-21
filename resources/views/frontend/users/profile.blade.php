@extends('main')
@section('title','User Profile')
@section("content")
    <div>
        <div class="container">
            <div>
                <div class="flex flex-col">
                        <div class="px-10 py-5">
                            <h3 class="font-semibold">
                                User Profile
                                <a href="{{ url('change-password') }}" class="w-[200px] bg-yellow-200 px-4 py-2">Change Password</a>
                            </h3>
                        </div>
                        <div class="flex flex-row gap-4 px-10 py-5">
                            <div>
                                <div class="card-header">
                                    <h4>User Details</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('profile') }}" method="POST">
                                        @csrf
                                        <div class="flex flex-row flex-wrap">
                                            <div class="w-[45%]">
                                                <label>Username</label>
                                                <input type="text" name="username" value={{ Session::get('user')['name']}}  />
                                            </div>
                                            <div class="w-[45%]">
                                                <label>Email Address</label>
                                                <input type="text" readonly value={{ Session::get('user')['email']}} name="email" value=""  />
                                            </div>
                                            <div class="w-[45%]">
                                                <label>Phone Number</label>
                                                <input type="text" name="phone" value={{ Session::get('user')->userDetail->phone ?? ''}}  />
                                            </div>
                                            <div class="w-[45%]">
                                                <label>Zip Code</label>
                                                <input type="text" name="zip_code" value={{ Session::get('user')->userDetail->zip_code ?? ''}}  />
                                            </div>
                                            <div class="w-[45%]">
                                                <label>Address</label>
                                                <textarea name="address" rows="3">{{ Session::get('user')->userDetail->address ?? ''}}</textarea>
                                            </div>
                                            <div>
                                                <button type="submit" class="w-[200px] bg-blue-200 px-4 py-2">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    
    </div>
@endsection