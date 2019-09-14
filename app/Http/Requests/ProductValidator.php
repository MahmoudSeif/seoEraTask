<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        if($request->path() === 'admin/product/store') {
            return [
                'language' => 'required|integer',
                'name' => 'required|string|unique:products|max:191',
                'description' => 'required|string',
                'price' => 'required|numeric|min:1',
                'img' => 'required|image|mimes:jpeg,jpg,png,JPG'
            ];
        }
        else
        {
            return [
                'language' => 'required|integer',
                'name' => 'required|string|max:191',
                'description' => 'required|string',
                'price' => 'required|numeric|min:1',
                'img' => 'image|mimes:jpeg,jpg,png,JPG'
            ];
        }
    }
}
