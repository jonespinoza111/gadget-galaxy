<div class="w-full">
    <div class="w-screen bg-[#EFF2F6] flex flex-row px-10 py-5">
        @if (session()->has('message'))
            <div class="px-5 py-3 bg-green-200 w-full">
                <h3>{{session('message')}}</h3>
            </div>
        @endif
    </div>
    <div class="w-[80%] mx-10 mt-5 border-b-2 border-gray-400">
        <h2 class="text-[1.4em] font-bold">My Cart</h2>
    </div>
    <div class="card-body px-10 py-5">
        <table class="border-spacing-4 border-separate border">
            <thead>
                <tr>
                    <th class="w-[200px] text-start">Product</th>
                    <th class="w-[200px] text-start">Price</th>
                    <th class="w-[200px] text-start">Quantity</th>
                    <th class="w-[200px] text-start">Total</th>
                    <th class="w-[200px] text-start">Remove</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cartProducts as $cartItem)
                    @if ($cartItem->product)    
                        <tr class="">
                            <td class="">
                                <a href="{{ url('collections/'.$cartItem->product->category->slug.'/'.$cartItem->product->slug) }}">
                                    <label class="product-name flex flex-row items-center cursor-pointer">
                                        @if ($cartItem->product->productImages)
                                            <img class="w-[80px] h-[80px]" src="{{ $cartItem->product->productImages[0]->image }}" alt="{{$cartItem->product->name}}" />
                                        @else
                                            <img class="w-[80px] h-[80px]" src="" alt="{{$cartItem->product->name}}" />    
                                        @endif
                                        {{$cartItem->product->name}}
                                        @if ($cartItem->productColor)
                                            <span class="mx-5"> Color: {{$cartItem->productColor->color->name}}</span>
                                        @endif
                                    </label>
                                </a>
                            </td>
                            <td>{{$cartItem->product->selling_price}}</td>
                            <td>
                                <div class="quantity-container my-4">
                                    <label for="Quantity" class="sr-only"> Quantity </label>
                                  
                                    <div class="flex items-center gap-1">
                                      <button
                                        type="button"
                                        wire:loading.attr="disabled"
                                        wire:click="decrementQuantity({{$cartItem->id}})"
                                        class="h-10 w-10 flex justify-center items-center leading-10 text-gray-600 transition hover:opacity-75 border-gray-200 border-2"
                                      >
                                        &minus;
                                      </button>
                                  
                                      <input
                                        type="number"
                                        id="Quantity"
                                        min="1"
                                        max="10"
                                        readonly
                                        value="{{$cartItem->quantity}}"
                                        class="h-10 w-24 rounded border-gray-200 sm:text-sm"
                                      />
                                  
                                      <button
                                        type="button"
                                        wire:loading.attr="disabled"
                                        wire:click="incrementQuantity({{$cartItem->id}})"
                                        class="h-10 w-10 flex justify-center items-center leading-10 text-gray-600 transition hover:opacity-75 border-2 border-gray-200"
                                      >
                                        &plus;
                                      </button>
                                    </div>
                                </div>
                            </td>
                            <td class="total-price">${{$cartItem->product->selling_price * $cartItem->quantity}}</td>
                            @php $this->totalPrice += $cartItem->product->selling_price * $cartItem->quantity @endphp
                            <td class="remove">
                                <button type="button" wire:click="removeCartItem({{ $cartItem->id }})" 
                                class="w-[150px] px-5 py-2 bg-red-500">
                                    <span wire:loading.remove wire:target="removeCartItem({{ $cartItem->id }})">
                                        Remove
                                    </span>  
                                    <span wire:loading wire:target="removeCartItem({{ $cartItem->id }})">
                                        Removing...
                                    </span>      
                                </button>
                            </td>
                        </tr>
                    @else
                        <h3>Hello my dear firends</h3>
                    @endif
                @empty
                    <tr>
                        <td>No Products in Cart</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="flex flex-row justify-between w-full px-10 my-5">
        <div class="text-[1.2em] font-semibold">
            <h4>Get the Best Deals & Offers <a href="{{ url('/collection') }}" class="text-blue-500">Shop Now</a></h4>
        </div>
        <div class="w-[20em] bg-white flex flex-col p-6 border-2 border-black">
            <div class="w-full border-b-2 border-black flex flex-row justify-between mb-5 text-[1.2em] font-semibold">
                <h4>Total:</h4> <span>${{$this->totalPrice}}</span>
            </div>
            <a href="/checkout" type="button" class="bg-yellow-400 text-black w-full py-2">Check Out</a>
        </div>
    </div>
</div>
