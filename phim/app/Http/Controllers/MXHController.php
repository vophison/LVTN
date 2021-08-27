<?php

namespace App\Http\Controllers;
use Socialite;
use Illuminate\Http\Request;

class MXHController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();

    }
    public function handleGoogleCallback()
    {         
       $user=Socialite::driver('google')->user();
       //dd($user);
       $authUser = User::where('email',$user->email)->first();
        if(isset($authUser)){  
            Session::put('hoten1',$user->name);      
            Session::put('email',$user->email);
            Session::put('google_id',$user->id);
            return redirect()->route('index');
        }else{
            $newUser = new User();
            $newUser->tentaikhoan = $user->name;
            $newUser->hoten='';
            $newUser->email = $user->email;
            $newUser->google_id = $user->id;
            $newUser->password = bcrypt('');
          
            $newUser->save();
            Session::put('hoten1',$user->name);
            
            Session::put('email',$user->email);
            Session::put('google_id',$user->id);
            
            return redirect()->route('index')->with('googless');
        }
    }
}
