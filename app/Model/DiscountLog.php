<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DiscountLog extends Model
{
    protected $table = 'discount_log';

    //可以被批量赋值的属性
	protected $fillable = ['status','name','did','uid'];
    public function getStatusAttribute($value){
			// 处理
			$status = [1=>'未使用',2=>'已使用',3=>'已过期',4=>'已作废',5=>'已删除'];
			// 返回数据
			return $status[$value];
	}

    // 反关联优惠券表
   	 public function disc()
   	 {
   	 	return $this->belongsTo('App\Model\Discount','did','id');
   	 }

   	 //一对一订单表
   	 public function ord()
   	 {
   	 	return $this->hasOne('App\ModelOrder','oid','id');
   	 }

   	 //
}
