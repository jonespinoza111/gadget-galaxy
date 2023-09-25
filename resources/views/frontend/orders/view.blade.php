@extends('main')
@section('title','Order Details')
@section("content")
    <div class="w-full flex flex-col py-10 px-8 justify-center">
        <div class="flex flex-col sm:flex-row w-full mb-4 gap-x-3 gap-y-3">
            <h3 class="text-[1.5em]">Order Details</h3>
            <a href="{{ url('orders') }}" class="w-[200px] bg-blue-200 hover:bg-blue-300 text-center px-4 py-2">Back</a>
        </div>
        <div class="flex flex-col gap-x-6 gap-y-6">
            <div class="flex flex-col md:flex-row gap-y-3">
                <div>
                    <h4 class="font-semibold">Details</h4>
                    <h5>Order ID: {{$order->id}}</h5>
                    <h5>Tracking No: {{$order->tracking_no}}</h5>
                    <h5>Ordered Date: {{$order->created_at->format('d-m-Y h:i A')}}</h5>
                    <h5>Payment Method: {{$order->payment_method}}</h5>
                    <h6>Order Status: {{$order->status_message}}</h6>
                </div>
                <div>
                    <h4 class="font-semibold">User Details</h4>
                    <h5>Fullname: {{$order->fullname}}</h5>
                    <h5>Email: {{$order->email}}</h5>
                    <h5>Phone: {{$order->phone}}</h5>
                    <h6>Address: {{$order->address}}</h6>
                    <h5>Pincode: {{$order->pincode}}</h5>
                </div>
            </div>
            <div class="flex flex-col">
                <h5 class="font-semibold">Order Items</h5>
                <div class="overflow-x-auto">
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
@endsection