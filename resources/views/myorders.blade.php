@extends('main')
@section('content')
<div class="custom-product">
    <div>
        <div class="mx-10 my-5">
            <h4>My Orders</h4>
            <div class="flex flex-col gap-y-4 m-5">
            @if (count($orders) < 1)
                <h2>You have not placed any orders</h2>
            @else
            @foreach($orders as $order)
                <div class="flex flex-row items-center gap-x-3 border-[#ccc] border-b-2 pb-6">
                    <div class="searched-item w-[20em]">
                        <a href="detail/{{$order->id}}">
                            <img class="product-image" src="{{$order->gallery}}" />
                        </a>
                    </div>
                    <div class="searched-item">
                        <div class="">
                            <h2 class="font-bold">Name: {{$order->name}}</h2>
                            <h5>Delivery Status: {{$order->status}}</h5>
                            <h5>Address: {{$order->address}}</h5>
                            <h5>Payment Status: {{$order->payment_status}}</h5>
                            <h5>Payment Method: {{$order->payment_method}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
            </div>
        </div>
    </div>
</div>
@endsection