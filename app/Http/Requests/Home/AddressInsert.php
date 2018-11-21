<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class AddressInsert extends FormRequest
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
            'linkname'=>'required|regex:/^[\p{Han}a-zA-Z]{1,8}$/u',
            'mailbox'=>'required|regex:/^[0-9]{6}$/',
            'phone'=>'required|regex:/^[0-9]{11}$/',
            'city'=>'required',
            'xiang'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'linkname.required'=>'收货人名称不能为空',
            'linkname.regex'=>'收货人的名称只能是中文字母的1到8位字符',
            'mailbox.required'=>'邮编不能为空',
            'mailbox.regex'=>'邮编必须为数字,且必须6位',
            'phone.required'=>'联系电话不能为空',
            'phone.regex'=>'联系电话不符合规则',
            'city.required'=>'地址不能为空',

            'xiang.required'=>'详细地址不能为空'
        ];
    }
}
