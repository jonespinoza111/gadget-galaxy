@extends('admin')

@section('dashboard_content')
    <div>
        <div>
            <div>
                <div class="card-header flex flex-row justify-between items-center">
                    <h4 class="text-[20px]">Add Category</h4>
                    <a href="{{ url('admin/category') }}" class="w-[200px] p-3 bg-blue-200 hover:bg-blue-300 flex justify-center items-center" type="submit">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/category') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col gap-y-4">
                            <div class="flex flex-col gap-y-4 sm:flex-row gap-x-5">
                                <div class="flex flex-col">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" />
                                </div>
                                <div class="flex flex-col">
                                    <label>Slug</label>
                                    <input type="text" name="slug" class="form-control" />
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <label>Description</label>
                                <textarea type="text" name="description" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="flex flex-row justify-start items-center">
                                <div>
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control" />
                                </div>
                                <div>
                                    <label>Status</label>
                                    <input type="checkbox" name="status" />
                                </div>
                            </div>
                            <div class="">
                                <h2 class="text-[18px] font-semibold">SEO Tags</h2>
                                <div class="flex flex-col">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" />
                                </div>
                                <div class="flex flex-col">
                                    <label>Meta Keyword</label>
                                    <textarea name="meta_keyword" class="p-2" ></textarea>
                                </div>
                                <div class="flex flex-col">
                                    <label>Meta Description</label>
                                    <textarea name="meta_description" class="p-2"></textarea>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="w-[200px] p-3 bg-blue-200 hover:bg-blue-300 flex justify-center items-center" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection