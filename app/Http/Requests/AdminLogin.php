<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLogin extends FormRequest
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
            // 'captcha'=>'required|captcha',
            'name'=>'required',
            'pwd'=>'required',
        ];
    }

    public function messages(){
        return [
            // 'captcha.required'=>'验证码不能为空',
            // 'captcha.captcha'=>'验证码不正确',
            'name.required'=>"账号不能为空",
            'pwd.required'=>'密码不能为空',
        ];
    }
}
