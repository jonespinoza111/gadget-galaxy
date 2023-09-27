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
    <div class="mx-6 my-8">
        <h2>Thank you for your order!</h2>
        <p>{{$appSettings->website_name}}</p>
    </div>
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
          @empty
          <tr>
            <td colspan="6">
              <p>No Order Items</p>
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
      
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    
</body>
</html>
<!-- Invoice -->
