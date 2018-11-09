<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //摄住模型关联的数据表
    protected $table 	= 'goods';

    //主键
    protected $primaryKey = "id";
    //该模型是被自动维护时间戳
    public $timestamps  = true;
 
    //可以被批量赋值的属性
    protected $fillable = ['goods_name','brank','cate_id','price','pic','desrc','commpany','sale','status','stock'];

    // 修改器方法
    public function getStatusAttribute($value)
    {
    	$status = [0=>'显示',1=>'隐藏'];
    	// 返回数据
    	return $status[$value];
    }

    public function info()
    {
        return $this->hasOne('App\Model\Admin\Category','id');
    }

}
