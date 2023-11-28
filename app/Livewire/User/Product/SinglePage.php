<?php

namespace App\Livewire\User\Product;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SinglePage extends Component
{
    public $category, $product, $productColorSelectedQuantity, $quantityCount = 1, $productColorId;

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
        $this->productColorId = $productColorId;
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

    public function addToCart($productId){
        if (Auth::check())
        {
            if ($this->product->where('id',$productId)->where('status','active')->exists())
            {
                // check for product color quantity and add to cart
                if ($this->product->productColors()->count()>1 ){
                    //color selected
                    if ($this->productColorSelectedQuantity != null){

                        if(Cart::where('user_id',\auth()->user()->id)
                            ->where('product_color_id',$this->productColorId)
                            ->where('product_id',$productId)
                            ->exists()){
                            session()->flash('error', "Product Already Added");

                        }else{
                            $productColor = $this->product->productColors()->where('id',$this->productColorId)->first();
                            if($productColor->quantity > 0){
                                if ($productColor->quantity > $this->quantityCount)
                                {
                                    // insert product to cart
                                    Cart::create([
                                        'user_id'=>\auth()->user()->id,
                                        'product_id' => $productId,
                                        'product_color_id' => $this->productColorId,
                                        'quantity' => $this->quantityCount
                                    ]);
                                    $this->dispatch('cartAddedUpdated');
                                    session()->flash('message', "Product Added To Cart");

                                }else
                                {
                                    session()->flash('error', "only ".$productColor->quantity." Available");
                                }

                            }else{
                                session()->flash('error', "Out Of Stock");
                            }

                        }
                    }else{
                        session()->flash('error', "Select Your Product Color");
                    }

                }else{
                    if (Cart::where('user_id',\auth()->user()->id)->where('product_id',$productId)->exists()){
                        session()->flash('error', "Product Already Added");

                    }else{
                        if ($this->product->quantity > 0)
                        {

                            //am add to cart without colors
                            if ($this->product->quantity > $this->quantityCount)
                            {
                                // insert product to cart
                                Cart::create([
                                    'user_id'=>\auth()->user()->id,
                                    'product_id' => $productId,
                                    'quantity' => $this->quantityCount
                                ]);
                                $this->dispatch('cartAddedUpdated');
                                session()->flash('message', "Product Added To Cart");
                            }else
                            {
                                session()->flash('error', "only".$this->product->quantity."Available on Stock");
                            }

                        }else{
                            session()->flash('error', "out Of Stock");
                        }
                    }

                }


            }else
            {
                session()->flash('error', "Product Doesn't exist");

            }

        }else{
            session()->flash('error', 'login to continue');
        }


    }

    public function render()
    {
        return view('livewire.user.product.single-page');
    }
}
