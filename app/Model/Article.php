<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //添加属性
    //模型类对应得数据表
    protected $table="article";
    //开启自动维护时间戳 创建消息时间字段 created_at  修改消息时间字段 updated_at
    public $timestamps=true;
    //修改器
    public function getStatusAttribute($value){
			// 处理
			$status = [1=>'启用',0=>'禁用'];
			// 返回数据
			return $status[$value];
	}
    //可以被批量赋值的属性字段
    protected $fillable=['id','title','content','admin_id','created_at','updated_at','status'];

   public function admin()
	{
		return $this->belongsTo('App\Model\Administrator','admin_id','id');
	}


}
