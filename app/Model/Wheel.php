<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Wheel extends Model
{
    protected $table = 'wheel';
    // 开启自动维护时间
    public $timestamps = true;
    // 修改器
    public function getStatusAttribute($value){
    	// 处理
    	$status = [0=>'禁用',1=>'启用'];
    	// 返回数据
    	return $status[$value];
    }

    // 可以被批量赋值的属性
    protected $fillable = ['l_name','l_pic','status'];
}
