@extends('admin')

@section('dashboard_content')
    <div>
        <div>
            <div>
                <div class="card-header flex flex-row justify-between items-center">
                    <h4 class="text-[20px]">Edit Category</h4>
                    <a href="{{ url('admin/category') }}" class="w-[200px] p-3 bg-blue-200 hover:bg-blue-300 flex justify-center items-center" type="submit">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-col gap-y-4">
                            <div class="flex flex-row gap-x-5">
                                <div class="flex flex-col">
                                    <label>Name</label>
                                    <input type="text" value="{{ $category->name }}" name="name" class="form-control" />
                                </div>
                                <div class="flex flex-col">
                                    <label>Slug</label>
                                    <input type="text" value="{{ $category->slug }}" name="slug" class="form-control" />
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <label>Description</label>
                                <textarea type="text" name="description" class="form-control" rows="3">{{ $category->description }}</textarea>
                            </div>
                            <div class="flex flex-row justify-start items-center">
                                <div class="flex flex-col gap-y-3">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control" />
                                    <img src="{{ asset('/uploads/category/'.$category->image) }}" width="60px" height="60px" />
                                </div>
                                <div>
                                    <label>Status</label>
                                    <input type="checkbox" value="{{ $category->status == '1' ? 'checked' : '' }}" name="status" />
                                </div>
                            </div>
                            <div class="">
                                <h2 class="text-[18px] font-semibold">SEO Tags</h2>
                                <div class="flex flex-col">
                                    <label>Meta Title</label>
                                    <input type="text" value="{{ $category->meta_title }}" name="meta_title" />
                                </div>
                                <div class="flex flex-col">
                                    <label>Meta Keyword</label>
                                    <textarea name="meta_keyword" class="p-2" >{{ $category->meta_keyword }}</textarea>
                                </div>
                                <div class="flex flex-col">
                                    <label>Meta Description</label>
                                    <textarea name="meta_description" class="p-2">{{ $category->meta_description }}</textarea>
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