@extends('main')
@section('title','Change Password')
@section("content")
    <div>
        <div class="container">
            <div>
                <div class="flex flex-col">
                        <div class="px-10 py-5">
                            <h3 class="font-semibold text-[1.2em]">
                                Change Password
                                <a href="{{ url('profile') }}" class="w-[200px] py-2 px-4 bg-blue-200 text-[16px]">Back</a>
                            </h3>
                        </div>
                        <div class="flex flex-row gap-4 px-10 py-5">
                            <div>
                                <div class="card-body">
                                    <form action="{{ url('change-password') }}" method="POST">
                                        @csrf
                                        <div class="flex flex-col sm:flex-row flex-wrap gap-3">
                                            <div class="w-full sm:w-[40%] flex flex-col">
                                                <label>Current Password</label>
                                                <input type="password" name="current_password" value=""  />
                                            </div>
                                            <div class="w-full sm:w-[40%] flex flex-col">
                                                <label>New Password</label>
                                                <input type="password" name="password" value="" />
                                            </div>
                                            <div class="w-full sm:w-[40%] flex flex-col">
                                                <label>Confirm Password</label>
                                                <input type="password" name="password_confirmation" />
                                            </div>
                                        </div>
                                        <div class="mt-5">
                                            <button type="submit" class="w-[200px] bg-blue-200 px-4 py-2">Update Password</button>
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