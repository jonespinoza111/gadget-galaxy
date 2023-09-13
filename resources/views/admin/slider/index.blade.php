@extends('admin')

@section('dashboard_content')
    <div>
        <div>
            @if (session('message'))
                <div class="text-[18px] text-green-500">{{session('message')}}</div>
            @endif
            <div>
                <div class="card-header flex flex-row justify-start items-center">
                    <h4 class="text-[20px]">Slider List</h4>
                    <a href="{{ url('admin/sliders/create') }}" class="w-[200px] p-3 bg-blue-200 flex justify-center items-center" type="submit">Add Slider</a>
                </div>
                <div class="card-body">
                    <table class="border-spacing-4 border-separate border">
                        <thead>
                            <tr>
                                <th class="w-[200px] text-start">ID</th>
                                <th class="w-[200px] text-start">Title</th>
                                <th class="w-[200px] text-start">Description</th>
                                <th class="w-[200px] text-start">Image</th>
                                <th class="w-[200px] text-start">Status</th>
                                <th class="w-[200px] text-start">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)
                                <tr class="">
                                    <td>{{$slider->id}}</td>
                                    <td>{{$slider->title}}</td>
                                    <td>{{$slider->description}}</td>
                                    <td>
                                        <img src="{{ asset("$slider->image") }} " alt="slider" class="w-[70px] h-[70px]"  />
                                    </td>
                                    <td>{{$slider->status == '1' ? 'Hidden' : 'Visible'}}</td>
                                    <td>
                                        <a href="{{ url('admin/sliders/'.$slider->id.'/edit') }}" class="w-[150px] px-5 py-2 bg-blue-400">Edit</a>
                                        <a href="{{ url('admin/sliders/'.$slider->id.'/delete') }}" onclick="return confirm('Are you sure you want to delete this slider?')" 
                                        class="w-[150px] px-5 py-2 bg-red-500">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection