<?php

namespace App\Livewire\Admin\Brand;

use App\Models\Brand;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $name, $slug, $status ='active', $brand_id;

    public function rules(){
        return [
            'name'=>'required|string',
            'slug'=>'required|string',
            'status'=>'nullable'
        ];
    }

    public function resetInputs(){
        $this->name = Null;
        $this->slug = Null;
        $this->status = Null;
        $this->brand_id = Null;
    }

    public function editBrand($brand_id){
        $this->brand_id = $brand_id;
        $brand = Brand::findOrFail($brand_id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;

    }

    public function storeBrand(){
        $validatedData = $this->validate();
        Brand::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status'=>$this->status
        ]);
        session()->flash('message','Brand Created Successfully');
        $this->dispatch('close');
        $this->resetInputs();
    }

    public function updateBrand(){
        $validatedData = $this->validate();
        Brand::findOrFail($this->brand_id)->update([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status'=>$this->status
        ]);
        session()->flash('message','Brand Updated Successfully');
        $this->dispatch('close');
        $this->resetInputs();

    }

    public function deleteBrand($brand_id){
        $this->brand_id = $brand_id;
    }

    public function destroyBrand(){
        Brand::findOrFail($this->brand_id)->delete();
        session()->flash('message','Brand Deleted Successfully');
        $this->dispatch('close');
        $this->resetInputs();
    }

    public function closeModal(){
        $this->resetInputs();
    }

    public function openModal(){
        $this->resetInputs();
    }




    public function render()
    {
        $brands = Brand::paginate(10);
        return view('livewire.admin.brand.index',compact('brands'))
                            ->extends('admin.layout.main')
                            ->section('content');
    }
}
