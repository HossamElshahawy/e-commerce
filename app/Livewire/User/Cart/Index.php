<?php

namespace App\Livewire\User\Cart;

use App\Models\Cart;
use Livewire\Component;

class Index extends Component
{
    public $cart;

    public function render()
    {
        $this->cart = Cart::where('user_id',auth()->user()->id)->get();
        return view('livewire.user.cart.index',[
            'cart' => $this->cart
        ]);
    }
}
