@extends('main')
@section('title','Featured Products')
@section("content")
    <div>
        <div class="w-screen pb-10">
            <div>
                <div class="flex flex-col">
                        <div class="px-10 py-5"><h3 class="font-semibold">Trending Products</h3></div>
                        <div class="flex flex-col md:flex-row flex-wrap gap-4 px-10 py-5">
                            @forelse ($trendingProducts as $product)    
                                <div class="min-w-[16em] max-w-[16em] relative h-[390px] py-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                    <a href="{{ url('/collections/'.$product->category->slug).'/'.$product->slug }}" class="w-[100%]">
                                        @if ($product->productImages->count() > 0)
                                            <img class="p-8 rounded-t-lg object-fill h-[60%] w-full" src="{{ asset($product->productImages[0]->image) }}" alt="{{ $product->name }}" />
                                        @endif
                                    </a>
                                    <div class="px-5 pb-5">
                                        <a href="#">
                                            <h3 class="text-xl font-semibold tracking-tight text-gray-400 dark:text-white">{{$product->brand}}</h3>
                                        </a>
                                        <a href="{{ url('/collections/'.$product->category->slug).'/'.$product->slug }}">
                                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white truncate">{{$product->name}}</h5>
                                        </a>
                                        <div class="flex items-center justify-between pt-3">
                                            <span class="text-3xl font-bold text-gray-900 dark:text-white">${{$product->selling_price}}</span>
                                            <a href="{{ url('/collections/'.$product->category->slug).'/'.$product->slug }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">View</a>
                                        </div>
                                    </div>
                                </div>
                            @empty         
                                <div>
                                    <div>No Featured Products Available</div>
                                </div>
                            @endforelse
                        </div>
                        <div class="px-10 py-5">
                            <a href="{{ url('collections') }}" class="bg-blue-200 w-[200px] px-4 py-2">View More</a>
                        </div>
                </div>
            </div>
        </div>
    
    </div>
@endsection