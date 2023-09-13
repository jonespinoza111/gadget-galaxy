@extends('main')
@section('content')
<div class="custom-product">
    <div>
        <div class="mx-10 my-5">
            <h4>Result for Products</h4>
            <div class="flex flex-col gap-y-4 m-5">
            @foreach($products as $item)
                <div class="flex flex-row items-center gap-x-3 border-[#ccc] border-b-2 pb-6">
                    <div class="searched-item">
                        <a href="detail/{{$item->id}}">
                            <img class="product-image w-[10em] h-[8em]" src="{{$item->gallery}}" />
                        </a>
                    </div>
                    <div class="searched-item">
                        <div class="">
                            <h2 class="font-bold">{{$item->name}}</h2>
                            <h5>{{$item->description}}</h5>
                        </div>
                    </div>
                    <div class="searched-item">
                        <a href="/removecart/{{$item->cart_id}}" class="w-auto p-2 bg-orange-200 text-[0.9em] ">Remove from Cart</a>
                    </div>
                </div>
                @endforeach
            </div>
            <a href="ordernow" class="w-auto bg-green-200 p-3">Order Now</a>
        </div>
    </div>
</div>
@endsection