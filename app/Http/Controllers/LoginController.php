<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminat\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        $title = 'Login';
        return view('login.index', compact('title'));
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();


            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login failed!');

    }
}
