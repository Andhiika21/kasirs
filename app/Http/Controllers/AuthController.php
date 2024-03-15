<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rolr;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function dologin(Request $request) {
        // validasi

        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        

        if (auth()->attempt($credentials)) {

            // buat ulang session login
            $request->session()->regenerate();

            if (auth()->user()->role_id === 1) {
                // jika user superadmin
                return redirect()->intended('/dashboard');
            } elseif (auth()->user()->role_id === 2) {
                // jika user pegawai
                return redirect()->intended('/home');
            } elseif (auth()->user()->role_id === 3) {
                // jika user pegawai
                return redirect()->intended('/home');
            }
        }

        // jika email atau password salah
        // kirimkan session error
        return back()->with('error', 'email atau password salah');
    }

    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


    public function home(){

        return view('home');
    }
}
