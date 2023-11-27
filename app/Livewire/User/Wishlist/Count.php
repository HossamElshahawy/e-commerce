<?php

namespace App\Livewire\User\Wishlist;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Count extends Component
{
    public $wishListCount;
    #[On('wishlishAddedUpdated')]
    public function checkWishListCount(){
        if (Auth::check()){
            return $this->wishListCount = Wishlist::where('user_id',\auth()->user()->id)
                                                    ->count();

        }else{
            return $this->wishListCount = 0;
        }
    }
    public function render()
    {
        $this->wishListCount = $this->checkWishListCount();
        return view('livewire.user.wishlist.count',[
            'wishListCount' => $this->wishListCount
        ]);
    }
}
