<?php

namespace App\Livewire\User\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $products, $category, $brandInputs = [], $priceInputs;

    protected $queryString = [
      'brandInputs' => ['except' => '', 'as'=>'brand'],
        'priceInputs' => ['except' => '', 'as'=>'price']

    ];
    public function mount($category)
    {
        $this->category = $category;
    }

    public function render()
    {
        $this->products = Product::where('category_id',$this->category->id)
                                    ->when($this->brandInputs,function ($q){
                                        $q->whereIn('brand',$this->brandInputs);
                                    })
                                    ->when($this->priceInputs,function ($q){

                                        $q->when($this->priceInputs == 'high-to-low', function ($q2){
                                                $q2->orderBy('selling_price','ASC');
                                        })
                                             ->when($this->priceInputs == 'low-to-high', function ($q2){
                                                 $q2->orderBy('selling_price','DESC');
                                             });
                                    })
                                    ->where('status','active')
                                    ->get();

        return view('livewire.user.product.index',[
            'products' => $this->products,
            'category' => $this->category,

        ]);
    }
}
