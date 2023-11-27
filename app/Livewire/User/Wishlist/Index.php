<?php

namespace App\Livewire\User\Wishlist;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $wishlists= [];
    public function removeWishListItem($wishlitsId){
        if (Auth::check()){
            Wishlist::where('user_id',auth()->user()->id)
                ->where('id',$wishlitsId)
                ->delete();
            $this->dispatch('wishlishAddedUpdated');

            session()->flash('message', 'Product Deleted Successfully');
        }
    }

    public function render()
    {

        if (auth()->check()) {
            $this->wishlists = Wishlist::where('user_id', auth()->user()->id)->get();
        }

        return view('livewire.user.wishlist.index',[
            'wishlists' => $this->wishlists
        ]);
    }
}
