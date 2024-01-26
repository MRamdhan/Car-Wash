<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login() {
        return view('login');
    }

    function postlogin(Request $request) {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($data)) {
            $user = auth()->user();
            if ($user->role == 'kasir') {
                return redirect()->route('homeKasir')->with('message', 'Selamat Datang ' . $user->name . '!');
            } elseif ($user->role == 'admin') {
                return redirect()->route('homeAdmin')->with('message', 'Selamat Datang ' . $user->name . '!');
            } elseif ($user->role == 'owner') {
                return redirect()->route('homeOwner')->with('message', 'Selamat Datang ' . $user->name . '!');
            }
        }
    
        return redirect()->route('login')->with('message', 'Email atau password salah!');
    }
    
    function homeKasir() {
        $paket = Paket::all();

        return view('homeKasir',compact('paket'));
    }
    function homeAdmin() {
        $paket = Paket::all();
        return view('admin.homeAdmin', compact('paket'));
    }
    function homeOwner() {
        return view('owner.owner');
    }

    function logout() {
        auth()->logout();
        return redirect()->route('login')->with('message', 'Logout Berhasil');
    }
}
