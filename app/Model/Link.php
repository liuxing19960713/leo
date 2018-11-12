<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    //与模型关联的数据表
	protected $table = 'link';
	// 可以设置主键
	// protected $primaryKey = 'id';
	//该模型是否被自动维护时间戳
	//创建消息时间字段 create_at 修改消息时间字段 update_at 开启了会自动维护
	public $timestamps = true;
	//修改器
	//在获取数据的字段之后自动进行处理
	//例如：就是状态值转换
	public function getStatusAttribute($value){
			// 处理
			$status = [1=>'启用',0=>'禁用'];
			// 返回数据
			return $status[$value];
	}

	//可以被批量赋值的属性
	protected $fillable = ['urlname','link_url','admin_id','status'];

	//
	public function admin()
	{
		return $this->belongsTo('App\Model\Administrator','admin_id','id');
	}

}
