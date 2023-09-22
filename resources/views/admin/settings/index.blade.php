@extends('admin')

@section('title', 'Admin Settings')

@section('dashboard_content')
    <div>
        @if (session('message'))
            <div class="text-[18px] text-green-500">{{session('message')}}</div>
        @endif
        <div>
            <form action="{{ url('/admin/settings') }}" method="POST">
                @csrf

                <div class="card">
                    <div class="card-header">
                        <h3 class="text-[1.2em] font-semibold">Website</h3>
                    </div>
                    <div class="card-body my-3">
                        <div class="flex flex-row flex-wrap gap-3">
                            <div class="w-[45%] flex flex-col">
                                <label>Website Name</label>
                                <input type="text" name="website_name" value="{{ $settings->website_name ?? '' }}" />
                            </div>
                            <div class="w-[45%] flex flex-col">
                                <label>Website URL</label>
                                <input type="text" name="website_url" value="{{ $settings->website_url ?? '' }}" />
                            </div>
                            <div class="w-[91%] flex flex-col">
                                <label>Page Title</label>
                                <input type="text" name="page_title" value="{{ $settings->page_title ?? '' }}" />
                            </div>
                            <div class="w-[45%] flex flex-col">
                                <label>Meta Keyword</label>
                                <textarea name="meta_keyword" class="p-2" rows="3">{{ $settings->meta_keyword ?? '' }}</textarea>
                            </div>
                            <div class="w-[45%] flex flex-col">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="p-2" rows="3">{{ $settings->meta_description ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card my-[2em]">
                    <div class="card-header">
                        <h3 class="text-[1.2em] font-semibold">Website - Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="flex flex-row flex-wrap gap-3">
                            <div class="w-[91%] flex flex-col">
                                <label>Address</label>
                                <input type="text" name="address" value="{{ $settings->address ?? '' }}" />
                            </div>
                            <div class="w-[45%] flex flex-col">
                                <label>Phone 1 *</label>
                                <input type="text" name="phone1" value="{{ $settings->phone1 ?? '' }}" />
                            </div>
                            <div class="w-[45%] flex flex-col"> 
                                <label>Phone No. 2</label>
                                <input type="text" name="phone2" value="{{ $settings->phone2 ?? '' }}" />
                            </div>
                            <div class="w-[45%] flex flex-col">
                                <label>Email 1*</label>
                                <input type="text" name="email1" value="{{ $settings->email1 ?? '' }}" />
                            </div>
                            <div class="w-[45%] flex flex-col">
                                <label>Email 2</label>
                                <input type="text" name="email2" value="{{ $settings->email2 ?? '' }}" />
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">
                        <h3 class="text-[1.2em] font-semibold">Website - Social Media</h3>
                    </div>
                    <div class="card-body">
                        <div class="flex flex-row flex-wrap gap-3">
                            <div class="w-[45%] flex flex-col">
                                <label>Facebook (Optional)</label>
                                <input type="text" name="facebook" value="{{ $settings->facebook ?? '' }}" />
                            </div>
                            <div class="w-[45%] flex flex-col">
                                <label>Twitter (Optional)</label>
                                <input type="text" name="twitter" value="{{ $settings->twitter ?? '' }}" />
                            </div>
                            <div class="w-[45%] flex flex-col">
                                <label>Instagram (Optional)</label>
                                <input type="text" name="instagram" value="{{ $settings->instagram ?? '' }}" />
                            </div>
                            <div class="w-[45%] flex flex-col">
                                <label>YouTube (Optional)</label>
                                <input type="text" name="youtube" value="{{ $settings->youtube ?? '' }}" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-[1.5em]">
                    <button type="submit" class="w-[200px] px-4 py-2 bg-blue-200">Save Settings</button>
                </div>
            </form>
        </div>
    </div>
@endsection