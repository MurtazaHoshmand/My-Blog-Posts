<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return 'hello';
    }
    public function login(){
        return view('auth.login');
    }
    public function registration(){
        return view('auth.registration');
    }
    public function registerUser(Request $request){
        
        $request->validate([
            'email'=> 'required|email|unique:users',
            'password'=> 'required',
            'name'=>'required|min:5|max:40'
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $result = $user->save();

        if($result){
            return back()->with('success','You have registered successfully!');
        }else{
            return back()->with('fail','Something went wrong!');
        }
    }

    public function loginUser(Request $request){

        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required',
        ]);

        $credentials=$request->only('email','password');
        $user = User::where('email', $request->email)->first();

        if(Auth::attempt($credentials)){
            $request->session()->put('loginId', $user->id);
            $request->session()->put('loginName', $user->name);
            return redirect('posts');
        }
        else{
            return back()->with('fail1','could not logged you in');
        }

    }


    public function logout(Request $request){
        $request->session()->forget('loginId');
        Auth::logout();
        return view('home.index');
    }

}
