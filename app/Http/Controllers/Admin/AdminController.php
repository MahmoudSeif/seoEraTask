<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Language;
use App\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::where('isAdmin',1)->get();
        return view('admin.index',compact('admins'));
    }

    public function create()
    {
        $languages = Language::all();
        return view('admin.create',compact('languages'));
    }

    public function store(\App\Http\Requests\AdminValidator $request)
    {
        $input = $request->all();
        DB::beginTransaction();
        try {
            User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'phone' => $input['mobile'],
                'password' => bcrypt($input['password']),
                'language_id' => $input['language'],
                'isAdmin' => 1
            ]);
            DB::commit();
            return redirect()->route('admins')->with('success','New Admin Added successfully');
        }catch (\Exception $exception) {
            DB::rollback();
            return response()/*->view('errors.error500')*/;
        }
    }

    public function destroy($id)
    {
        $admin = User::find($id);
        DB::beginTransaction();
        try {
            $admin->delete();
            DB::commit();
            return redirect()->route('admins')->with('success','Admin Deleted successfully');
        }catch (\Exception $exception){
            DB::rollback();
            return response()/*->view('errors.error500')*/;
        }
    }
}
