<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCompanyinsert extends FormRequest
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
     //规则设置
    public function rules()
    {
        return [
            
            'commpany'=>'required|unique:about',            
            'commpany_address'=>'required',
            'com_tel'=>'required|regex:/\d{11}/',
            'brank_conten'=>'required',
        ];
    }
    //自定义错误消息
    public function messages()
    {
        return [
                'commpany.required'=>'公司名不能为空',
                'commpany.unique'=>'公司名重复',
                'commpany_address.required'=>'公司地址不能为空',
                'com_tel.required'=>'联系电话不能为空',
                'com_tel.regex'=>'联系电话必须为11位数字',
                'brank_conten.required'=>'版权信息不能为空',
                ];
    }
}
