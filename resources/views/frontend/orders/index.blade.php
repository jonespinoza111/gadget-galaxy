@extends('main')
@section('title','My Orders')
@section("content")
    <div class="w-full flex flex-col py-4 px-4 md:py-10 md:px-8 justify-center">
        <div class="flex flex-col">
            <h3 class="text-[1.5em] mb-4">My Orders</h3>
        </div>
        <div class="card-body overflow-x-auto">
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
                                <a href="{{ url('orders/'.$order->id) }}" class="w-[150px] px-5 py-2 bg-blue-400">View</a>
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