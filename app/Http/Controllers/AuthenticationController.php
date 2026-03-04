<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Passwords;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller{
    
    public function loginUser(Request $request){

        if(Auth::attempt(['Username'=>$request->username,'password'=>$request->password])){
            return redirect('/home');   
        }else{
            return "Invalid login";
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function signUpUser(Request $request){ 

        echo $request->username;
        $User = Users::create([
            'Username' => $request->username,
            'Age' => $request->age
        ]);
    
        Passwords::create([
            'Username'=>$request->username,
            'Password'=>Hash::make($request->password)
        ]);

    }
    
}
