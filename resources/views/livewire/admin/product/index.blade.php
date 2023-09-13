<div>
    <div>
        <div>
            @if (session('message'))
                <div class="text-[18px] text-green-500">{{session('message')}}</div>
            @endif
            <div>
                <div class="card-header flex flex-row justify-start items-center">
                    <h4 class="text-[20px]">Products List</h4>
                    <a href="{{ url('admin/products/create') }}" class="w-[200px] p-3 bg-blue-200 flex justify-center items-center" type="button">Add Product</a>
                </div>
                <div class="card-body">
                    <table class="border-spacing-4 border-separate border">
                        <thead>
                            <tr>
                                <th class="w-[200px] text-start">ID</th>
                                <th class="w-[200px] text-start">Category</th>
                                <th class="w-[200px] text-start">Product</th>
                                <th class="w-[200px] text-start">Price</th>
                                <th class="w-[200px] text-start">Quantity</th>
                                <th class="w-[200px] text-start">Status</th>
                                <th class="w-[200px] text-start">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr class="">
                                    <td>{{$product->id}}</td>
                                    <td>
                                        @if ($product->category)
                                            {{$product->category->name}}
                                        @else
                                            No Category
                                        @endif
                                    </td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->selling_price}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>{{$product->status == '1' ? 'Hidden' : 'Visible'}}</td>
                                    <td>
                                        <a href="{{ url('admin/products/'.$product->id.'/edit') }}" class="w-[150px] px-5 py-2 bg-blue-400">Edit</a>
                                        <a href="{{ url('admin/products/'.$product->id.'/delete') }}" onclick="return confirm('Are you sure you want to delete this product?')"
                                         class="w-[150px] px-5 py-2 bg-red-500">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No Products Available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>