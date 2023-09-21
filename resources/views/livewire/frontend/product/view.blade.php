<div class="flex flex-col w-screen">
    <div class="w-screen bg-[#EFF2F6] flex flex-row px-10 py-5">
        @if (session()->has('message'))
            <div class="px-5 py-3 bg-green-200 w-full">
                <h3>{{session('message')}}</h3>
            </div>
        @endif
    </div>
    <div class="container py-[2em] px-[2em] md:[4em] xl:px-[10em] flex flex-col md:flex-row m-0 w-screen bg-[#EFF2F6]">
        <div class="left-side w-[100%] md:w-[60%] md:mx-4 my-4 md:my-0  flex flex-col items-center bg-[#EFF2F6]">
            <div class="image-container w-[100%] flex justify-center items-center">
                @if ($product->productImages)
                    <img src="{{ asset($product->productImages[0]->image) }}" class="w-[30em] h-[25em]" />
                @else
                    No Images Available
                @endif
                {{-- @include('carousel') --}}
            </div>
            {{-- <div class="image-slider flex justify-center items-center w-[100%] h-[10em] bg-white">Images</div> --}}
        </div>
        <div class="right-side w-[100%] md:w-[40%] flex flex-col bg-[#EFF2F6] gap-y-5">
            <div class="product-specs-container flex flex-col gap-y-2 w-[100%] bg-white px-[1.5em] py-[1em] rounded">
                <div class="product-name text-[18px] font-semibold">{{$product->name}}</div>
                <div class="product-path text-[18px] font-light">        Home / {{$product->category->name}} / {{$product->name}}
                </div>
                <div class="flex flex-row gap-x-2">
                    <div class="product-selling-price text-[20px] font-bold">${{$product->selling_price}}</div>
                    <div class="product-original-price text-[20px] font-light">${{$product->original_price}}</div>
                </div>
                <div class="product-description text-[14px] font-light">{{$product->small_description}}</div>
                <div class="color-options-container">
                    @if ($product->productColors->count() > 0)
                        @if ($product->productColors)
                            <div class="flex flex-row gap-x-2 justify-start items-center">
                                @foreach ($product->productColors as $color)
                                    {{-- <input type="radio" name="colorSelection" value="{{ $color->id }}" /> <span class="capitalize">{{ $color->color->name }}</span> --}}
    
                                    <label class="bg-{{$color->color->code}}-200" wire:click="colorSelected({{ $color->id }})" >
                                        {{ $color->color->name }}
                                    </label>
                                @endforeach
                            </div>
                        @endif
                        <div class="my-3">
                            @if ($this->productColorQuantity == "outOfStock")
                                <label class="py-2 px-3 text-white bg-red-300">Out of Stock</label>
                            @else
                                <label class="py-2 px-3 text-white bg-green-300">In Stock</label>   
                            @endif
                        </div>
                    @else
                        <div class="my-2">
                            @if ($product->quantity)
                                <label class="py-2 px-3 text-white bg-green-300">In Stock</label>
                            @else
                                <label class="py-2 px-3 text-white bg-red-300">Out of Stock</label>
                            @endif
                        </div>
                    @endif
                    <h3 class="font-light text-[14px]">Color: Red</h3>
                    <div class="color-options flex flex-row gap-x-2 mt-1">
                        <div class="color-circle w-[2em] h-[2em] bg-red-200 rounded-full cursor-pointer border-black border-2"></div>
                        <div class="color-circle w-[2em] h-[2em] bg-blue-200 rounded-full cursor-pointer"></div>
                        <div class="color-circle w-[2em] h-[2em] bg-gray-200 rounded-full cursor-pointer"></div>
                        <div class="color-circle w-[2em] h-[2em] bg-yellow-200 rounded-full cursor-pointer"></div>
                        <div class="color-circle w-[2em] h-[2em] bg-green-200 rounded-full cursor-pointer"></div>
                    </div>
                </div>
                <div class="quantity-container my-4">
                    <label for="Quantity" class="sr-only"> Quantity </label>
                  
                    <div class="flex items-center gap-1">
                      <button
                        type="button"
                        wire:click="decrementQuantity"
                        class="h-10 w-10 flex justify-center items-center leading-10 text-gray-600 transition hover:opacity-75 border-gray-200 border-2"
                      >
                        &minus;
                      </button>
                  
                      <input
                        type="number"
                        wire:model="quantityCount"
                        id="Quantity"
                        min="1"
                        max="10"
                        readonly
                        value="{{$this->quantityCount}}"
                        class="h-10 w-24 rounded border-gray-200 sm:text-sm"
                      />
                  
                      <button
                        type="button"
                        wire:click="incrementQuantity"
                        class="h-10 w-10 flex justify-center items-center leading-10 text-gray-600 transition hover:opacity-75 border-2 border-gray-200"
                      >
                        &plus;
                      </button>
                    </div>
                </div>
                <div class="button-container flex flex-col gap-y-3 my-2">
                    <button type="button" wire:click="addToCart({{$product->id}})" class="add-to-cart-button bg-black text-white w-[100%] py-3">Add to Cart</button>

                    <button type="button" class="buy-now-button bg-white border-2 border-black w-[100%] py-3">Buy Now</button>
                    <button type="button" wire:click="addToWishList({{ $product->id }})" class="save-for-later-button bg-green-200 border-2 border-green-300 w-[100%] py-3">
                        <span wire:loading.remove wire:target="addToWishList">
                            Add to Wishlist
                        </span>
                        <span wire:loading wire:target="addToWishList">Adding...</span>
                    </button>
                </div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="details-container bg-white px-[1.5em] py-[1em] rounded">
                <div class="tabs flex flex-row justify-between items-center">
                    <div>
                        <span class="uppercase text-[16px] font-semibold underline underline-offset-8">Description</span>
                    </div>
                    <div>
                        <span class="uppercase text-[16px] font-medium">Details</span>
                    </div>
                    <div>
                        <span class="uppercase text-[16px] font-medium">Specs</span>
                    </div>
                </div>
                <div class="tab-content my-4">
                    <p class="text-[14px] font-light">Introducing the latest Samsung Phone, a cutting-edge device that combines sleek design with powerful performance. Packed with innovative features and advanced technology, this phone is designed to enhance your mobile experience like never before.</p>
                    <ul class="list-disc mt-4 text-[14px] font-light mx-5">
                        <li> Immerse yourself in vibrant visuals with the Samsung Phone's stunning display</li>
                        <li>Experience lightning-fast performance and seamless multitasking </li>
                        <li>Capture every moment in stunning detail with the Samsung Phone's high-resolution camera</li>
                        <li>Protect your personal data with advanced security features</li>
                        <li>Stay connected all day long with the Samsung Phone's long-lasting battery life</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white">
        <div>
            <div class="flex flex-row">
                <div>
                    <h4>
                        Related
                        @if($category) {{$category->name}} @endif
                        Products
                    </h4>
                </div>
                <div class="flex flex-row gap-4 px-10 py-5">
                    @forelse ($category->relatedProducts as $product)    
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
                        <div>
                            <div>No Related Products Available</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
