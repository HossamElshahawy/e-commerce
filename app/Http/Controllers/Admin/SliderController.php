<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index(){
        $sliders = Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }
    public function create(){
        return view('admin.slider.create');
    }
    public function store(SliderFormRequest $request){
        $validatedData = $request->validated();

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.' .$ext;
            $file->move('uploads/sliders/',$fileName);
            $validatedData['image'] = $fileName;
        }

        Slider::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status'],
        ]);


        return redirect()->route('slider.index')->with('message','Slider Added Successfully!');
    }

    public function edit(Request $request,Slider $slider){

        return view('admin.slider.edit',compact('slider'));
    }

    public function update(SliderFormRequest $request,Slider $slider){
        $validatedData = $request->validated();

        if ($request->hasFile('image')){

            $destination = $slider->image;
            if (File::exists($destination))
            {
                File::delete($destination);
            }


            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.' .$ext;
            $file->move('uploads/sliders/',$fileName);
            $validatedData['image'] = $fileName;
        }

        Slider::where('id',$slider->id)->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status'],
        ]);
        return redirect()->route('slider.index')->with('message','Slider Updated Successfully!');

    }
    public function delete(Slider $slider){
    if ($slider->count() > 0){
        if (File::exists($slider->image))
        {
            File::delete($slider->image);
        }
        $slider->delete();
        return redirect()->back()->with('message','Slider Deleted Successfully!');
    }
        return redirect()->back()->with('error','Some Thing Went Wrong!');


    }
}
