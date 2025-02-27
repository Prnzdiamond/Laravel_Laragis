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

            if(auth()->attempt($userData)){
                return redirect()->intended()->with('message', 'logged in sucessfully');
            }else{
                return back()->withErrors(['email'=>'invalid credentials']);
            }


    }


    public function logout(){
        auth()->logout();
        return back()->with('message','user loggged out');

    }



  public function manage($user_id){
    $user = User::findorfail($user_id);
    $listings = $user->listing;
    return view('Listing.manage',[
        'listing' => $listings
    ]);
  }


}
