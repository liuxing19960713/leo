<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminNotice extends FormRequest
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
            'title'=>'required',
            'content'=>'required',
        ];
    }
    //自定义错误信息
    public function messages()
    {
        return [
                'title.required'=>'标题不能为空',
                'content.required'=>'公告内容不能为空',
                ];
    }
}
