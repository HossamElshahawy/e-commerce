<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   public function index(){
        $users = User::paginate(10);
       return view('admin.users.index',compact('users'));
   }
    public function create(){

        return view('admin.users.create');
    }

    public function store(Request $request){
       $validateDate = $request->validate([
           'name' => ['required', 'string', 'max:255'],
           'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
           'password' => ['required', 'string', 'min:8', 'confirmed'],
           'role_as' => ['required', 'in:user,admin'],
       ]);

       User::create([
           'name' => $validateDate['name'],
           'email' => $validateDate['email'],
           'role_as' => $validateDate['role_as'],
           'password' => Hash::make($validateDate['password']),
       ]);
        return redirect('admin/users')->with('message','User Added Successfully!');
    }

    public function edit(User $user){

        return view('admin.users.edit',compact('user'));
    }

    public function update(Request $request,$userId){

        $validateDate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'role_as' => ['required', 'in:user,admin'],
        ]);

        User::findOrFail($userId)->update([
            'name' => $validateDate['name'],
            'role_as' => $validateDate['role_as'],
            'password' => Hash::make($validateDate['password']),
        ]);
        return redirect('admin/users')->with('message','User Updated Successfully!');
    }

    public function delete($userId){
        $user = User::findOrFail($userId);

       $user->delete();
        return redirect()->back()->with('message','User Deleted Successfully!');

    }
}
