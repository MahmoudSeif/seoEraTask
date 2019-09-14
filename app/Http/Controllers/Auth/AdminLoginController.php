<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(\App\Http\Requests\LoginValidator $request)
    {
        $input = $request->all();
        if (Auth::attempt(['email' => $input['email'], 'password' => $input['password'],'isAdmin' => 1, 'isActive' => 1]))
            return redirect()->route('dashboard');
        else
            return "mmm";
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('show-admin-login');
    }
}
