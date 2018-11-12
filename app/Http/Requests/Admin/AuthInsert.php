<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AuthInsert extends FormRequest
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
            //
            'model'=>'required',
            'controller'=>'required',
            'action'=>'required'
        ];
    }

    public function messages(){
        return[
        'model.required'=>'模型名不能为空',
        'controller.required'=>'控制器不能为空',
        'action.required'=>'方法不能为空'
        ];
    }
}
