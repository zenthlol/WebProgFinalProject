<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PasswordController extends Controller
{
    public function index(){
        $title = 'Change Password';
        $active = '';

        return view('password', compact('title', 'active'));
    }

    public function update(Request $request){
        $user = User::findOrFail(auth()->user()->id);

        if(Hash::check($request->oldPassword, $user->password) && $request->newPassword === $request->confirmPassword) {
            if(Hash::check($request->newPassword, $user->password)){
                return back()->with('updateError', 'New password cannot be the same as the old password!');
            }else{
                $user->update([
                    'password' => Hash::make($request['confirmPassword'])
                ]);
                return back()->with('success', 'Update Sucessful');
            }
        }

        return back()->with('updateError', 'Update failed!');
    }
}
