<?php

namespace App\Http\Controllers\Frontend;

use App\Models\ShopProduct;
use App\Models\Slider;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {
        $sliders = Slider::where('status','0')->get();
        $trendingProducts = ShopProduct::where('trending', '1')->inRandomOrder()->take(8)->get();
        $newArrivalProducts = ShopProduct::latest()->take(8)->get();
        $featuredProducts = ShopProduct::where('featured', '1')->inRandomOrder()->take(8)->get();
        return view('frontend.index', compact('sliders', 'trendingProducts', 'newArrivalProducts', 'featuredProducts'));
    }

    public function categories() {
        $categories = Category::where('status','0')->get();
        return view('frontend.collections.category.index', compact('categories'));
    }

    public function products($category_slug) {
        $category = Category::where('slug',$category_slug)->first();
        if ($category) {
            return view('frontend.collections.products.index', compact('category'));
        } else {
            return redirect()->back();
        }
    }

    public function productView(string $category_slug, string $product_slug) {
        $category = Category::where('slug',$category_slug)->first();
        if ($category) {
            $product = $category->products()->where('slug',$product_slug)->where('status','0')->first();

            if ($product) {
                return view('frontend.collections.products.view', compact('category', 'product'));
            } else {
                return redirect()->back();
            }

        } else {
            return redirect()->back();
        }
    }

    public function thankyou() {
        return view('frontend.thank-you');
    }

    public function newArrival() {
        $newArrivalProducts = ShopProduct::latest()->take(10)->get();
        return view('frontend.pages.new-arrival', compact('newArrivalProducts'));
    }

    public function featuredProducts() {
        $featuredProducts = ShopProduct::where('featured', '1')->latest()->get();
        return view('frontend.pages.featured-products', compact('featuredProducts'));
    }

    public function trendingProducts() {
        $trendingProducts = ShopProduct::where('trending', '1')->latest()->get();
        return view('frontend.pages.trending-products', compact('trendingProducts'));
    }


    public function searchProducts(Request $request) {
        if ($request->search) {
            $searchProducts = ShopProduct::where('name','LIKE','%'.$request->search.'%')->latest()->paginate(5);
            return view('frontend.pages.search', compact('searchProducts'));
        } else {
            return redirect()->back()->with('message', 'Empty Search');
        }
    }
    
}
