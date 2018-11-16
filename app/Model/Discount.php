<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
	// 模型类对应的数据表
	protected $table = 'discount';

	// 修改器
	public function getStatusAttribute($value){
		$status = [0=>'禁用','1'=>'启用'];
		// 返回数据
		return $status[$value];
	}

	// 反关联分类表 分类表
	public function category(){
		return $this->belongsTo('App\Model\Admin\Category','cid','id');
	}

	// 1对多 用户优惠券表
	public function disclog(){
		return $this->hasMany('App\Model\DiscountLog','did','id');
	}

}
