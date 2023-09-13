<div>
    @include('livewire.admin.brand.modal-form')
    <div>
        <div>
            @if (session('message'))
                <div class="text-[18px] text-green-500">{{session('message')}}</div>
            @endif
            <div>
                <div class="card-header flex flex-row justify-start items-center">
                    <h4 class="text-[20px]">Brands List</h4>
                    <button data-modal-target="addBrandModal" data-modal-toggle="addBrandModal" class="w-[200px] p-3 bg-blue-200 flex justify-center items-center" type="button">Add Brands</button>
                </div>
                <div class="card-body">
                    <table class="border-spacing-4 border-separate border">
                        <thead>
                            <tr>
                                <th class="w-[200px] text-start">ID</th>
                                <th class="w-[200px] text-start">Name</th>
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
                                    <td>{{$brand->slug}}</td>
                                    <td>{{$brand->status == '1' ? 'Hidden' : 'Visible'}}</td>
                                    <td>
                                        <a href="#" 
                                        wire:click="editBrand({{$brand->id}})"
                                        data-modal-target="updateBrandModal" data-modal-toggle="updateBrandModal" class="w-[150px] px-5 py-2 bg-blue-400">Edit</a>
                                        <a href="#" 
                                        wire:click="deleteBrand({{$brand->id}})"
                                        data-modal-target="deleteBrandModal" data-modal-toggle="deleteBrandModal" class="w-[150px] px-5 py-2 bg-red-500">Delete</a>
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
