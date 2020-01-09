<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdRequest extends FormRequest
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
            'title' => 'required|min:3|max:50',
            'details' => 'required|min:3',
            'price' => 'required|digits_between:2,11',
            'image' => 'mimes:jpg,jpeg,png,bmp,gif',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'العنوان مطلوب',
        ];
    }
}
