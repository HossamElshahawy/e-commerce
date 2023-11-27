<?php

namespace App\Livewire\User\Product;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SinglePage extends Component
{
    public $category, $product, $productColorSelectedQuantity, $quantityCount = 1;

    public function mount($category, $product){

        $this->category = $category;
        $this->product = $product;
    }

    public function addToWishlist($productId)
    {
        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->first()) {
                session()->flash('error', 'Product Already Added');
                return false;
            } else {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId,
                ]);
                $this->dispatch('wishlishAddedUpdated');

                session()->flash('message', 'Wishlist Added Successfully');
            }
        } else {
            session()->flash('error', 'Please Login To Continue');
            return false;
        }
    }

    public function colorSelected($productColorId){
        $productColor = $this->product->productColors()->where('id',$productColorId)->first();
        $this->productColorSelectedQuantity = $productColor->quantity;

        if ($this->productColorSelectedQuantity == 0){
            $this->productColorSelectedQuantity = 'OutOfStock';
        }
    }

    public function incrementQuantity(){
        if ($this->quantityCount < 10)
        {
            $this->quantityCount++;
        }

    }
    public function decrementQuantity(){
        if ($this->quantityCount > 1)
        {
            $this->quantityCount--;
        }
    }
    public function render()
    {
        return view('livewire.user.product.single-page');
    }
}
