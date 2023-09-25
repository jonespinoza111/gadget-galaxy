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
                        <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">View</a>
                    </div>
                </div>
            </div>
        @empty
            <div>No Products Available for {{$category->name}}</div>
        @endforelse
    </div>
</div>
