<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'email'=>'required',
            'message'=>'required|max:2500|min:20'
        ];
    }

    public function attributes(){
        return [
            'name'=>'Your Name And Surname',
            'email'=>'Your Email',
            'message'=>'Your Message',
            ];
        }
    }
