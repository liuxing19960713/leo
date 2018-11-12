<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Linkedit extends FormRequest
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
            //设置修改的校验
            'urlname'=>'required|regex:/^[\p{Han}a-zA-Z0-9]{2,10}$/u',
            'link_url'=>'required|active_url|url',
            'status'=>'required',
        ];
    }

    public function messages(){
        return [
            'urlname.required'=>'链接名不能为空',
            'urlname.regex'=>'链接名不能有除了数字字母中文的2-10位字符',
            'link_url.required'=>'链接不能为空',
            'link_url.active_url'=>'该链接必须为一个有效链接',
            'link_url.url'=>'该链接格式不对',
            'status.required'=>'状态不能为空'
        ];
    }
}
