<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            Alert::success('Login Berhasil', 'Selamat datang kembali!');
            return redirect()->route('dashboard');
        } else {
            Alert::error('Login Gagal', 'Email atau password salah.');
            return back()->withInput();
        }
    }


    public function logout()
    {
        Auth::logout();
        Alert::info('Logout Berhasil', 'Anda telah keluar dari sistem.');
        return redirect('/login');

    }
}
