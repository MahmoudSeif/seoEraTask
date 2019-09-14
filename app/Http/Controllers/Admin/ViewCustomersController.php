<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;

class ViewCustomersController extends Controller
{
    public function __invoke()
    {
        $users = User::where('isAdmin',0)->get();
        return view('admin.users',compact('users'));
    }
}
