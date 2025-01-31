<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
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

    // halaman register
    public function register(){
        return view('register');
    }

    // proses register
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:petugas,username',
            'password' => 'required|string|min:6',
            'name' => 'required|string|max:255',
            'telp' => 'required|string|max:12',
            'alamat' => 'required|string|max:255',
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'name.required' => 'Nama wajib diisi.',
            'name.max' => 'Nama maksimal 255 karakter.',
            'telp.required' => 'No. Telp wajib diisi.',
            'telp.max' => 'No. Telp maksimal 12 karakter.',
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.max' => 'Alamat maksimal 255 karakter.',
        ]);

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nama' => $request->name,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil. Silakan login.');
    }
}
