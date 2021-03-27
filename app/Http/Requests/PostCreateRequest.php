<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
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
            'title'=>'required|max:255',
            'banner'=>'required|image|mimes:jpeg,png,jpg|max:2048',
            'desc'=>'required|max:10000|min:50',
            'category'=>'nullable',
            'director'=>'required|max:255',
            'release_date'=>'required',
            'company'=>'max:255',
        ];
    }
    public function attributes(){
        return [
            'title'=>'Title',
            'banner'=>'Film Banner',
            'desc'=>'Film Description',
            'director'=>'Director Name',
            'release_date'=>'Releas Date',
            'company'=>'Production Company',
        ];
    }
}
