<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index(){
        $colors = Color::paginate(5);
        return view('admin.color.index',compact('colors'));

    }

    public function create(){
        return view('admin.color.create');
    }

    public function store(ColorFormRequest $request){
        $validatedData = $request->validated();
        Color::create($validatedData);
        return view('admin.color.index')->with('message','Color Added Successfully!');
    }

    public function edit(Color $color){
        return view('admin.color.edit',compact('color'));
    }

    public function update(ColorFormRequest $request,Color $color){
        $validatedData = $request->validated();
        if ($color){
            $color->update($validatedData);
            return redirect()->route('color.index')->with('message','Color Updated Successfully!');
        }else{
            return redirect()->route('color.index')->with('message','No Such Color Id Found');
        }
    }

    public function delete(Color $color){
        $color->delete();
        return redirect()->route('color.index')->with('message','Color Deleted Successfully!');

    }
}
