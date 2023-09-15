<div class="flex flex-row">
    <div class="mx-6 my-3 w-[20%] border-2 border-gray-100">
        @if ($category->brands)
            <div class="card">
                <div class="card-header py-3 px-5 bg-gray-100"><span class="text-[1.2em]">Brands</span></div>
                @foreach ($category->brands as $brand)
                    <div class="card-body py-3 px-5">
                        <label>
                            <input type="checkbox" wire:model.live="brandInputs" value="{{$brand->name}}" /> {{$brand->name}}
                        </label>                
                    </div>
                @endforeach
            </div>
        @endif

        <div class="card mt-3">
            <div class="card-header py-3 px-5 bg-gray-100"><span class="text-[1.2em]">Price</span></div>
            <div class="card-body py-3 px-5 flex flex-col">
                <label>
                    <input type="radio" name="priceSort" wire:model.live="priceInput" value="high-to-low" /> High to Low
                </label>  
                <label>
                    <input type="radio" name="priceSort" wire:model.live="priceInput" value="low-to-high" /> Low to High
                </label>                   
            </div>
        </div>
    </div>
    <div class="flex flex-row flex-wrap w-[80%] h-auto mx-6 my-3 gap-3">
        @forelse ($products as $product)    
            <div class="w-[25em] relative h-[500px] bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="{{ url('/collections/'.$product->category->slug).'/'.$product->slug }}" class="w-[100%]">
                    @if ($product->productImages->count() > 0)
                        <img class="p-8 rounded-t-lg object-fill h-[60%]" src="{{ asset($product->productImages[0]->image) }}" alt="{{ $product->name }}" />
                    @endif
                </a>
                <div class="px-5 pb-5">
                    <a href="#">
                        <h3 class="text-xl font-semibold tracking-tight text-gray-400 dark:text-white">{{$product->brand}}</h3>
                    </a>
                    <a href="{{ url('/collections/'.$product->category->slug).'/'.$product->slug }}">
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$product->name}}</h5>
                    </a>
                    @if ($product->quantity > 0)
                        <label>In Stock</label>
                    @else
                        <label>Out of Stock</label>
                    @endif
                    <label></label>
                    <div class="flex items-center mt-2.5 mb-5">
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
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-3xl font-bold text-gray-900 dark:text-white">${{$product->selling_price}}</span>
                        <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add to cart</a>
                    </div>
                </div>
            </div>
    
        @empty
            <div>No Products Available for {{$category->name}}</div>
        @endforelse
    </div>
</div>
