<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="description" content="@yield('meta_description')">
    <meta name="author" content="JE">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
    <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto my-4 sm:my-10">
        <!-- Grid -->
        <div class="mb-5 pb-5 flex justify-between items-center border-b border-gray-200 dark:border-gray-700">
          <div>
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Invoice</h2>
          </div>
          <!-- Col -->
      
          {{-- <div class="inline-flex gap-x-2">
            <a class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800" href="#">
              <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
              </svg>
              Invoice PDF
            </a>
            <a class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" href="#">
              <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
              </svg>
              Print
            </a>
          </div> --}}
          <!-- Col -->
        </div>
        <!-- End Grid -->
      
        <!-- Grid -->
        <div class="grid md:grid-cols-2 gap-3">
          <div>
            <div class="grid space-y-3">
              <dl class="grid sm:flex gap-x-3 text-sm">
                <dt class="min-w-[150px] max-w-[200px] text-gray-500">
                  Order ID:
                </dt>
                <dd class="text-gray-800 dark:text-gray-200">
                  <a class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 hover:underline font-medium" href="#">
                    {{$order->id}}
                  </a>
                </dd>
              </dl>
      
              <dl class="grid sm:flex gap-x-3 text-sm">
                <dt class="min-w-[150px] max-w-[200px] text-gray-500">
                  Tracking No.:
                </dt>
                <dd class="font-medium text-gray-800 dark:text-gray-200">
                  {{$order->tracking_no}}
                </dd>
              </dl>
      
              <dl class="grid sm:flex gap-x-3 text-sm">
                <dt class="min-w-[150px] max-w-[200px] text-gray-500">
                  Ordered Date:
                </dt>
                <dd class="font-medium text-gray-800 dark:text-gray-200">
                    {{$order->created_at->format('d-m-Y h:i A')}}
                </dd>
              </dl>

              <dl class="grid sm:flex gap-x-3 text-sm">
                <dt class="min-w-[150px] max-w-[200px] text-gray-500">
                  Payment Method:
                </dt>
                <dd class="font-medium text-gray-800 dark:text-gray-200">
                  {{$order->payment_method}}
                </dd>
              </dl>

              <dl class="grid sm:flex gap-x-3 text-sm">
                <dt class="min-w-[150px] max-w-[200px] text-gray-500">
                  Order Status:
                </dt>
                <dd class="font-medium text-gray-800 dark:text-gray-200">
                  {{$order->status_message}}
                </dd>
              </dl>
            </div>
          </div>
          <!-- Col -->
      
          <div>
            <div class="grid space-y-3">
              <dl class="grid sm:flex gap-x-3 text-sm">
                <dt class="min-w-[150px] max-w-[200px] text-gray-500">
                  Fullname:
                </dt>
                <dd class="font-medium text-gray-800 dark:text-gray-200">
                  {{$order->fullname}}
                </dd>
              </dl>
      
              <dl class="grid sm:flex gap-x-3 text-sm">
                <dt class="min-w-[150px] max-w-[200px] text-gray-500">
                  Email:
                </dt>
                <dd class="font-medium text-gray-800 dark:text-gray-200">
                    {{$order->email}}
                </dd>
              </dl>
      
              <dl class="grid sm:flex gap-x-3 text-sm">
                <dt class="min-w-[150px] max-w-[200px] text-gray-500">
                  Phone:
                </dt>
                <dd class="font-medium text-gray-800 dark:text-gray-200">
                    {{$order->phone}}
                </dd>
              </dl>
      
              <dl class="grid sm:flex gap-x-3 text-sm">
                <dt class="min-w-[150px] max-w-[200px] text-gray-500">
                  Address:
                </dt>
                <dd class="font-medium text-gray-800 dark:text-gray-200">
                    {{$order->address}}
                </dd>
              </dl>

              <dl class="grid sm:flex gap-x-3 text-sm">
                <dt class="min-w-[150px] max-w-[200px] text-gray-500">
                    Pin Code:
                </dt>
                <dd class="font-medium text-gray-800 dark:text-gray-200">
                    {{$order->pincode}}
                </dd>
              </dl>
            </div>
          </div>
          <!-- Col -->
        </div>
        <!-- End Grid -->
      
        <!-- Table -->
        <div class="mt-6 border border-gray-200 p-4 rounded-lg space-y-4 dark:border-gray-700">
          <div class="hidden sm:grid sm:grid-cols-6">
            <div class="sm:col-span-2 text-xs font-medium text-gray-500 uppercase">ID</div>
            <div class="text-left text-xs font-medium text-gray-500 uppercase">Product</div>
            <div class="text-left text-xs font-medium text-gray-500 uppercase">Price</div>
            <div class="text-right text-xs font-medium text-gray-500 uppercase">Quantity</div>
            <div class="text-right text-xs font-medium text-gray-500 uppercase">Total</div>
          </div>
      
          <div class="hidden sm:block border-b border-gray-200 dark:border-gray-700"></div>

          @php
            $totalPrice = 0;    
          @endphp
          @forelse ($order->orderItems as $orderItem)
            <div class="grid grid-cols-3 sm:grid-cols-6 gap-2">
                <div class="col-span-full sm:col-span-2">
                <p class="font-medium text-gray-800 dark:text-gray-200">{{$orderItem->id}}</p>
                </div>
                <div>
                <p class="text-gray-800 dark:text-gray-200">
                    {{$orderItem->product->name}}
                    @if ($orderItem->productColor)
                        @if ($orderItem->productColor->color)
                            <span>- Color: {{$orderItem->productColor->color->name}}</span>
                        @endif
                    @endif
                </p>
                </div>
                <div>
                <p class="text-gray-800 dark:text-gray-200">${{$orderItem->price}}</p>
                </div>
                <div>
                <p class="sm:text-right text-gray-800 dark:text-gray-200">{{$orderItem->quantity}}</p>
                </div>
                <div>
                    <p class="sm:text-right text-gray-800 font-semibold dark:text-gray-200">${{$orderItem->quantity * $orderItem->price}}</p>
                </div>
            </div>
            @php
                $totalPrice += $orderItem->quantity * $orderItem->price;    
            @endphp
            <div class="sm:hidden border-b border-gray-200 dark:border-gray-700"></div>
          @empty
            <div>
                <p>No Order Items</p>
            </div>
          @endforelse
        </div>
        <!-- End Table -->
      
        <!-- Flex -->
        <div class="mt-8 flex sm:justify-end">
          <div class="w-full max-w-2xl sm:text-right space-y-2">
            <!-- Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
              <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                <dt class="col-span-3 text-gray-500">Total:</dt>
                <dd class="col-span-2 font-medium text-gray-800 dark:text-gray-200">${{$totalPrice}}</dd>
              </dl>
            </div>
            <!-- End Grid -->
          </div>
        </div>
        <!-- End Flex -->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    
</body>
</html>
<!-- Invoice -->
