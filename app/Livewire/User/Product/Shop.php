<?php

namespace App\Livewire\User\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Shop extends Component
{
    use WithPagination;

    public $products, $priceInputs = 'high-to-low'; // Set a default sorting option
    protected $queryString = [
        'priceInputs' => ['except' => '', 'as' => 'price']
    ];

    public function render()
    {
        $this->products = Product::where('status', 'active')
            ->when($this->priceInputs, function ($q) {
                $q->orderBy('selling_price', $this->priceInputs == 'high-to-low' ? 'ASC' : 'DESC');
            })
            ->get();

        return view('livewire.user.product.shop', [
            'products' => $this->products,
        ]);
    }
}

