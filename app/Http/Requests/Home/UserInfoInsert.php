<?php
//用户个人信息编辑
namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class UserInfoInsert extends FormRequest
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
            'username'  =>'required',
            'email'     =>'required|email',
            'age'       =>'required',
            'sex'       =>'required',
            'phone'     =>'required|regex:/[0-9]{11}/',
            'address'   =>'required'
        ];
    }

    public function messages()
    {
        return [
                'username.required' =>'姓名不能为空',
                'email.required'    =>'邮箱不能为空',
                'age.required'      =>'年龄不能为空',
                'sex.required'      =>'性别不能为空',
                'phone.required'    =>'电话不能为空',
                'phone.regex'       =>'联系方式不符合要求',
                'email.email'       =>'邮箱不符合要求',
                'address.required'  =>'地址不能为空'

                ]; 
    }
}
