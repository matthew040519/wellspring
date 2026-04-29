<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        try {
            // Authentication logic
            $credentials = $request->only('username', 'password');
            if (Auth::attempt($credentials)) {
                if (Auth::user()->role == 2) {
                    return redirect()->intended('members/home');
                }
                if (Auth::user()->role == 3) {
                    return redirect()->intended('merchant/home');
                }
                return redirect()->intended('admin/dashboard');
            } else {
                    return back()->withErrors([
                        'username' => 'The provided credentials do not match our records.',
                    ]);
                }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Login failed', 'details' => $e->getMessage()], 500);
        }
    }
    
    public function logout()
    {
        Auth::guard('web')->logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/');
    }
}
