<?php

namespace App\Livewire\User\Checkout;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Livewire\Component;

class Index extends Component
{
    public $carts, $totalProductAmount;
    public $full_name, $email, $phone, $pincode, $address, $payment_mode = null, $payment_id = null;

    public function rules(){
        return [
            'full_name' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone'=> 'required|string|max:11|min:10',
            'pincode'=> 'required|string|max:5|min:5',
            'address'=> 'required|string|max:500',
            'payment_mode' => 'required'
        ];
    }
    public function placeOrder(){
        $this->validate();
        $order =Order::create([
            'user_id' => auth()->user()->id,
            'tracking_on' => 'funda-'.Str::random(10),
            'full_name' => $this->full_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'in progress',
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id,
        ]);
        foreach ($this->carts as $cartItem){

                $orderItems = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product_color_id' => $cartItem->product_color_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->selling_price,
            ]);
                if ($cartItem->product_color_id != null){
                    $cartItem->productColors()->where('id',$cartItem->product_color_id)->decrement('quantity',$cartItem->quantity);
                }else{
                    $cartItem->product()->where('id',$cartItem->product_id)->decrement('quantity',$cartItem->quantity);
                }
        }
        if ($this->payment_mode === 'cash_on_delivery') {
            $this->codOrder();
        } elseif ($this->payment_mode === 'paypal') {
            dd('paypal');
        } elseif ($this->payment_mode === 'directcheck') {
            dd('directcheck');
        } elseif ($this->payment_mode === 'banktransfer') {
            dd('banktransfer');
        }

    }

    public function codOrder(){
            Cart::where('user_id',auth()->user()->id)->delete();
            session()->flash('message', 'Order Placed Successfully');
            return Redirect::to('thank-you');

    }

    public function totalProductAmount(){
        $this->carts = Cart::where('user_id',auth()->user()->id)->get();
        foreach ($this->carts as $cartItem){
            $this->totalProductAmount += $cartItem->product->selling_price * $cartItem->quantity;
        }
        return $this->totalProductAmount;
    }

    public function render()
    {
        $this->full_name = auth()->user()->name;
        $this->email = auth()->user()->email;

        $carts = Cart::where('user_id',auth()->user()->id)->get();
        $this->totalProductAmount = $this->totalProductAmount();
        return view('livewire.user.checkout.index',[
            'totalProductAmount' => $this->totalProductAmount,
            'carts' => 'carts'
        ]);
    }
}
