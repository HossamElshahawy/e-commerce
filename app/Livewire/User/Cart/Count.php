<?php

namespace App\Livewire\User\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Count extends Component
{
    public $cartCount;
    #[On('cartAddedUpdated')]
    public function checkCartCount(){
        if (Auth::check()){
            return $this->cartCount = Cart::where('user_id',\auth()->user()->id)
                ->count();

        }else{
            return $this->cartCount = 0;
        }
    }
    public function render()
    {
        $this->cartCount = $this->checkCartCount();

        return view('livewire.user.cart.count',[
            'cartCount' => $this->cartCount
        ]);
    }
}
