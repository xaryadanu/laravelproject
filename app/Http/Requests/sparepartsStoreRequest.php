<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class sparepartsStoreRequest extends FormRequest
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
            "name"=> 'required|string|min:3|max:40',
            "description"=> 'required|string|min:3|max:300',
            "price"=> 'required|string|min:3|max:9999999999',
            "image"=>'required|mimes:png,jpg,jpeg,webp'
        ];
    }
}
