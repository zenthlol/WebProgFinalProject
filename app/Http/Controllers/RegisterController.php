<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        $title = "Register";
        return view('register.index', compact('title'));
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            //validasi REGISTER
            'name'=>'required|string|min:5|max:100',
            'email'=>'required|email:dns|unique:users',
            'password'=>'required|min:8|max:255',
        ]);

        // Encrypt Password
        // cara1
        // $validatedData['password'] = bcrypt($validatedData['password']);
        // cara2
        $validatedData['password'] = Hash::make($validatedData['password']);

        // dd('berhasil');
        User::create($validatedData);

        // $request->session()->flash('success', 'Registration was successful! Please Login!'); kalo mau pake ini bisa tapi withnya gausah dipake
        return redirect('login')->with('success', 'Registration was successful! Please Login!');
    }
}
