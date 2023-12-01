<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function index(){
        $title = 'Profile';
        $active = '';

        return view('profile', compact('title', 'active'));
    }

    public function update(Request $request){
        $user = User::findOrFail(auth()->user()->id);
        $validatedData = $request->validate([
            'name'=>'required|string|min:5|max:100',
        ]);

        if(Hash::check($request->password, $user->password)) {
            $user->update($validatedData);


            return back()->with('success', 'Update Sucessful');
        }





        return back()->with('updateError', 'Update failed!');
    }
}
