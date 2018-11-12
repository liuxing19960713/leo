<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WheelEdit extends FormRequest
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
            //
            'l_name'=>'required|regex:/^[\p{Han}_a-zA-Z0-9]{1,20}$/u',
            // 'l_pic'=>'required',
            'status'=>'required',
        ];
    }
    public function messages(){
        return [
            'l_name.required'=>'图片名字不能为空',
            'l_name.regex'=>'图片名字不能有除了数字字母中文的2-20位字符',
            // 'l_pic.required'=>'请上传图片',
            'status.required'=>'状态不能为空',
        ];
    }
}
