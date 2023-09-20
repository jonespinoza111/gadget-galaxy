<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\ShopProduct;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index() {
        $totalProducts = ShopProduct::count();
        $totalCategories = Category::count();
        $totalBrands = Brand::count();

        $totalAllUsers = User::count();
        $totalUsers = User::where('role_as','0')->count();
        $totalAdmins = User::where('role_as','1')->count();

        $todaysDate = Carbon::now()->format('d-m-Y');
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');

        $totalOrders = Order::count();
        $todaysOrders = Order::whereDate('created_at', $todaysDate)->count();
        $thisMonthsOrders = Order::whereDate('created_at', $thisMonth)->count();
        $thisYearsOrders = Order::whereDate('created_at', $thisYear)->count();

        return view('admin.dashboard.index', compact('totalProducts', 'totalCategories', 'totalBrands', 'totalAllUsers', 'totalUsers', 'totalAdmins', 'totalOrders', 'todaysOrders', 'thisMonthsOrders', 'thisYearsOrders'));
    }
}
