<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminGoodsinsert extends FormRequest
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
            //设置规则
            'goods_name'=>'required',
            'brank'=>'required',
            'pic'=>'required',
            'price'=>'required|numeric',
            'stock'=>'required|numeric',
            'commpany'=>'required',
            'desrc'=>'required',


        ];
    }
    /**
     * 自定义错误信息
     * @author 刘兴
     * @DateTime 2018-11-07T21:00:34+0800
     * @return   [type]                   [description]
     */
    public function messages()
    {
       return[
            'goods_name.required'=>'商品名称不能为空',
            'brank.required'=>'品牌不能为空',
            'pic.required'=>'商品主图片不能为空',
            'pic.image'=>'商品图片格式不对',
            'price.required'=>'价格不能为空',
            'price.numeric'=>'价格必须为数字',
            'stock.required'=>'库存能为空',
            'stock.numeric'=>'库存必须为数字',
            'commpany.required'=>'所属产地不能为空',
            'desrc.required'=>'商品描述不能为空',
            'desrc.regex'=>'商品描述不能少于16个字符'
             ];
    }
}
