<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $category_id;

    public function deleteCategory($category_id){

        $this->category_id = $category_id;
    }

    public function destroyCategory(){

        $category = Category::findOrFail($this->category_id);
        $path = 'uploads/category/'.$category->image;
        if (File::exists($path)){
            File::delete($path);
        }
        $category->delete();
        session()->flash('message','Category Deleted Successfully');
        $this->dispatch('close');
    }

    public function render()
    {
        $categories = Category::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.category.index',compact('categories'));
    }
}
