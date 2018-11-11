<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminAdveredit extends FormRequest
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
            'ad_name'=>'required',
            'adv_title'=>'required',
            'commpany'=>'required',
        ];
    }
    //自定义错误信息
    public function messages()
    {
        return [
                'ad_name.required'=>'广告名称不能为空',
                'adv_title.required'=>'广告标题不能为空',
                'commpany.required'=>'所属公司不能为空',
                ];
    }
}
