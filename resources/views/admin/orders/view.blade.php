@extends('admin')
@section('title','Order Details')
@section("dashboard_content")
    <div>
        @if (session('message'))
            <div class="text-[18px] text-green-500">{{session('message')}}</div>
        @endif
        <div class="w-full flex flex-col py-10 px-8 justify-center">
            <div class="flex flex-row w-full justify-between">
                <h3 class="text-[1.5em]">Order Details</h3>
                <div class="buttons-container">
                    <a href="{{ url('admin/orders') }}" class="w-[200px] bg-blue-200 hover:bg-blue-300 px-4 py-2">Back</a>
                    <a href="{{ url('admin/invoice/'.$order->id.'/generate') }}" class="w-[200px] bg-green-200 hover:bg-green-300 px-4 py-2">Download Invoice</a>
                    <a href="{{ url('admin/invoice/'.$order->id) }}" target="_blank" class="w-[200px] bg-blue-200  hover:bg-blue-300 px-4 py-2">View Invoice</a>
                    <a href="{{ url('admin/invoice/'.$order->id.'/mail') }}" target="_blank" class="w-[200px] bg-purple-200 hover:bg-purple-300 px-4 py-2">Send  Invoice Via Mail</a>
                </div>
            </div>
            <div class="flex flex-col gap-x-6 gap-y-6">
                <div class="flex flex-row pb-5 pt-8">
                    <div class="w-[50%] flex flex-col gap-y-2">
                        <h4 class="text-[1.2em] font-semibold">Details</h4>
                        <h5>Order ID: <span class="font-light">{{$order->id}}</span></h5>
                        <h5>Tracking No: <span class="font-light">{{$order->tracking_no}}</span></h5>
                        <h5>Ordered Date: <span class="font-light">{{$order->created_at->format('d-m-Y h:i A')}}</span></h5>
                        <h5>Payment Method: <span class="font-light">{{$order->payment_method}}</span></h5>
                        <h6>Order Status: <span class="font-light">{{$order->status_message}}</span></h6>
                    </div>
                    <div class="w-[50%] flex flex-col gap-y-2">
                        <h4 class="text-[1.2em] font-semibold">User Details</h4>
                        <h5>Fullname: <span class="font-light">{{$order->fullname}}</span></h5>
                        <h5>Email: <span class="font-light">{{$order->email}}</span></h5>
                        <h5>Phone: <span class="font-light">{{$order->phone}}</span></h5>
                        <h6>Address: <span class="font-light">{{$order->address}}</span></h6>
                        <h5>Pincode: <span class="font-light">{{$order->pincode}}</span></h5>
                    </div>
                </div>
                <div class="flex flex-col">
                    <h5 class="mb-2 font-light">Order Items</h5>
                    <div>
                        <table class="border-spacing-4 border-separate border">
                            <thead>
                                <tr>
                                    <th class="w-[200px] text-start">Item ID</th>
                                    <th class="w-[200px] text-start">Image</th>
                                    <th class="w-[200px] text-start">Product</th>
                                    <th class="w-[200px] text-start">Price</th>
                                    <th class="w-[200px] text-start">Quantity</th>
                                    <th class="w-[200px] text-start">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalPrice = 0;    
                                @endphp
                                @forelse ($order->orderItems as $orderItem)
                                    <tr class="">
                                        <td>{{$orderItem->id}}</td>
                                        <td>
                                            @if ($orderItem->product->productImages)
                                                <img src="{{ asset($orderItem->product->productImages[0]->image) }}" class="w-[50px] h-[50px]" />
                                                {{$orderItem->tracking_no}}
                                            @else
                                                <img src="" class="w-[50px] h-[50px]" alt="" />
                                            @endif
                                        </td>
                                        <td>
                                            {{$orderItem->product->name}}
                                            @if ($orderItem->productColor)
                                                @if ($orderItem->productColor->color)
                                                    <span>- Color: {{$orderItem->productColor->color->name}}</span>
                                                @endif
                                            @endif
                                        </td>
                                        <td>{{$orderItem->price}}</td>
                                        <td>{{$orderItem->quantity}}</td>
                                        <td class="font-semibold">${{$orderItem->quantity * $orderItem->price}}</td>
                                    </tr>
                                    @php
                                        $totalPrice += $orderItem->quantity * $orderItem->price;    
                                    @endphp
                                @empty
                                    <tr>
                                        <td>No Orders Items</td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <td colspan="5" class="font-bold">Total Amount:</td>
                                    <td class="font-bold">${{$totalPrice}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full flex flex-col py-10 px-8 justify-center">
            <div class="card-body">
                <h4 class="mb-3">Order Process (Order Status Updated)</h4>
                <div class="flex flex-col gap-y-2">
                    <div>
                        <form action="{{ url('admin/orders/'.$order->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="flex flex-row items-center gap-x-3">
                                <label>Update Your Order Status</label>
                                <div>
                                    <select name="order_status" class="w-[200px] py-2 px-4">
                                        <option value="">Select Status</option>
                                        <option value="in-progress" {{ Request::get('order_status') == 'in-progress' ? 'selected' : ''}}>In Progress</option>
                                        <option value="completed" {{ Request::get('order_status') == 'completed' ? 'selected' : ''}}>Completed</option>
                                        <option value="pending" {{ Request::get('order_status') == 'pending' ? 'selected' : ''}}>Pending</option>
                                        <option value="cancelled" {{ Request::get('order_status') == 'cancelled' ? 'selected' : ''}}>Cancelled</option>
                                        <option value="out-for-delivery" {{ Request::get('order_status') == 'out-for-delivery' ? 'selected' : ''}}>Out for Delivery</option>
                                    </select>
                                    <button type="submit" class="w-[200px] px-4 py-2 bg-blue-200 hover:bg-blue-300 ml-2">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="">
                        <h4>Current Order Status: <span class="uppercase">{{ $order->status_message }}</span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection