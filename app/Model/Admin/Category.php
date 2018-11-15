<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //与模型关联的数据表
    protected $table 	= 'category';
    // 可以被批量赋值的属性
    protected $fillable = ['name','pid','path','status'];


     //修改器的方法
	//对完成的数据(状态 status)做自动处理
	public function getStatusAttribute($value)
	{
		$status=[1=>'禁用',2=>'激活'];
		return $status[$value];
	}

	public function discount()
	{
		return $this->hasMany('App\Model\Discount','cid','id');
	}
}
