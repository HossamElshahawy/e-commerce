<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){

        return view('user.pages.checkout');
    }
}
