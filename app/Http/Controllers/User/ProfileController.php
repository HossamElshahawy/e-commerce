<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        return view('user.pages.profile.details');
    }

    public function update(Request $request){

        $user = User::findOrFail(Auth::user()->id);

        $user->update([
            'name' => $request->name,
        ]);

            $user->userDetails()->updateOrCreate([
                    'user_id' => $user->id
            ],
            [
                'phone' => $request->phone,
                'pin_code' => $request->pin_code,
                'address' => $request->address,

            ]);

        return redirect()->back()->with('message','Profile Updated Successfully!');
    }

    public function passwordPage(){
        return view('user.pages.profile.change_password');

    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required','string','min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);
        if($currentPasswordStatus){

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('message','Password Updated Successfully');

        }else{

            return redirect()->back()->with('error','Current Password does not match with Old Password');
        }
    }
}
