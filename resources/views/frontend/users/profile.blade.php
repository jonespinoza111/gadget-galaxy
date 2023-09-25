@extends('main')
@section('title','User Profile')
@section("content")
    <div>
        <div class="container">
            <div>
                <div class="flex flex-col">
                        <div class="w-full px-10 py-5 flex flex-col sm:flex-row sm:justify-between gap-3">
                            <h3 class="text-[1.2em] font-semibold">
                                User Profile
                                <a href="{{ url('change-password') }}" class="w-[200px] bg-yellow-200 px-4 py-2 text-[16px]">Change Password</a>
                            </h3>
                        </div>
                        <div class="flex flex-row gap-4 px-10 py-5">
                            <div class="flex flex-col gap-y-3">
                                <div class="card-header">
                                    <h4>User Details</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('profile') }}" method="POST">
                                        @csrf
                                        <div class="flex flex-col sm:flex-row flex-wrap gap-3">
                                            <div class="w-full sm:w-[40%] flex flex-col">
                                                <label>Username</label>
                                                <input type="text" name="username" value={{ Session::get('user')['name']}}  />
                                            </div>
                                            <div class="w-full sm:w-[40%] flex flex-col">
                                                <label>Email Address</label>
                                                <input type="text" readonly value={{ Session::get('user')['email']}} name="email" value=""  />
                                            </div>
                                            <div class="w-full sm:w-[40%] flex flex-col">
                                                <label>Phone Number</label>
                                                <input type="text" name="phone" value={{ Session::get('user')->userDetail->phone ?? ''}}  />
                                            </div>
                                            <div class="w-full sm:w-[40%] flex flex-col">
                                                <label>Zip Code</label>
                                                <input type="text" name="zip_code" value={{ Session::get('user')->userDetail->zip_code ?? ''}}  />
                                            </div>
                                            <div class="w-full sm:w-[40%] flex flex-col">
                                                <label>Address</label>
                                                <textarea class="p-2" name="address" rows="3">{{ Session::get('user')->userDetail->address ?? ''}}</textarea>
                                            </div>
                                        </div>
                                        <div class="mt-5">
                                            <button type="submit" class="w-[200px] bg-blue-200 px-4 py-2">Save</button>
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