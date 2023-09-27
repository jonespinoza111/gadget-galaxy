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
    {{-- <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto my-4 sm:my-10">
        <!-- Grid -->
        <div class="mb-5 pb-5 flex justify-between items-center border-b border-gray-200 dark:border-gray-700">
          <div>
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Invoice</h2>
          </div>
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
    </div> --}}

    <div class="mx-6 my-8">
      <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Invoice</h3>
    </div>
    <div class="mx-6 my-8">
      <table class="w-full border-collapse">
        <tr>
          <td class="py-2 px-4 border-b">
            <dl>
              <dt class="text-gray-500">Order ID:</dt>
              <dd>
                <a href="#" class="text-blue-600 underline">{{$order->id}}</a>
              </dd>
            </dl>
          </td>
          <td class="py-2 px-4 border-b">
            <dl>
              <dt class="text-gray-500">Tracking No.:</dt>
              <dd>{{$order->tracking_no}}</dd>
            </dl>
          </td>
        </tr>
        <tr>
          <td class="py-2 px-4 border-b">
            <dl>
              <dt class="text-gray-500">Ordered Date:</dt>
              <dd>{{$order->created_at->format('d-m-Y h:i A')}}</dd>
            </dl>
          </td>
          <td class="py-2 px-4 border-b">
            <dl>
              <dt class="text-gray-500">Payment Method:</dt>
              <dd>{{$order->payment_method}}</dd>
            </dl>
          </td>
        </tr>
        <tr>
          <td class="py-2 px-4 border-b">
            <dl>
              <dt class="text-gray-500">Order Status:</dt>
              <dd>{{$order->status_message}}</dd>
            </dl>
          </td>
          <td class="py-2 px-4 border-b">
            <dl>
              <dt class="text-gray-500">Fullname:</dt>
              <dd>{{$order->fullname}}</dd>
            </dl>
          </td>
        </tr>
        <tr>
          <td class="py-2 px-4 border-b">
            <dl>
              <dt class="text-gray-500">Email:</dt>
              <dd>{{$order->email}}</dd>
            </dl>
          </td>
          <td class="py-2 px-4 border-b">
            <dl>
              <dt class="text-gray-500">Phone:</dt>
              <dd>{{$order->phone}}</dd>
            </dl>
          </td>
        </tr>
        <tr>
          <td class="py-2 px-4 border-b">
            <dl>
              <dt class="text-gray-500">Address:</dt>
              <dd>{{$order->address}}</dd>
            </dl>
          </td>
          <td class="py-2 px-4 border-b">
            <dl>
              <dt class="text-gray-500">Pin Code:</dt>
              <dd>{{$order->pincode}}</dd>
            </dl>
          </td>
        </tr>
      </table>
    </div>

    <div class="border border-gray-200 p-4 rounded-lg space-y-4 dark:border-gray-700 mx-6 my-8">
      <table class="col-span-6 w-full" >
        <thead>
          <tr>
            <th class="text-left text-xs w-[200px] font-medium text-gray-500 uppercase">ID</th>
            <th class="text-left text-xs w-[350px] font-medium text-gray-500 uppercase">Product</th>
            <th class="text-left text-xs w-[350px] font-medium text-gray-500 uppercase">Price</th>
            <th class="text-left text-xs w-[350px] font-medium text-gray-500 uppercase">Quantity</th>
            <th class="text-left text-xs w-[350px] font-medium text-gray-500 uppercase">Total</th>
          </tr>
        </thead>
        <tbody>
          @php
            $totalPrice = 0;    
          @endphp
          @forelse ($order->orderItems as $orderItem)
          <tr class="">
            <td colspan="1">
              <p class="font-medium text-gray-800 dark:text-gray-200">{{$orderItem->id}}</p>
            </td>
            <td colspan="1">
              <p class="text-gray-800 dark:text-gray-200">
                {{$orderItem->product->name}}
                @if ($orderItem->productColor)
                @if ($orderItem->productColor->color)
                <span>- Color: {{$orderItem->productColor->color->name}}</span>
                @endif
                @endif
              </p>
            </td>
            <td colspan="1">
              <p class="text-gray-800 dark:text-gray-200">${{$orderItem->price}}</p>
            </td>
            <td colspan="1">
              <p class="sm:text-left text-gray-800 dark:text-gray-200">{{$orderItem->quantity}}</p>
            </td>
            <td colspan="1">
              <p class="sm:text-left text-gray-800 font-semibold dark:text-gray-200">${{$orderItem->quantity * $orderItem->price}}</p>
            </td>
          </tr>
          @php
            $totalPrice += $orderItem->quantity * $orderItem->price;    
          @endphp
          @empty
          <tr>
            <td colspan="6">
              <p>No Order Items</p>
            </td>
          </tr>
          @endforelse
          <tr class="border-t-2 border-gray-500">
            <td colspan="4">Total: </td>
            <td colspan="1">
              <p class="sm:text-left text-gray-800 font-semibold dark:text-gray-200">${{$totalPrice ?? 'NA'}}</p>
            </td>
          </tr>
        </tbody>
      </table>
      
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    
</body>
</html>
<!-- Invoice -->
