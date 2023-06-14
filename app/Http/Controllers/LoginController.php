<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        // dd($credentials['password']);
        $user = User::where('email', $credentials['email'])->first();

        if ($user == null) {
            return back()->withErrors(['loginFailed' => 'Email or password is incorrect!']);
        }

        $isEmailRight = $user != null;
        $isPasswordRight = Hash::check($credentials['password'], $user->password);
        
        if ($isEmailRight && $isPasswordRight) {
            $request->session()->put('loginId', $user->nim);
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }
        return back()->withErrors(['loginFailed' => 'Email or password is incorrect!']);
    }

    public function logout(Request $request) {
        if ($request->session()->has('loginId')) {
            $request->session()->pull('loginId');
            return redirect()->intended('login');
        }
    }

    public function authCheck(Request $request) {
        if ($request->session()->has('loginId')) {
            return redirect()->intended('home');
        }
        return redirect()->intended('login');
    }
}
