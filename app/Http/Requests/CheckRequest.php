<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckRequest extends FormRequest
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
            'validatecode'=>'required',
            'password'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'validatecode.required' => 'You must enter your validate',
            'password.required'=>'You must enter your id password'
        ];
    }
}
