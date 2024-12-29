<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    function LoginForm()
    {
        return view('authentication/login');
    }

    function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $pengguna = Pengguna::where('username', $request->username)->first();

        if ($pengguna && Hash::check($request->password, $pengguna->password)) {
            session(['user' => $pengguna->id]);
            return redirect('/dashboard');
        }

        return back()->withErrors(['login' => 'Username atau password yang anda masukkan salah harap coba lagi']);
    }

    function RegisterForm()
    {
        return view('authentication/register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|unique:pengguna|max:255',
            'password' => 'required|min:8',
            'alamat' => 'required',
            'level' => 'required|integer|in:1,2',
        ]);

        Pengguna::create([
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']),
            'alamat' => $validatedData['alamat'],
            'level' => $validatedData['level'], // Sudah berupa angka (1 atau 2)
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
    
    public function logout(Request $request)
    {
        // Hapus semua data session
        $request->session()->flush();

        // Redirect ke halaman login dengan pesan sukses
        return redirect('/login')->with('success', 'Anda telah berhasil logout.');
    }
}
