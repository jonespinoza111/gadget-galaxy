@extends('admin')
@section("dashboard_content")
    <div class="w-full flex flex-col py-10 px-8 justify-center">
        <div class="flex flex-col">
            <h3 class="text-[1.5em]">My Orders</h3>
        </div>
        <div class="card-body">
            <form action="" method="GET">
                <div class="flex flex-row gap-x-[1em] my-3 items center">
                    <div>
                        <label>Filter by Date</label>
                        <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d') }}" />
                    </div>
                    <div class="flex flex-row items-center">
                        <label class="mr-2">Filter by Date</label>
                        <select name="status" class="w-[200px] py-2 px-4">
                            <option value="">Select Status</option>
                            <option value="in-progress" {{ Request::get('status') == 'in-progress' ? 'selected' : ''}}>In Progress</option>
                            <option value="completed" {{ Request::get('status') == 'completed' ? 'selected' : ''}}>Completed</option>
                            <option value="pending" {{ Request::get('status') == 'pending' ? 'selected' : ''}}>Pending</option>
                            <option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected' : ''}}>Cancelled</option>
                            <option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected' : ''}}>Out for Delivery</option>
                        </select>
                    </div>
                    <div class="">
                        <button class="w-[200px] px-4 py-2 bg-green-200 hover:bg-green-300" type="submit">Filter</button>
                    </div>
                </div>
            </form>
            <table class="border-spacing-4 border-separate border">
                <thead>
                    <tr>
                        <th class="w-[200px] text-start">Order ID</th>
                        <th class="w-[200px] text-start">Tracking No</th>
                        <th class="w-[200px] text-start">Username</th>
                        <th class="w-[200px] text-start">Payment Method</th>
                        <th class="w-[200px] text-start">Ordered Date</th>
                        <th class="w-[200px] text-start">Status Message</th>
                        <th class="w-[200px] text-start">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr class="">
                            <td>{{$order->id}}</td>
                            <td>{{$order->tracking_no}}</td>
                            <td>{{$order->fullname}}</td>
                            <td>{{$order->payment_method}}</td>
                            <td>{{$order->created_at->format('d-m-Y')}}</td>
                            <td>{{$order->status_message}}</td>
                            <td>
                                <a href="{{ url('admin/orders/'.$order->id) }}" class="w-[150px] px-5 py-2 bg-blue-200 hover:bg-blue-300">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No Orders Available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div>
                {{$orders->links()}}
            </div>
        </div>
    </div>
@endsection