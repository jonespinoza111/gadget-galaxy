@extends('admin')

@section('dashboard_content')
    <div>
        <div class="w-full flex flex-col py-4 px-3 md:py-5 md:px-8 justify-center">
            @if (session('message'))
                <div class="text-[18px] text-green-500">{{session('message')}}</div>
            @endif
            <div>
                <div class="card-header flex flex-col sm:flex-row sm:justify-between sm:items-center mb-3 gap-y-3">
                    <h4 class="text-[1.5em]">Colors List</h4>
                    <a href="{{ url('admin/colors/create') }}" class="w-[200px] p-3 bg-blue-200 hover:bg-blue-300 flex justify-center items-center" type="submit">Add Color</a>
                </div>
                <div class="card-body overflow-x-auto">
                    <table class="border-spacing-4 border-separate border">
                        <thead>
                            <tr>
                                <th class="w-[200px] text-start">ID</th>
                                <th class="w-[200px] text-start">Name</th>
                                <th class="w-[200px] text-start">Status</th>
                                <th class="w-[200px] text-start">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($colors as $color)
                                <tr class="">
                                    <td>{{$color->name}}</td>
                                    <td>{{$color->code}}</td>
                                    <td>{{$color->status == '1' ? 'Hidden' : 'Visible'}}</td>
                                    <td>
                                        <div class="flex flex-col md:flex-row gap-y-2">
                                            <a href="{{ url('admin/colors/'.$color->id.'/edit') }}" class="w-[100px] md:w-[150px] px-5 py-2 bg-blue-400">Edit</a>
                                            <a href="{{ url('admin/colors/'.$color->id.'/delete') }}" onclick="return confirm('Are you sure you want to delete this color?')" 
                                            class="w-[100px] md:w-[150px] px-5 py-2 bg-red-500">Delete</a>
                                        </div>
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