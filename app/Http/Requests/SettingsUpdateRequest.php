<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsUpdateRequest extends FormRequest
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
            'logo'=>'image|nullable|max:1024|mimes:jpg,jpeg,png',
            'logotext'=>'max:40|nullable',
            'about'=>'min:40|required',
            'contact'=>'min:20|required'
        ];
    }

    public function attributes() {
        return [
            'logo'=>'Logo image',
            'logotext'=>'Company Name',
            'about'=>'About Us',
            'contact'=>'Contact Us'
        ];
    }
}
