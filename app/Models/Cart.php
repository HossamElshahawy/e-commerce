<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'product_color_id'
    ];
    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function productColors(){
        return $this->belongsTo(ProductColor::class,'product_color_id','id');
    }
}
