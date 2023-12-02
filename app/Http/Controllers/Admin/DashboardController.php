<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index(){
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalBrands = Brand::count();

        $totalAllUsers = User::count();
        $totalAdmin = User::where('role_as','admin')->count();
        $totalUser = User::where('role_as','user')->count();

        $todayDate = Carbon::now()->format('Y-m-d');
        $ThisMonth = Carbon::now()->format('m');
        $ThisYear = Carbon::now()->format('y');

        $totalOrder = Order::count();
        $totalTodayOrder = Order::whereDate('created_at',$todayDate)->count();
        $totalThisMonthOrder = Order::whereMonth('created_at',$ThisMonth)->count();
        $totalThisYearOrder = Order::whereYear('created_at',$ThisYear)->count();


        return view('admin.index',
                compact('totalProducts','totalCategories','totalBrands','totalAllUsers','totalAdmin','totalUser','totalOrder','totalTodayOrder','totalThisMonthOrder','totalThisYearOrder'));
    }
}
