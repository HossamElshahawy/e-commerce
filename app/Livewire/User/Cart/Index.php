<?php

namespace App\Livewire\User\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $cart,$cartLists= [];

    public function decrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id',$cartId)->where('user_id', auth()->user()->id)->first();
        if($cartData)
        {
            if($cartData->quantity > 1){

                $cartData->decrement('quantity');

                session()->flash('message', 'Quantity Updated');

            }else{

                session()->flash('error', 'Quantity cannot be less than 1');

            }
        }else{

            session()->flash('error', 'Something Went Wrong');

        }
    }

    public function incrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            if ($cartData->productColors()->where('id', $cartData->product_color_id)->exists()) {
                $productColor = $cartData->productColors()->where('id', $cartData->product_color_id)->first();
                if ($productColor->quantity > $cartData->quantity) {
                    $cartData->increment('quantity');
                    session()->flash('message', 'Quantity Updated');
                }else{
                    session()->flash('error', 'only '.$productColor->quantity.' Available');

                }
            } else {
                if ($cartData->product->quantity > $cartData->quantity) {
                    $cartData->increment('quantity');
                    session()->flash('message', 'Quantity Updated');
                }else{
                    session()->flash('error', 'only '.$cartData->product->quantity.' Available');

                }
            }
        } else {
            session()->flash('error', 'Something Went Wrong');
        }
    }


    public function removeCartItem($cartId){
        if (Auth::check()){
            Cart::where('user_id',auth()->user()->id)
                ->where('id',$cartId)
                ->delete();
            $this->dispatch('cartAddedUpdated');

            session()->flash('message', 'Product Deleted Successfully');
        }
    }

    public function render()
    {
        $this->cart = Cart::where('user_id',auth()->user()->id)->get();

        if (auth()->check()) {
            $this->cartLists = Cart::where('user_id', auth()->user()->id)->get();
        }
        return view('livewire.user.cart.index',[
            'cart' => $this->cartLists
        ]);
    }
}
