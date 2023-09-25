<div>
    @include('livewire.admin.brand.modal-form')
    <div class="w-full flex flex-col py-4 px-3 md:py-5 md:px-8 justify-center">
        <div>
            @if (session('message'))
                <div class="text-[18px] text-green-500">{{session('message')}}</div>
            @endif
            <div>
                <div class="card-header flex flex-col sm:flex-row sm:justify-between sm:items-center gap-y-3 mb-3">
                    <h4 class="text-[1.5em]">Brands List</h4>
                    <button data-modal-target="addBrandModal" data-modal-toggle="addBrandModal" class="w-[200px] p-3 bg-blue-200 hover:bg-blue-300 flex justify-center items-center" type="button">Add Brands</button>
                </div>
                <div class="card-body overflow-x-auto">
                    <table class="border-spacing-4 border-separate border">
                        <thead>
                            <tr>
                                <th class="w-[200px] text-start">ID</th>
                                <th class="w-[200px] text-start">Name</th>
                                <th class="w-[200px] text-start">Category</th>
                                <th class="w-[200px] text-start">Slug</th>
                                <th class="w-[200px] text-start">Status</th>
                                <th class="w-[200px] text-start">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands as $brand)
                                <tr class="">
                                    <td>{{$brand->id}}</td>
                                    <td>{{$brand->name}}</td>
                                    <td>
                                        @if ($brand->category)
                                            {{$brand->category->name}}
                                            
                                        @else
                                            No Category
                                        @endif
                                    </td>
                                    <td>{{$brand->slug}}</td>
                                    <td>{{$brand->status == '1' ? 'Hidden' : 'Visible'}}</td>
                                    <td>
                                        <div class="flex flex-col md:flex-row gap-y-2 gap-x-2">
                                            <a href="#" 
                                            wire:click="editBrand({{$brand->id}})"
                                            data-modal-target="updateBrandModal" data-modal-toggle="updateBrandModal" class="w-[100px] md:w-[150px] px-5 py-2 bg-blue-400 hover:bg-blue-500 text-center">Edit</a>
                                            <a href="#" 
                                            wire:click="deleteBrand({{$brand->id}})"
                                            data-modal-target="deleteBrandModal" data-modal-toggle="deleteBrandModal" class="w-[100px] md:w-[150px] px-5 py-2 bg-red-400 hover:bg-red-500 text-center">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No Brands found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{$brands->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
