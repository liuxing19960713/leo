<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class RegisterInsert extends FormRequest
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
            'uname'=>'required',
            'upwd' =>'required|regex:/^[a-zA-Z][a-zA-Z0-9_]{5,20}$/',
            'rupwd'=>'required|same:upwd',
            'code' => 'required'

        ];
    }

    public function messages()
    {
        return [
                'uname.required'=>'用户名不能为空',
                'upwd.required' =>'密码不能为空',
                'rupwd.required'=>'确认密码不能为空',
                'uname.regex'   => '用户名不符合要求',
                'rupwd.regex'   => '密码不符合要求',
                'rupwd.same'    =>'两次密码不相同',
                'code.required' =>'验证码不能为空'

              ];

    }
}
