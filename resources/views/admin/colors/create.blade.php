@extends('admin')

@section('dashboard_content')
    <div>
        <div>
            <div>
                <div class="card-header flex flex-row justify-start items-center">
                    <h4 class="text-[20px]">Add Color</h4>
                    <a href="{{ url('admin/colors') }}" class="w-[200px] p-3 bg-blue-200 flex justify-center items-center" type="submit">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/colors/create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col gap-y-4">
                                <div class="flex flex-col w-[20%]">
                                    <label>Color Name</label>
                                    <input type="text" name="name" class="form-control" />
                                </div>
                                <div class="flex flex-col w-[20%]">
                                    <label>Color Code</label>
                                    <input type="text" name="code" class="form-control" />
                                </div>
                                <div>
                                    <label>Status</label>
                                    <input type="checkbox" name="status" />Checked=Hidden, Unchecked=Visible
                                </div>
                                <div>
                                    <button type="submit" class="w-[200px] p-3 bg-blue-200 flex justify-center items-center" type="submit">Save</button>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection