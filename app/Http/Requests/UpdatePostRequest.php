<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdatePostRequest extends FormRequest
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
        $textFields = collect($this->all())->filter(function($item, $key){
            return Str::contains($key, 'description-');
        })->keys()->first();
        return [
            'title' => 'required|max:255',
            $textFields => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'image-*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'upload.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
