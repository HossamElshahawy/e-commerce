<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index(){
        $categories = Category::with('products')
            ->where('status','active')->get();

        return view('user.pages.wishlist',compact('categories'));
    }
}
