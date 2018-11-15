<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //添加属性
    //模型类对应得数据表
    protected $table="order";
    //开启自动维护时间戳 创建消息时间字段 created_at  修改消息时间字段 updated_at
    public $timestamps=false;
    //可以被批量赋值的属性字段
    protected $fillable=['linkname','address','tel','status','order_code','total','addtime'];

    //修改器方法 可以自动处理获取到的数据 Status 数据表字段 getAttribute()获取字段属性值
    public function getStatusAttribute($value){
    	//自动处理
    	$status=[0=>'未支付',1=>'已支付',2=>'待收货',3=>'待评论',4=>'订单完成'];
    	//返回数据
    	return $status[$value];
    }

    // 一对一
    public function dilog(){
        return $this->hasOne('App\Model\DiscountLog','oid','id');
    }
}






