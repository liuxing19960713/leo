<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminCateinsert extends FormRequest
{
    /**
      /**
     * Determine if the user is authorized to make this request.
     *  给表单授权
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * 设置规则
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required'
        ];
    }
    //自定义错误信息
    public function messages()
    {
        return [
                'name.required'=>'分类名不能为空'
               ];
    }
}
