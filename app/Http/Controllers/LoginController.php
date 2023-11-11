<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function loginproses(Request $request)
{
    if (Auth::attempt($request->only('email', 'password'))) {
        return redirect('/');
    }
    return redirect('login');
}

    public function logout()
    {
        Auth::logout();
        return redirect('/login'); // Sesuaikan dengan rute halaman login
    }

    public function register()
    {
        return view('register'); // Ganti 'register' dengan nama tampilan yang sesuai
    }

    public function registeruser(Request $request)
    {
        // Implementasi registrasi user
        // ...
    }

    public function registeradmin(Request $request)
    {
        // Implementasi registrasi admin
        // ...
    }
}
