<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Language;
use App\Product;

class HomeController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        $products = Product::where('language_id',1)->get();
        return view('index',compact('products','languages'));
    }
}
