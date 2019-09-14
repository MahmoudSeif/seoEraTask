<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Language;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public $productImage_folder = '/images' . Product::UPLOAD_FOLDER;

    public function index()
    {
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }

    public function create()
    {
        $languages = Language::all();
        return view('admin.product.create',compact('languages'));
    }

    public function store(\App\Http\Requests\ProductValidator $request)
    {
        $input = $request->all();
        DB::beginTransaction();
        try {
            $product = Product::create([
                'name' => $input['name'],
                'description' => $input['description'],
                'price' => $input['price'],
                'language_id' => $input['language']
            ]);
            if (isset($input['img']))
            {
                $image = $request->file('img');
                $image_path = public_path($this->productImage_folder);
                if(!empty($image_path)){
                    $image_name = time().'.'. $image->getClientOriginalExtension();
                    $product->img = $image_name;
                    $product->save();
                    $image->move($image_path, $image_name);
                }
            }
            DB::commit();
            return redirect()->route('products')->with('success','New Product Added successfully');
        }catch (\Exception $exception) {
            DB::rollback();
            return response()/*->view('errors.error500')*/;
        }
    }

    public function view($id)
    {
        $product = Product::find($id);
        $languages = Language::where('id','!=',$product->language_id)->get();
        return view('admin.product.show',compact('product','languages'));
    }

    public function update(\App\Http\Requests\ProductValidator $request, $id)
    {
        $input = $request->all();
        DB::beginTransaction();
        try {
            $product = Product::find($id);
            $product->name = $input['name'];
            $product->description = $input['description'];
            $product->price = $input['price'];
            $product->language_id = $input['language'];
            if (isset($input['img']))
            {
                $image = $request->file('img');
                $image_path = public_path($this->productImage_folder);
                if(!empty($image_path)){
                    $oldImage = $image_path . $product->img;
                    //Search for the file in the mentioned directory
                    $checkImage = glob($oldImage);
                    if ($checkImage){
                        unlink($oldImage);
                    }
                    $image_name = time().'.'. $image->getClientOriginalExtension();
                    $product->img = $image_name;
                    $image->move($image_path, $image_name);
                }
            }
            $product->save();
            DB::commit();
            return redirect()->route('products')->with('success','Product Updated successfully');
        }catch (\Exception $exception) {
            DB::rollback();
            return response()/*->view('errors.error500')*/;
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        DB::beginTransaction();
        try {
            $image_path = public_path($this->productImage_folder);
            $image = $image_path . $product->img;
            //Search for the file in the mentioned directory
            $product->delete();
            DB::commit();
            $checkImage = glob($image);
            if ($checkImage){
                unlink($image);
            }
            return redirect()->route('products')->with('success','Product Deleted successfully');
        }catch (\Exception $exception){
            DB::rollback();
            return response()/*->view('errors.error500')*/;
        }
    }
}
