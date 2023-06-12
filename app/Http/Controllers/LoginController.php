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

        $user = User::where('email', $credentials['email'])->first();
        $isEmailRight = (
            (strcasecmp($credentials['email'], $user->email) == 0)
                ? true 
                : false
        );
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
}
