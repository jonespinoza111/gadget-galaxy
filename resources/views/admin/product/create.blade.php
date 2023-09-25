@extends('admin')

@section('dashboard_content')
<div>
    <div>
        <div>
            @if (session('message'))
                <div class="text-[18px] text-green-500">{{session('message')}}</div>
            @endif
            <div>
                <div class="card-header flex flex-col sm:flex-row sm:justify-between sm:items-center gap-y-3 mb-4">
                    <h4 class="text-[20px]">Products List</h4>
                    <a href="{{ url('admin/products') }}" class="w-[200px] p-3 bg-blue-200 hover:bg-blue-300 flex justify-center items-center" type="button">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                        @csrf
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
                                <div class="w-full flex flex-col gap-y-3">
                                    <div class="flex flex-col w-full sm:w-[40%]">
                                        <label>Category</label>
                                        <select name="category_id" class="w-full p-2">
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="flex flex-col w-full sm:w-[40%]">
                                        <label>Product Name</label>
                                        <input type="text" name="name" />
                                    </div>
                                    <div class="flex flex-col w-full sm:w-[40%]">
                                        <label>Product Slug</label>
                                        <input type="text" name="slug" />
                                    </div>
                                    <div class="flex flex-col w-full sm:w-[40%]">
                                        <label>Select Brand</label>
                                        <select name="brand" class="w-full p-2">
                                            @foreach ($brands as $brand)
                                                <option value="{{$brand->name}}">{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="flex flex-col w-full sm:w-[40%]">
                                        <label>Small Description (500 Words)</label>
                                        <textarea type="text" name="small_description" rows="4"></textarea>
                                    </div>
                                    <div class="flex flex-col w-full sm:w-[40%]">
                                        <label>Description</label>
                                        <textarea type="text" name="description" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="w-full flex flex-col gap-y-3">
                                    <div class="flex flex-col w-full sm:w-[40%]">
                                        <label>Meta Title</label>
                                        <input type="text" name="meta_title" />
                                    </div>
                                    <div class="flex flex-col w-full sm:w-[40%]">
                                        <label>Meta Keyword</label>
                                        <textarea type="text" name="meta_keyword" rows="4"></textarea>
                                    </div>
                                    <div class="flex flex-col w-full sm:w-[40%]">
                                        <label>Meta Description</label>
                                        <textarea type="text" name="meta_description" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                <div class="w-full flex flex-col gap-y-3">
                                    <div class="flex flex-col w-full sm:w-[40%]">
                                        <label>Original Price</label>
                                        <input type="text" name="original_price" />
                                    </div>
                                    <div class="flex flex-col w-full sm:w-[40%]">
                                        <label>Selling Price</label>
                                        <input type="text" name="selling_price" />
                                    </div>
                                    <div class="flex flex-col w-full sm:w-[40%]">
                                        <label>Quantity</label>
                                        <input type="number" name="quantity" />
                                    </div>
                                    <div class="flex flex-row items-center gap-x-3 w-full sm:w-[40%]">
                                        <label class="w-[150px]">Trending</label>
                                        <input type="checkbox" name="trending" />
                                    </div>
                                    <div class="flex flex-row items-center gap-x-3 w-full sm:w-[40%]">
                                        <label class="w-[150px]">Featured</label>
                                        <input type="checkbox" name="featured" />
                                    </div>
                                    <div class="flex flex-row items-center gap-x-3 w-full sm:w-[40%]">
                                        <label class="w-[150px]">Status</label>
                                        <input type="checkbox" name="status" />
                                    </div>
                                </div>
                            </div>
                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="images" role="tabpanel" aria-labelledby="images-tab">
                                <div class="w-full flex flex-col gap-y-3">
                                    <label>Upload Product Images</label>
                                    <input type="file" name="image[]" multiple />
                                </div>
                            </div>
                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="color" role="tabpanel" aria-labelledby="color-tab">
                                <div>
                                    <label>Select Color</label>
                                    <div class="flex flex-row gap-x-3 gap-y-3 flex-wrap">
                                        @forelse ($colors as $colorItem)
                                            <div class="border-2 border-gray-300 px-4 py-2">
                                                <div class="flex flex-col gap-y-3">
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
                            </div>
                        </div>
                        <button type="submit" class="w-[200px] p-3 bg-blue-200 hover:bg-blue-300 flex justify-center items-center">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection