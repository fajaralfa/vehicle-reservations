<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeAuthController extends Controller
{
    public function login()
    {
        $input = request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth('employee')->attempt($input)) {
            request()->session()->regenerate();
            return redirect('/employee');
        }

        return redirect('/login')->withErrors(['username' => 'username atau password salah']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}
