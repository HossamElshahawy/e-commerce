<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceOrderMailable;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index(){
        $categories = Category::with('products')
            ->where('status','active')->get();

        $orders = Order::where('user_id',auth()->user()->id)->paginate(8);
        return view('user.pages.order.index',compact('categories','orders'));
    }
    public function show(int $orderId){
        $order = Order::where('user_id',auth()->user()->id)->where('id',$orderId)->first();
        if ($order){
            return view('user.pages.order.show',compact('order'));

        }else{
            return view('user.pages.home');

        }
    }


}
