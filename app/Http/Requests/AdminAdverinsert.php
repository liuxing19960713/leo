<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminAdverinsert extends FormRequest
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
    //设置规则
    public function rules()
    {
        return [
            'ad_name'=>'required|unique:adver',
            'adv_title'=>'required',
            'pic'=>'required',
            'commpany'=>'required',
        ];
    }
    //自定义错误信息
    public function messages()
    {
        return [
                'ad_name.required'=>'广告名称不能为空',
                'ad_name.unique'=>'广告名称重复',
                'adv_title.required'=>'广告标题不能为空',
                'pic.required'=>'广告图片不能为空',
                'commpany.required'=>'所属公司不能为空',
                ];
    }
}
