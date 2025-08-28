<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerview(){
        return view('register');
    }


    public function loginview(){
        return view('login');
    }


    public function register(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6'
        ]);

        $register = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        if($register ){
            return redirect()->back()->with('success','Registration successful. Please login.');
        }else{
            return redirect()->back()->with('error','Registration Failed. Please try again.');
        }
echo"sfs";print_r($request->all());exit();

    }

 public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:8'
    ], [
        'email.required' => 'Please enter your email address.',
        'email.email' => 'Enter a valid email format (e.g., user@example.com).',
        'password.required' => 'Please enter your password.',
        'password.min' => 'Password must be at least 8 characters long.',
    ]);

    $user = User::where('email', $request->email)->first();

    if(!$user){
        return redirect()->back()->withInput()->with('email_error', 'This email is not registered. Please check and try again.');
    }

    if(!Hash::check($request->password, $user->password)){
        return redirect()->back()->withInput()->with('password_error', 'Incorrect password. Please try again.');
    }

    Auth::login($user);
    return redirect('/admin');
}

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
