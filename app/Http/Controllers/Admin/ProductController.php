<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(){
        $products = Product::with('Category')->get();
        return view('admin.product.index',compact('products'));
    }
    public function create(){
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create',compact('categories','brands'));
    }
    public function store(ProductFormRequest $request){

        $validatedData = $request->validated();

        $category = Category::findOrFail($validatedData['category_id']);

        $product = $category->products()->create([
                'category_id' => $validatedData['category_id'],
                'name' => $validatedData['name'],
                'slug' => Str::slug($validatedData['slug']),
                'brand' => $validatedData['brand'],
                'small_description' => $validatedData['small_description'],
                'description' => $validatedData['description'],

                'original_price' => $validatedData['original_price'],
                'selling_price' => $validatedData['selling_price'],
                'quantity' => $validatedData['quantity'],
                'trending' => $validatedData['trending'],
                'status' => $validatedData['status'],

                'meta_title' => $validatedData['meta_title'],
                'meta_keyword' => $validatedData['meta_keyword'],
                'meta_description' => $validatedData['meta_description'],
            ]);

        if ($request->hasFile('image')){

            $uploadPath = 'uploads/products/';
            $i=1;
            foreach ($request->file('image') as $imageFile){
                $extention = $imageFile->getClientOriginalExtension();
                $fileName = time().$i++.'.'.$extention;
                $imageFile->move($uploadPath,$fileName);
                $finalImagePathName = $uploadPath.$fileName;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName
                ]);
            }
        }

        return redirect()->route('product.index')->with('message','Product Added Successfully!');
    }

    public function edit(Product $product){
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.product.edit',compact('brands','categories','product'));
    }

    public function update(ProductFormRequest $request,Product $product){

        $validatedData = $request->validated();

        $product = Category::findOrFail($validatedData['category_id'])
                            ->products()->where('id',$product->id)->first();

        if ($product){
            $product->update([
                'category_id' => $validatedData['category_id'],
                'name' => $validatedData['name'],
                'slug' => Str::slug($validatedData['slug']),
                'brand' => $validatedData['brand'],
                'small_description' => $validatedData['small_description'],
                'description' => $validatedData['description'],

                'original_price' => $validatedData['original_price'],
                'selling_price' => $validatedData['selling_price'],
                'quantity' => $validatedData['quantity'],
                'trending' => $validatedData['trending'],
                'status' => $validatedData['status'],

                'meta_title' => $validatedData['meta_title'],
                'meta_keyword' => $validatedData['meta_keyword'],
                'meta_description' => $validatedData['meta_description'],
            ]);

            if ($request->hasFile('image')){

                $uploadPath = 'uploads/products/';
                $i=1;
                foreach ($request->file('image') as $imageFile){
                    $extention = $imageFile->getClientOriginalExtension();
                    $fileName = time().$i++.'.'.$extention;
                    $imageFile->move($uploadPath,$fileName);
                    $finalImagePathName = $uploadPath.$fileName;

                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName
                    ]);
                }
            }
            return redirect()->route('product.index')->with('message','Product Updated Successfully!');

        }
            else{
            return redirect()->route('product.index')->with('message','No Such Product Id Found');
            }

    }

    public function delete(Product $product){

        if ($product->productImages()){
            foreach ($product->productImages as $image){
                if (File::exists($image->image)){
                    File::delete($image->image);
                }
            }
        }
        $product->delete();
       return redirect()->route('product.index')->with('message','Product Deleted Successfully wih All his Images!');
    }

    public function deleteProductImage(ProductImage $image){
        if (File::exists($image->image)){
            File::delete($image->image);
        }
        $image->delete();
        return redirect()->back()->with('message','Image Deleted Successfully!');

    }

}
