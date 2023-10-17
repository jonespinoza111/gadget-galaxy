<?php

use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ShopProductController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
})->name('logout');

Route::view('/register','register');
Route::post('/login',[UserController::class,'login']);
Route::post('/register',[UserController::class,'register']);
// Route::get('/',[ProductController::class,'index']);
Route::get('/wishlist', [WishlistController::class,'index']);
Route::get('/cart', [CartController::class,'index']);
Route::get('/checkout', [CheckoutController::class,'index']);
Route::get('/thank-you', [FrontendController::class,'thankyou']);

Route::get('/orders', [OrderController::class,'index']);
Route::get('/orders/{orderId}', [OrderController::class,'show']);

Route::get('profile', [UserController::class, 'index']);
Route::post('profile', [UserController::class, 'updateUserDetails']);
Route::get('change-password', [UserController::class, 'passwordCreate']);
Route::post('change-password', [UserController::class, 'changePassword']);


Route::get('detail/{id}',[ProductController::class,'detail']);
Route::post('add_to_cart',[ProductController::class,'addToCart']);
Route::get('cartlist',[ProductController::class,'cartList']);
Route::get('removecart/{id}',[ProductController::class,'removeCart']);
Route::get('ordernow',[ProductController::class,'orderNow']);
Route::post('placeorder',[ProductController::class,'placeOrder']);
Route::get('myorders',[ProductController::class,'myOrders']);

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/home', 'index');
    Route::get('/collections', 'categories');
    Route::get('/collections/{category_slug}', 'products');
    Route::get('/collections/{category_slug}/{product_slug}', 'productView');
    Route::get('/new-arrivals', 'newArrival');
    Route::get('/featured-products', 'featuredProducts');
    Route::get('/trending-products', 'trendingProducts');

    Route::get('search', 'searchProducts');
});

Route::prefix('/admin')->middleware(['isAdmin'])->group(function () {
    Route::get('/',[DashboardController::class,'index']);

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category','index');
        Route::get('/category/create','create');
        Route::post('/category','store');
        Route::get('/category/{category}/edit','edit');
        Route::put('/category/{category}','update');
    });

    Route::controller(BrandController::class)->group(function () {
        Route::get('/brands','index');
    });

    Route::controller(ShopProductController::class)->group(function () {
        Route::get('/products','index');
        Route::get('/products/create','create');
        Route::post('/products','store');
        Route::get('/products/{product}/edit','edit');
        Route::put('/products/{product}','update');
        Route::get('/products/{product_id}/delete','destroy');
        Route::get('/product-image/{product_image_id}/delete','destroyImage');

        Route::post('/product-color/{product_color_id}','updateProductColorQuantity');
        Route::get('/product-color/{product_color_id}/delete','deleteProductColor');

    });

    Route::controller(ColorController::class)->group(function () {
        Route::get('/colors','index');
        Route::get('/colors/create','create');
        Route::post('/colors/create','store');
        Route::get('/colors/{color}/edit','edit');
        Route::put('/colors/{color_id}','update');
        Route::get('/colors/{color_id}/delete','destroy');
    });

    Route::controller(SliderController::class)->group(function () {
        Route::get('/sliders','index');
        Route::get('/sliders/create','create');
        Route::post('/sliders/create','store');
        Route::get('/sliders/{slider}/edit','edit');
        Route::put('/sliders/{slider}','update');
        Route::get('/sliders/{slider}/delete','destroy');
    });

    Route::controller(\App\Http\Controllers\Admin\OrderController::class)->group(function () {
        Route::get('/orders','index');
        Route::get('/orders/{orderId}','show');
        Route::put('/orders/{orderId}','updateOrderStatus');

        Route::get('/invoice/{orderId}','viewInvoice');
        Route::get('/invoice/{orderId}/generate','generateInvoice');
        Route::get('/invoice/{orderId}/mail','mailInvoice');

    });

    Route::controller(SettingController::class)->group(function () {
        Route::get('/settings','index');
        Route::post('/settings','store');
    });

    Route::controller(\App\Http\Controllers\Admin\UserController::class)->group(function () {
        Route::get('/users','index');
        Route::get('/users/create','create');
        Route::post('/users','store');
        Route::get('/users/{userId}/edit','edit');
        Route::put('/users/{userId}','update');
        Route::get('/users/{userId}/delete','destroy');
    });

    Route::get('/dashboard', [DashboardController::class, 'index']);
    
});




