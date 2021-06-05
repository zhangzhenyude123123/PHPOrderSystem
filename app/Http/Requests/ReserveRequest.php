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
     * @var mixed
     */



    /**
     * Determine if the user is authorized to make this request.
     *
     * @param Request $request
     * @return bool
     */
    public function authorize(Request $request)
    {
//        $input1 = $request->input('testname');
//        echo ($request->path());
//        echo($input1);
//        $input2 = $request->all();
//        foreach ($input2 as $item){
//            echo $item;
//            $input1 .= $item;
//        }
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

        ];
    }

    public function messages()
    {
        return [
            'name.unique' => '用户名已被占用，请重新填写',
            'name.regex' => '用户名只支持英文、数字、横杠和下划线。',
            'name.between' => '用户名必须介于 3 - 25 个字符之间。',
            'name.required' => '用户名不能为空。',
        ];
    }
}
