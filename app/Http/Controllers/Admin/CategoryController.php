<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index');
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request){
       $validatedData = $request->validated();
       $category = new Category();

       $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.' .$ext;
            $file->move('uploads/category/',$fileName);
            $category->image = $fileName;
        }

        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];

        $category->status = $validatedData['status'];

        $category->save();

        return redirect('admin/category')->with('message','Category Added Successfully');

    }

    public function edit(Category $category){
        return view('admin.category.edit',compact('category'));
    }
    public function update(CategoryFormRequest $request, $category){


        $validatedData = $request->validated();
        $category = Category::findOrFail($category);

        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];

        if ($request->hasFile('image')){
            $path = 'uploads/category/'.$category->image;
            if (File::exists($path)){
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.' .$ext;
            $file->move('uploads/category/',$fileName);
            $category->image = $fileName;
        }

        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];

        $category->status = $validatedData['status'];

        $category->update();

        return redirect('admin/category')->with('message','Category Updated Successfully');

    }
}
