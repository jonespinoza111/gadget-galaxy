<div class="w-full min-h-[30em] md:min-h-[40em] flex flex-col py-4 px-3 md:py-5 md:px-8 justify-start">
    <div class="w-screen">
        @if (session()->has('message'))
            <div class="px-5 py-3 bg-green-200 w-full">
                <h3>{{session('message')}}</h3>
            </div>
        @endif
    </div>
    <div class="card-header px-4 flex flex-row justify-between items-center">
        <h4 class="text-[1.5em]">My Wishlist</h4>
    </div>
    <div class="card-body px-4 sm:px-10 py-5 overflow-x-auto">
        <table class="border-spacing-4 border-separate border">
            <thead>
                <tr>
                    <th class="w-[200px] text-start">Product</th>
                    <th class="w-[200px] text-start">Price</th>
                    <th class="w-[200px] text-start">Remove</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($wishlist as $wishlistItem)
                    @if ($wishlistItem->product)    
                        <tr class="">
                            <td class="">
                                <a href="{{ url('collections/'.$wishlistItem->product->category->slug.'/'.$wishlistItem->product->slug) }}">
                                    <label class="product-name flex flex-row items-center cursor-pointer">
                                        <img class="w-[80px] h-[80px]" src="{{ $wishlistItem->product->productImages[0]->image }}" alt="{{$wishlistItem->product->name}}" />
                                        {{$wishlistItem->product->name}}
                                    </label>
                                </a>
                            </td>
                            <td>${{$wishlistItem->product->selling_price}}</td>
                            <td class="remove">
                                <button type="button" wire:click="removeWishlistItem({{ $wishlistItem->id }})" 
                                class="w-[150px] px-5 py-2 bg-red-500">
                                    <span wire:loading.remove wire:target="removeWishlistItem({{ $wishlistItem->id }})">
                                        Remove
                                    </span>  
                                    <span wire:loading wire:target="removeWishlistItem({{ $wishlistItem->id }})">
                                        Removing...
                                    </span>      
                                </button>
                            </td>
                        </tr>
                    @endif
                @empty
                    <tr>
                        <td>No Products Available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
