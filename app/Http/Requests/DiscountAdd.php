<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountAdd extends FormRequest
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
    // 设置一个可以获取当前时间的规则 用于设置必须大于当前时间
    public function prepareForValidation(){
        $this->offsetSet('curr_date',date('Y-m-d H:i'));
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'max'=>'required|regex:/^[0-9]{1,6}$/',
            'minus'=>'required|regex:/^[0-9]{1,6}$/',
            'cid'=>'required|regex:/^[0-9]{1,11}$/',
            'status'=>'required|regex:/^[0-1]{1}$/',
            'describe'=>'required|regex:/^[\p{Han}a-zA-Z0-9]{1,20}$/u',
            'start_time'=>'required|date|after_or_equal:curr_date',
            'end_time'=>'required|date|after:start_time',
        ];
    }
    public function messages(){
        return [
            'max.required'=>'满的数值必须得设置',
            'max.regex'=>'满的数值不能超过6位',
            'minus.required'=>'减的数值必须的设置',
            'minus.regex'=>'减的数值不能超过6位',
            'cid.required'=>'关联的分类必须的选择',
            'cid.regex'=>'不要想着嵌入一些奇怪的东西！',
            'status.required'=>'状态必须的选择',
            'status.regex'=>'状态不要弄一些奇怪的东西',
            'describe.required'=>'描述不能为空',
            'describe.regex'=>'描述只能写数字字母汉字1到20位',
            'start_time.required'=>'开始时间必须的选择',
            'start_time.regex'=>'开始时间必须为时间格式',
            'start_time.after_or_equal'=>'开始时间必须大于等于你设置的时间',
            'end_time.required'=>'结束时间必须选择',
            'end_time.date'=>'结束时间必须为时间格式',
            'end_time.after'=>'结束时间必须大于开始时间',
        ];
    }
}
