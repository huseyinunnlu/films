<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialCreateRequest extends FormRequest
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
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        return [
            'title'=>'required|max:50',
            'link'=>'required|regex:'.$regex,

        ];
    }

    public function attributes() {
        return [
            'title'=>'Title',
            'link'=>'URL',
            'icon'=>'Icon',
            'status'=>'Status',
        ];
    }
}
