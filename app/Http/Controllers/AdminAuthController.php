<?php

namespace App\Http\Controllers;

class AdminAuthController extends Controller
{
    public function login()
    {
        $input = request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt($input)) {
            request()->session()->regenerate();
            return redirect('/admin');
        }

        return redirect('/admin/login')->withErrors(['username' => 'username atau password salah']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/admin/login');
    }
}
