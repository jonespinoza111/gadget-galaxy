@extends('admin')

@section('dashboard_content')
<div>
    <div>
        <div>
            <div>
                @if (session('message'))
                    <div class="text-[18px] text-green-500">{{session('message')}}</div>
                @endif
                <div class="card-header flex flex-row justify-start items-center">
                    <h4 class="text-[20px]">Products List</h4>
                    <a href="{{ url('admin/products') }}" class="w-[200px] p-3 bg-blue-200 flex justify-center items-center" type="button">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                                <li class="mr-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Home</button>
                                </li>
                                <li class="mr-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">SEO Tags</button>
                                </li>
                                <li class="mr-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Details</button>
                                </li>
                                <li role="presentation">
                                    <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="images-tab" data-tabs-target="#images" type="button" role="tab" aria-controls="images" aria-selected="false">Product Images</button>
                                </li>
                                <li role="presentation">
                                    <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="color-tab" data-tabs-target="#color" type="button" role="tab" aria-controls="color" aria-selected="false">Product Color</button>
                                </li>
                            </ul>
                        </div>
                        <div id="myTabContent">
                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div>
                                    <label>Category</label>
                                    <select name="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}" {{ $category->id == $product->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label>Product Name</label>
                                    <input type="text" name="name" value="{{ $product->name }}" />
                                </div>
                                <div>
                                    <label>Product Slug</label>
                                    <input type="text" name="slug" value="{{ $product->slug }}" />
                                </div>
                                <div>
                                    <label>Select Brand</label>
                                    <select name="brand">
                                        @foreach ($brands as $brand)
                                            <option value="{{$brand->name}}" {{ $brand->name == $product->brand ? 'selected' : ''}}>{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label>Small Description (500 Words)</label>
                                    <textarea type="text" name="small_description" rows="4">{{ $product->small_description }}</textarea>
                                </div>
                                <div>
                                    <label>Description</label>
                                    <textarea type="text" name="description" rows="4">{{ $product->description }}</textarea>
                                </div>
                            </div>
                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <div>
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" value="{{$product->meta_title}}" />
                                </div>
                                <div>
                                    <label>Meta Keyword</label>
                                    <textarea type="text" name="meta_keyword" rows="4">{{$product->meta_keyword}}</textarea>
                                </div>
                                <div>
                                    <label>Meta Description</label>
                                    <textarea type="text" name="meta_description" rows="4">{{$product->meta_description}}</textarea>
                                </div>
                            </div>
                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                <div>
                                    <div>
                                        <div>
                                            <label>Original Price</label>
                                            <input type="text" name="original_price" value="{{ $product->original_price }}" />
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <label>Selling Price</label>
                                            <input type="text" name="selling_price" value="{{ $product->selling_price }}" />
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <label>Quantity</label>
                                            <input type="number" name="quantity" value="{{ $product->quantity }}" />
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <label>Trending</label>
                                            <input type="checkbox" name="trending" {{ $product->trending == '1' ? 'checked' : ''}} />
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <label>Status</label>
                                            <input type="checkbox" name="status" {{ $product->status == '1' ? 'checked' : ''}} />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="images" role="tabpanel" aria-labelledby="images-tab">
                                <div>
                                    <label>Upload Product Images</label>
                                    <input type="file" name="image[]" multiple />
                                </div>
                                <div>
                                    @if ($product->productImages)
                                        <div>
                                            @foreach ($product->productImages as $image)
                                                <img src="{{ asset($image->image) }}" class="w-[80px] h-[80px]" alt="img" />
                                                <a href="{{ url('admin/product-image/'.$image->id.'/delete') }}">Remove</a>
                                            @endforeach
                                        </div>
                                        
                                    @else
                                        <h4>No Image Added</h4>
                                    @endif
                                </div>
                            </div>
                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="color" role="tabpanel" aria-labelledby="color-tab">
                                <div>
                                    <h3>Add Product Color</h3>
                                    <label>Select Color</label>
                                    <div class="flex flex-row gap-x-3 gap-y-3 flex-wrap">
                                        @forelse ($colors as $colorItem)
                                            <div class="border-2 border-gray-300 px-4 py-2">
                                                <div class="flex flex-col">
                                                    <span>
                                                        Color: <input type="checkbox" name="colors[{{$colorItem->id}}]" value="{{$colorItem->id}}" /> {{$colorItem->name}}
                                                    </span>
                                                    <span>
                                                        Quantity: <input type="number"
                                                        min="0" name="colorquantity[{{$colorItem->id}}]" class="w-[70px]"  />
                                                    </span>
                                                </div>
                                            </div>
                                        @empty
                                            <div>
                                                <h2>No colors found</h2>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                                <div>
                                    <table class="border-spacing-4 border-separate border">
                                        <thead>
                                            <tr>
                                                <th class="w-[200px] text-start">Color Name</th>
                                                <th class="w-[200px] text-start">Quantity</th>
                                                <th class="w-[200px] text-start">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product->productColors as $productColor)
                                                <tr class="product-color-tr">
                                                    <td>
                                                        @if ($productColor->color)
                                                            {{$productColor->color->name}}
                                                        @else
                                                            No Color Found
                                                        @endif
                                                    </td>
                                                            
                                                    <td>
                                                        <div class="flex flex-row">
                                                            <input type="text" value="{{$productColor->quantity}}" class="productColorQuantity w-[100px]" />
                                                            <button type="button" class="updateProductColorButton w-[100px] px-5 py-2 bg-blue-500" value="{{$productColor->id}}">Update</button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button"
                                                        class="deleteProductColorButton w-[150px] px-5 py-2 bg-red-500" value="{{$productColor->id}}">Delete</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="w-[200px] p-3 bg-blue-200 flex justify-center items-center">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        $(document).on('click', '.updateProductColorButton', function() {
            var product_id = "{{ $product->id }}";
            var product_color_id = $(this).val();
            var qty = $(this).closest('.product-color-tr').find('.productColorQuantity').val();

            if(qty <= 0) {
                alert('Quantity is required');
                return false;
            }

            var data = {
                'product_id': product_id,
                'qty': qty
            }

            $.ajax({
                type: "POST",
                url: "/admin/product-color/"+product_color_id,
                data: data,
                success: function(response) {
                    alert(response.message);
                }
            })
        })

        $(document).on('click', '.deleteProductColorButton', function() {
            var product_color_id = $(this).val();
            var thisClick = $(this);

            $.ajax({
                type: "GET",
                url: "/admin/product-color/"+product_color_id+"/delete",
                success: function(response) {
                    thisClick.closest('.product-color-tr').remove();
                    alert(response.message);
                }
            })
        })
    })
</script>

@endsection