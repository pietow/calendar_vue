<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'child-image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'description' => 'required',
            'upload.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
