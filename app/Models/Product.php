<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
         'name',
         'slug',
         'brand',
         'small_description',
         'description',
         'original_price',
         'selling_price',
         'quantity',
        'trending',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'category_id',
    ];


    public function Category(){
        return $this->belongsTo(Category::class);
    }

    public function productImages(){
        return $this->hasMany(ProductImage::class,'product_id','id');
    }

    public function productColors(){
        return $this->hasMany(ProductColor::class);
    }
}
