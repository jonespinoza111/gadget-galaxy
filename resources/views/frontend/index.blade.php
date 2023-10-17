@extends('main')
@section('title','Home Page')
@section("content")
<div class="flex flex-col h-auto w-[100%]">
    
    <div id="default-carousel" class="relative w-full bg-gray-200" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            <!-- Item 1 -->
            @foreach ($sliders as $key => $slider)
                <div class="hidden duration-700 ease-in-out relative" data-carousel-item>
                    @if ($slider->image)
                        <img src="{{ asset("$slider->image") }}" class="absolute w-full object-fill h-56 md:h-96" alt="...">
                    @endif
                </div>
            @endforeach
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>  

    <div class="w-full p-10">
        <div class="py-5 flex flex-row justify-between">
            <h3 class="font-semibold">Trending Products</h3>
            <a href="{{ url('trending-products') }}" class="ml-2 w-[150px] px-4 py-2 bg-black text-white text-center">View More</a>
        </div>
        <div class="flex flex-row overflow-x-auto gap-x-10 sm:w-[80&] px-2 pb-5">
                @if ($trendingProducts)
                        @foreach ($trendingProducts as $product)    
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
                                    <label>New</label>
                                    <div class="flex items-center justify-between">
                                        <span class="text-3xl font-bold text-gray-900 dark:text-white">${{$product->selling_price}}</span>
                                        <a href="{{ url('/collections/'.$product->category->slug).'/'.$product->slug }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">View</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                @else
                    <div>
                        <div>No Trending Products Available</div>
                    </div>
                @endif
        </div>
    </div>

    <div class="w-full p-10">
        <div class="py-5 flex flex-row justify-between">
            <h3 class="font-semibold">New Arrivals</h3>
            <a href="{{ url('new-arrivals') }}" class="ml-2 w-[150px] px-4 py-2 bg-black text-white text-center">View More</a>
        </div>
        <div class="flex flex-row justify-start overflow-x-auto gap-x-10 sm:w-[80&] px-2 pb-5">
                @if ($newArrivalProducts)
                        @foreach ($newArrivalProducts as $product)    
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
                                    <label>New</label>
                                    <div class="flex items-center justify-between">
                                        <span class="text-3xl font-bold text-gray-900 dark:text-white">${{$product->selling_price}}</span>
                                        <a href="{{ url('/collections/'.$product->category->slug).'/'.$product->slug }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">View</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                @else
                    <div>
                        <div>No New Arrivals Available</div>
                    </div>
                @endif
        </div>
    </div>

    <div class="w-full p-10">
        <div class="py-5 flex flex-row justify-between">
            <h3 class="font-semibold">Featured Products</h3>
            <a href="{{ url('featured-products') }}" class="ml-2 w-[150px] px-4 py-2 bg-black text-white text-center">View More</a>
        </div>
        <div class="flex flex-row justify-start overflow-x-auto gap-x-10 sm:w-[80&] px-2 pb-5">
                @if ($featuredProducts)
                        @foreach ($featuredProducts as $product)    
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
                                    <label>New</label>
                                    {{-- <div class="flex items-center mt-2.5 mb-5">
                                        <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                        </svg>
                                        <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                        </svg>
                                        <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                        </svg>
                                        <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                        </svg>
                                        <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                        </svg>
                                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">5.0</span>
                                    </div> --}}
                                    <div class="flex items-center justify-between">
                                        <span class="text-3xl font-bold text-gray-900 dark:text-white">${{$product->selling_price}}</span>
                                        <a href="{{ url('/collections/'.$product->category->slug).'/'.$product->slug }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">View</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                @else
                    <div>
                        <div>No Featured Products Available</div>
                    </div>
                @endif
        </div>
    </div>
</div>
@endsection