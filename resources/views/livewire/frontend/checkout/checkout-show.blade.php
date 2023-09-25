<div>
    <div class="w-screen bg-[#EFF2F6] flex flex-row px-10 py-5">
        @if (session()->has('message'))
            <div class="px-5 py-3 bg-green-200 w-full">
                <h3>{{session('message')}}</h3>
            </div>
        @endif
    </div>
    <div class="container p-12 mx-auto">
        <div class="flex flex-col w-full px-0 mx-auto md:flex-row">
            <div class="flex flex-col md:w-full">
                <h2 class="mb-4 font-bold md:text-xl text-heading ">Shipping Address
                </h2>
                <div class="">
                    <div class="space-x-0 lg:flex lg:space-x-4">
                        <div class="w-full">
                            <label for="fullname" class="block mb-3 text-sm font-semibold text-gray-500">Full
                                Name</label>
                            <input wire:model.defer="fullname" type="text" placeholder="Full Name"
                                class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="w-full">
                            <label for="email"
                                class="block mb-3 text-sm font-semibold text-gray-500">Email</label>
                            <input wire:model.defer="email" type="text" placeholder="Email"
                                class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="w-full">
                            <label for="phone"
                                class="block mb-3 text-sm font-semibold text-gray-500">Phone Number</label>
                            <input wire:model.defer="phone" type="text" placeholder="Phone Number"
                                class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="w-full">
                            <label for="address"
                                class="block mb-3 text-sm font-semibold text-gray-500">Address</label>
                            <textarea
                                class="w-full px-4 py-3 text-xs border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600"
                                wire:model.defer="address" cols="20" rows="4" placeholder="Address"></textarea>
                        </div>
                    </div>
                    <div class="space-x-0 lg:flex lg:space-x-4">
                        <div class="w-full lg:w-1/2">
                            <label for="city"
                                class="block mb-3 text-sm font-semibold text-gray-500">City</label>
                            <input wire:model.defer="city" type="text" placeholder="City"
                                class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                        <div class="w-full lg:w-1/2 ">
                            <label for="pincode" class="block mb-3 text-sm font-semibold text-gray-500">
                                Pin Code</label>
                            <input wire:model.defer="pincode" type="text" placeholder="Pin Code"
                                class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                    </div>
                    <div class="flex items-center mt-4">
                        <label class="flex items-center text-sm group text-heading">
                            <input type="checkbox"
                                class="w-5 h-5 border border-gray-300 rounded focus:outline-none focus:ring-1">
                            <span class="ml-2">Save this information for next time</span></label>
                    </div>
                    <div class="mt-4">
                        <button
                            class="w-full px-6 py-2 text-blue-200 bg-blue-600 hover:bg-blue-900" wire:loading.attr="disabled" wire:click="processOrder">
                            <span wire:loading.remove wire:target="processOrder">Process</span>
                            <span wire:loading wire:target="processOrder">Processing Order...</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="flex flex-col w-full ml-0 lg:ml-12 lg:w-2/5">
                <div class="pt-12 md:pt-0 2xl:ps-4">
                    <h2 class="text-xl font-bold">Order Summary
                    </h2>
                    <div class="mt-8">
                        <div class="flex flex-col space-y-4">
                            @forelse ($cartProducts as $cartItem)
                                @if ($cartItem->product)
                                <div class="flex space-x-4">
                                    <div>
                                        @if ($cartItem->product->productImages)
                                            <img class="w-[200px] h-[175px]" src="{{ $cartItem->product->productImages[0]->image }}" alt="{{$cartItem->product->name}}" />
                                        @else
                                            <img class="w-[200px] h-[175px]" src="" alt="{{$cartItem->product->name}}" />    
                                        @endif
                                    </div>
                                    <div>
                                        <h2 class="text-xl font-bold">{{$cartItem->product->name}}</h2>
                                        <p class="text-sm">{{$cartItem->product->small_description}}</p>
                                        <span class="text-red-600">Price</span> {{$cartItem->product->selling_price}}
                                    </div>
                                </div>
                                @endif
                            @empty
                            <div><h3>hello</h3></div>
                            @endforelse
                        </div>
                    </div>
                    <div class="flex mt-10">
                        <h2 class="text-xl font-bold">ITEMS {{$cartProducts->count()}}</h2>
                    </div>
                    <div
                        class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                        Subtotal<span class="ml-2">${{$this->totalProductAmount}}</span></div>
                    <div
                        class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                        Shipping Tax<span class="ml-2">$10</span></div>
                    <div
                        class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                        Total<span class="ml-2">${{$this->totalProductAmount + 10}}</span></div>
                </div>
            </div>
        </div>
    </div>
</div>
