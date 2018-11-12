<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Administratorinsert extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //授权表单校验类
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
            //required 数据不能为空规则 regex 正则规则 unique唯一规则 users操作的数据表 same一致规则
            'name'=>'required|regex:/\w{4,8}/|unique:admin',
            'pwd'=>'required|regex:/\w{6,18}/',
            'repassword'=>'required|regex:/\w{6,18}/|same:pwd',
            
            
        ];
    }

    //自定义错误消息
    public function messages(){
        return [
                'name.required'=>'用户名不为空',
                'name.regex'=>'用户名必须为4-8位任意的数字字母下划线',
                'name.unique'=>'用户名重复',
                'pwd.required'=>'密码不能为空',
                'pwd.regex'=>'密码必须为6-18位任意的数字字母下划线',
                'repassword.required'=>'重复密码不能为空',
                'repassword.regex'=>'重复密码必须为6-18位任意的数字字母下划线',
                'repassword.same'=>'两次密码不一致',
                
                
                
                ];
    }
}
