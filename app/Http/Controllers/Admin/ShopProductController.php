<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ShopProduct;
use App\Models\ProductImage;
use App\Http\Requests\ProductFormRequest;

class ShopProductController extends Controller
{
    public function index() {
        return view('admin.product.index');
    }

    public function create() {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create', compact('categories','brands'));
    }

    public function store(ProductFormRequest $request) {
        $validatedData = $request->validated();

        $category = Category::findOrFail($validatedData['category_id']);

        $product = $category->products()->create([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'brand' => $validatedData['brand'],
            'small_description' => $validatedData['small_description'],
            'description' => $validatedData['description'],
            'original_price' => $validatedData['original_price'],
            'selling_price' => $validatedData['selling_price'],
            'quantity' => $validatedData['quantity'],
            'trending' => $request->trending == true ? '1' : '0',
            'status' => $request->status == true ? '1' : '0',
            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description'],
        ]);

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/products/';

            $i = 1;
            foreach ($request->file('image') as $imageFile) {
                $ext = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$ext;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }
        
        return redirect('admin/products')->with('message', 'Product Added Successfully');
    }

    public function edit(int $product_id) {
        $categories = Category::all();
        $brands = Brand::all();
        $product = ShopProduct::findOrFail($product_id);
        return view('admin.product.edit', compact('categories','brands','product'));
    }

    public function update(ProductFormRequest $request, int $product_id) {
        $validatedData = $request->validated();
        
        $product = Category::findOrFail($validatedData['category_id'])->products()->where('id',$product_id)->first();

        if ($product) {
            $product->update([
                'category_id' => $validatedData['category_id'],
                'name' => $validatedData['name'],
                'slug' => Str::slug($validatedData['slug']),
                'brand' => $validatedData['brand'],
                'small_description' => $validatedData['small_description'],
                'description' => $validatedData['description'],
                'original_price' => $validatedData['original_price'],
                'selling_price' => $validatedData['selling_price'],
                'quantity' => $validatedData['quantity'],
                'trending' => $request->trending == true ? '1' : '0',
                'status' => $request->status == true ? '1' : '0',
                'meta_title' => $validatedData['meta_title'],
                'meta_keyword' => $validatedData['meta_keyword'],
                'meta_description' => $validatedData['meta_description'],
            ]);

            if ($request->hasFile('image')) {
                $uploadPath = 'uploads/products/';
    
                $i = 1;
                foreach ($request->file('image') as $imageFile) {
                    $ext = $imageFile->getClientOriginalExtension();
                    $filename = time().$i++.'.'.$ext;
                    $imageFile->move($uploadPath,$filename);
                    $finalImagePathName = $uploadPath.$filename;
    
                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }
            
            return redirect('admin/products')->with('message', 'Product Updated Successfully');
        } else {
            return redirect('')->with('message', 'No product found');
        }
    }

    public function destroyImage(int $product_image_id) {
        $productImage = ProductImage::findOrFail($product_image_id);
        if (File::exists($productImage->image)) {
            File::delete($productImage->image);
        }
        $productImage->delete();

        return redirect()->back()->with('message', 'Product Image Successfully');
    }

    public function destroy(int $product_id) {
        $product = ShopProduct::findOrFail($product_id);
        if ($product->product_images) {
            foreach($product->productImages as $image){
                if (File::exists($image->image)){
                    File::delete($image->image);
                }
            }
        }

        $product->delete();
        return redirect()->back()->with('message', 'Product Deleted');
    }
}
