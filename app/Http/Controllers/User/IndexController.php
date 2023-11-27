<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index(){
        $sliders = Slider::where('status','active')->get();

        $categories = Category::with('products')
                                ->where('status','active')->get();

        $trandyProducts = Product::with('Category')
                                    ->where('trending','yes')
                                    ->where('status','active')->get();

        return view('user.pages.home',compact('sliders','categories','trandyProducts'));
    }

    public function allProducts(){
//        $categories = Category::with('products')
//            ->where('status','active')->get();
//        $products = Product::where('status','active')->get();
//        return view('user.pages.shop',compact('products','categories'));
    }

    public function productsRelatedToCategory($category_slug){
        $categories = Category::with('products')
            ->where('status','active')->get();
        $category = Category::where('slug',$category_slug)->first();
        if ($category){
        return view('user.pages.productsCategory',compact('category','categories'));

        }else{
        return redirect()->back();
        }

    }

    public function productSinglePage($category_slug, $product_slug){
        $categories = Category::with('products')
            ->where('status','active')->get();

        $category = Category::where('slug',$category_slug)->first();

        if ($category){
            $product = $category->products()->where('slug',$product_slug)->where('status','active')->first();
            if ($product){

                return view('user.pages.product_single_page',compact('category','product','categories'));

            }else{
                return redirect()->back();

            }

        }else{
            return redirect()->back();
        }

    }
}
