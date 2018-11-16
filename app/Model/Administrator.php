<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    //添加属性
    //模型类对应得数据表
    protected $table="admin";
    //开启自动维护时间戳 创建消息时间字段 created_at  修改消息时间字段 updated_at
    public $timestamps=true;
    //可以被批量赋值的属性字段
    protected $fillable=['id','name','rid','pwd'];

    //修改器方法 可以自动处理获取到的数据 Status 数据表字段 getAttribute()获取字段属性值
    // public function getridAttribute($value){
    //     //自动处理
    //     $rid=[1=>'普通管理员',2=>'部门组长',3=>'运维经理',4=>'产品经理'];
    //     //返回数据
    //     return $rid[$value];
    // }

    public function getRidAttribute($value)
    {
        $status=[1=>'普通管理员',2=>'部门组长',3=>'运维经理',4=>'产品经理'];
        return $status[$value];
    }

    public function link()
    {
        return $this->hasMany('App\Model\Link','admin_id','id');
    }
}
