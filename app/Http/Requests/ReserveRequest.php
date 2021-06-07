<?php

namespace App\Http\Requests;

use App\Models\activity;
use App\Models\Reserve;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class ReserveRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @param Request $request
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
        $input = $request->all();
        $num = 0;
        foreach ($input as $item){
            $num++;
        }
        if($num>2){
            return [
            ];
        }
        else {
            return [
                'input' => "required"
            ];
        }
    }

    public function messages()
    {
        return [
            'input.required' => 'You mast choose one'
        ];
    }
}
