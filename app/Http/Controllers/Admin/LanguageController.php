<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Support\Facades\DB;

class LanguageController extends Controller
{
    public $languageImage_folder = '/images' . Language::UPLOAD_FOLDER;

    public function index()
    {
        $languages = Language::all();
        return view('admin.language.index',compact('languages'));
    }

    public function create()
    {
        return view('admin.language.create');
    }

    public function store(\App\Http\Requests\LanguageValidator $request)
    {
        $input = $request->all();
        DB::beginTransaction();
        try {
            $language = Language::create([
                'title' => $input['title'],
                'slogan' => $input['slogan'],
            ]);
            if (isset($input['img']))
            {
                $image = $request->file('img');
                $image_path = public_path($this->languageImage_folder);
                if(!empty($image_path)){
                    $image_name = time().'.'. $image->getClientOriginalExtension();
                    $language->img = $image_name;
                    $language->save();
                    $image->move($image_path, $image_name);
                }
            }
            DB::commit();
            return redirect()->route('languages')->with('success','New Language Added successfully');
        }catch (\Exception $exception) {
            DB::rollback();
            return response()/*->view('errors.error500')*/;
        }
    }
}
