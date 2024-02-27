<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //

    public function logout(){
        auth()->logout();
        return redirect('/');
    }

    public function login(Request $request){

        $incomingFields = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt([
            'email' => $incomingFields['email'], 
            'password' => $incomingFields['password']
            ])){
            $request->session()->regenerate();

            return redirect('/dashboard/news_upload');
        }

        return 'login unsuccessful';
    }

    public function register(Request $request){

        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:20'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6', 'max:200'],
            'phone' => ['required', 'min:11', 'max:16']
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $admin = User::create($incomingFields);
        return redirect('/auth/login');    
        

        //return redirect('/dashboard');
        

    }
}
