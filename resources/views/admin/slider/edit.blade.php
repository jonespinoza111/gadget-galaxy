@extends('admin')

@section('dashboard_content')
    <div>
        <div>
            <div>
                <div class="card-header flex flex-col gap-y-3 sm:flex-row sm:justify-between sm:items-center mb-4">
                    <h4 class="text-[20px]">Add Slider</h4>
                    <a href="{{ url('admin/sliders') }}" class="w-[200px] p-3 bg-blue-200 hover:bg-blue-300 flex justify-center items-center" type="submit">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/sliders/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-col gap-y-4">
                                <div class="flex flex-col w-full sm:w-[40%]">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control" value="{{$slider->title}}" />
                                </div>
                                <div class="flex flex-col w-full sm:w-[40%]">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control p-2" rows="3">{{$slider->description}}</textarea>
                                </div>
                                <div class="flex flex-col gap-y-3 w-full sm:w-[40%]">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control" />
                                    <img class="w-[70px] h-[70px]" src="{{ asset("$slider->image") }}" alt="slider" />
                                </div>
                                <div>
                                    <label>Status</label>
                                    <input type="checkbox" name="status" {{$slider->status == "1" ? 'checked' : ''}} />
                                    <span class="ml-3">
                                        Checked=Hidden, Unchecked=Visible
                                    </span>
                                </div>
                                <div>
                                    <button type="submit" class="w-[200px] p-3 bg-blue-200 hover:bg-blue-300 flex justify-center items-center" type="submit">Update</button>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection