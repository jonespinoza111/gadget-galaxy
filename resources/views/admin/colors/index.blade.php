@extends('admin')

@section('dashboard_content')
    <div>
        <div>
            @if (session('message'))
                <div class="text-[18px] text-green-500">{{session('message')}}</div>
            @endif
            <div>
                <div class="card-header flex flex-row justify-start items-center">
                    <h4 class="text-[20px]">Colors List</h4>
                    <a href="{{ url('admin/colors/create') }}" class="w-[200px] p-3 bg-blue-200 flex justify-center items-center" type="submit">Add Color</a>
                </div>
                <div class="card-body">
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
                                        <a href="{{ url('admin/colors/'.$color->id.'/edit') }}" class="w-[150px] px-5 py-2 bg-blue-400">Edit</a>
                                        <a href="{{ url('admin/colors/'.$color->id.'/delete') }}" onclick="return confirm('Are you sure you want to delete this color?')" 
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