<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }
    
    public function login(Request $request)
    {
        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ])) {
            return redirect('/dashboard');
        }
        
        return back()->with('error', 'Invalid login');
    }
    
    public function showRegister()
    {
        return view('auth.register');
    }
    
    public function register(Request $request)
    {
        \App\Models\User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);
        
        Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ]);
        
        return redirect('/dashboard');
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}