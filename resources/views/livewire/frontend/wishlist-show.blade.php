<div class="w-full">
    <div class="w-screen bg-[#EFF2F6] flex flex-row px-10 py-5">
        @if (session()->has('message'))
            <div class="px-5 py-3 bg-green-200 w-full">
                <h3>{{session('message')}}</h3>
            </div>
        @endif
    </div>
    <div class="card-body px-10 py-5">
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
                            <td>{{$wishlistItem->product->selling_price}}</td>
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
    <h3>
        @forelse ($wishlist as $wishlistItem)
            <span>Wishlist here</span>
        @empty
            <span>No wishlists</span>
        @endforelse
    </h3>
</div>
