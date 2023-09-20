@extends('admin')

@section('dashboard_content')
<div>
    <div>
        <div>
            @if (session('message'))
                <div class="text-[18px] text-green-500">{{session('message')}}</div>
            @endif
            <div>
                <div class="flex flex-col items-start justify-center">
                    <h4 class="text-[20px]">Dashboard</h4>
                    <p>Your Analytics Dashboard</p>
                    <hr>
                </div>
                <div class="flex flex-row flex-wrap gap-x-3">
                    <div class="flex flex-col my-4 bg-blue-200 px-4 py-5 min-w-[300px]">
                        <label>Total Orders</label>
                        <h1 class="text-[2em]">{{$totalOrders}}</h1>
                        <a href="{{ url('admin/orders') }}" class="underline">View</a>
                    </div>
                    <div class="flex flex-col my-4 bg-green-200 px-4 py-5 min-w-[300px]">
                        <label>Today's Orders</label>
                        <h1 class="text-[2em]">{{$todaysOrders}}</h1>
                        <a href="{{ url('admin/orders') }}" class="underline">View</a>
                    </div>
                    <div class="flex flex-col my-4 bg-red-200 px-4 py-5 min-w-[300px]">
                        <label>This Month's Orders</label>
                        <h1 class="text-[2em]">{{$thisMonthsOrders}}</h1>
                        <a href="{{ url('admin/orders') }}" class="underline">View</a>
                    </div>
                    <div class="flex flex-col my-4 bg-orange-200 px-4 py-5 min-w-[300px]">
                        <label>This Year's Orders</label>
                        <h1 class="text-[2em]">{{$thisYearsOrders}}</h1>
                        <a href="{{ url('admin/orders') }}" class="underline">View</a>
                    </div>
                    <div class="flex flex-col my-4 bg-yellow-200 px-4 py-5 min-w-[300px]">
                        <label>Total Products</label>
                        <h1 class="text-[2em]">{{$totalProducts}}</h1>
                        <a href="{{ url('admin/products') }}" class="underline">View</a>
                    </div>
                    <div class="flex flex-col my-4 bg-orange-200 px-4 py-5 min-w-[300px]">
                        <label>Total Categories</label>
                        <h1 class="text-[2em]">{{$totalCategories}}</h1>
                        <a href="{{ url('admin/category') }}" class="underline">View</a>
                    </div>
                    <div class="flex flex-col my-4 bg-yellow-200 px-4 py-5 min-w-[300px]">
                        <label>Total Brands</label>
                        <h1 class="text-[2em]">{{$totalBrands}}</h1>
                        <a href="{{ url('admin/brands') }}" class="underline">View</a>
                    </div>
                    <div class="flex flex-col my-4 bg-green-200 px-4 py-5 min-w-[300px]">
                        <label>All Users</label>
                        <h1 class="text-[2em]">{{$totalAllUsers}}</h1>
                        <a href="{{ url('admin/users') }}" class="underline">View</a>
                    </div>
                    <div class="flex flex-col my-4 bg-red-200 px-4 py-5 min-w-[300px]">
                        <label>Total Users</label>
                        <h1 class="text-[2em]">{{$totalUsers}}</h1>
                        <a href="{{ url('admin/users') }}" class="underline">View</a>
                    </div>
                    <div class="flex flex-col my-4 bg-blue-200 px-4 py-5 min-w-[300px]">
                        <label>Total Orders</label>
                        <h1 class="text-[2em]">{{$totalAdmins}}</h1>
                        <a href="{{ url('admin/users') }}" class="underline">View</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection