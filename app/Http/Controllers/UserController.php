<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
  
    public function Register_page(){
        return view('User.Register');
    }

    public function login_page(){
        return view('User.login');
    }

    public function store(){
        $userData = Request()->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users,email',
            'password'=>'required|confirmed|min:4'
        ]);
      
        $user = User::create($userData);
        auth()->login($user);
        return redirect('/')->with('message','loggged in');

    }


    public function login(){
            $userData = request()->validate([
                'email'=>'required|exists:users,email',
                'password'=>'required'
            ]);

           
    }


    public function logout(){
        auth()->logout();
        return back()->with('message','user loggged out');

    }
}
