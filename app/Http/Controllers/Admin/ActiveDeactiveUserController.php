<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;

class ActiveDeactiveUserController extends Controller
{
    public function __invoke($id)
    {
        DB::beginTransaction();
        try {
            $user = User::find($id);
            if ($user->isActive == 1)
                $user->isActive = 0;
            else
                $user->isActive = 1;
            $user->save();
            DB::commit();
            return redirect()->route('users')->with('success','Status Updated successfully');
        }catch (\Exception $exception) {
            DB::rollback();
            return response()/*->view('errors.error500')*/;
        }
    }
}
