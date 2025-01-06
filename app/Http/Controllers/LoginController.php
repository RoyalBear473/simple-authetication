<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * halaman login
     */
    public function index()
    {
        return view('login');
    }

    /**
     * proses login
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ], [
            'email.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);
        $masuk = $request->only('email', 'password');
        if (Auth::attempt($masuk)) {
            return redirect()->intended('/content/home')->with('success', 'Login Berhasil');
        }
        return back()->withErrors([
            'login' => 'username atau password salah'
        ]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Logout berhasil.');
    }
}
