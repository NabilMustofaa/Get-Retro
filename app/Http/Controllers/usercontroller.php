<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class usercontroller extends Controller
{
    public function postRegister (Request $request){
        
        $validatedData =$request->validate([
            'email'=>'required|unique:users',
            'name'=>'required',
            'password'=>'required',
            'address'=>'required',
        ]);
        $validatedData['password']=Hash::make($validatedData['password']);
    
        User::create($validatedData);
        
        return redirect('/login')->with('success','Akun berhasil dibuat');
    }

    public function register() {
            return view('register',[
                'title'=>'Retro|Cart'
            ]);
    }
    public function login() {
        return view('login',[
            'title'=> 'Login'
        ]);
    }

    public function authenticate(Request $request){
        $credentials= $request->validate([
            'email'=>'required|email:dns',
            'password'=>'required'
        ]);
        

       if (Auth::attempt($credentials)){
           $request->session()->regenerate();
           return redirect()->intended('/dashboard');
       }
       return back()->with('loginError','Login failed');
    }
    
    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
        
        $request->session()->regenerateToken();
        
        return redirect('/');
    }


}
