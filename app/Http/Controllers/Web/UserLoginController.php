<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Jobs\SendWelcomeEmail;

class UserLoginController extends Controller
{

    public function showLogin()
    {
        return view('login');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function login(\App\Http\Requests\LoginValidator $request)
    {
        $input = $request->all();
        if (Auth::attempt(['email' => $input['email'], 'password' => $input['password'],'isAdmin' => 0, 'isActive' => 1]))
            return redirect()->route('home-page');
        else
            return "mmm";
    }

    public function register(\App\Http\Requests\UserValidator $request)
    {
        $input = $request->all();
        DB::beginTransaction();
        try {
            User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'phone' => $input['mobile'],
                'password' => bcrypt($input['password']),
            ]);
            $this->processQueue();
            DB::commit();
            return redirect()->route('show-user-login')->with('success','User Created successfully');
        }catch (\Exception $exception) {
            DB::rollback();
            return response()/*->view('errors.error500')*/;
        }
    }

    public function processQueue()
    {
        dispatch(new SendWelcomeEmail());
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('show-user-login');
    }
}
